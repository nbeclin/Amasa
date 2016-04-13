<?php
class Photo_all extends Model {

    public $all = array();
    public $errors = array();
    private $checks = array(
        'file' =>           array('required' => true,   'error' => 'Fichier vide !'),
        'link' =>           array('required' => true,   'error' => 'Lien vide !'),
        'file_format' =>    array('required' => false,  'error' => 'Format fichier incorrect !'),
        'recording' =>      array('required' => false,  'error' => 'Enregistrement fichier impossible !'),
        'link_name' =>      array('required' => false,  'error' => 'Le lien existe déjà !')
        );

    public function __construct(){
        parent::__construct();
        $this->load_all();
    }

    private function load_all(){
        foreach($this->selectAll('photo', '*', null, 'ORDER BY lien') as $photo){
            array_push($this->all, new Photo($photo));
        }
    }

    public function load_all_By_id(){
        $pictures = array();
        foreach($this->selectAll('photo', '*', null, 'ORDER BY idAnimal, lien') as $photo){
            array_push($pictures, new Photo($photo));
        }
        return $pictures;
    }

    public function load_one($id){
        return new Photo($this->selectOne('photo', '*', array('id' => $id)));
    }


    public function register($post, $files){
        $this->check_errors($post, $files);
        
        if(sizeof($this->errors) > 0){
            return array('errors' => $this->errors);
        }


        $repertory = "img/animaux/";
        
        if(isset($post) && $post['link'] != ''){
            $link = strtolower($post['link']);
            $extension = strrchr($files['file']['name'], '.');

            //Checking if the filename exists or not
            $is_result = array();
            
            if($post['id'] == ''){
                foreach($this->selectAll('photo', '*', array('lien' => $link.$extension)) as $photo){
                    array_push($is_result, new Photo($photo));
                }
            }

            if (empty($is_result)) {
                if(isset($files['file']) && $files['file']['tmp_name'] != '') {
                    if(move_uploaded_file($files['file']['tmp_name'], $repertory.$link))
                    {
                        $result_min = $this->upload_image($repertory.$link, $link, $extension, 'small', $repertory);
                        $result_norm = $this->upload_image($repertory.$link, $link, $extension, 'normal', $repertory);

                        if(!$result_min || !$result_norm) {
                            $this->errors['file_format'] = $this->checks['file_format']['error'];
                            return array('errors' => $this->errors); 
                        }
                        unlink($repertory.$link);
                    }
                    else {
                        $this->errors['recording'] = $this->checks['recording']['error'];
                        return array('errors' => $this->errors);
                    }
                }              
            }
            else {
                $this->errors['link_name'] = $this->checks['link_name']['error'];
                return array('errors' => $this->errors);
            }
        }

        if($post['id'] != ''){
            $photo_id = $post['id'];
            $this->update('photo', array('lien' => $link.'.png'), array('id' => $photo_id));
            unlink($repertory.$post['old_link']);
            unlink($repertory."00-".$post['old_link']);
        }
        else{
            $photo_id = $this->insertOne('photo', array('lien' => $link.'.png'));
        }

        return true;
    }

    /**
     * Check if posted values are correct, depends on $checks property
     * @param  array $data The data to check, initialy $_POST
     *         array $files The file to check, initialy $_FILES
     * @return void
     */
    private function check_errors($data, $files){
        if($data['link'] == '' && $this->checks['link']['required']){
            $this->errors['link'] = $this->checks['link']['error'];
        }
        if($files['file']['tmp_name'] == '' && $this->checks['file']['required']){
            $this->errors['file'] = $this->checks['file']['error'];
        }
    }

    private function upload_image($file, $name, $extension, $size, $repertory){
        
        if ($size == "small"){
            $width_std = 262;
            $height_std = 175;
            $name = '00-'.$name;
        }
        else if ($size == "normal"){
            $width_std = 750;
            $height_std = 500;
        }

        $ratio = $width_std/$height_std;

        switch ($extension) {
            case '.jpg':   
                $src_img = imagecreatefromjpeg($file);
                break;

            case '.jpeg':   
                $src_img = imagecreatefromjpeg($file);
                break;

            case '.png':  
                $src_img = imagecreatefrompng($file);
                break;

            case '.gif':  
                $src_img = imagecreatefromgif($file);
                break;

            default:
                return false;

        }
        
        if (imagesx($src_img) <= $width_std && imagesy($src_img) <= $height_std) {
            $height = imagesy($src_img);
            $width = imagesx($src_img);
            $pos_x = ($width_std - $width) / 2;
            $pos_y = ($height_std - $height) / 2;
        }
        else {
            if (imagesx($src_img)/imagesy($src_img) < $ratio){
                $width = $height_std * imagesx($src_img) / imagesy($src_img);
                $height = $height_std;
                $pos_x = ($width_std - $width) / 2;
                $pos_y = 0;
            }
            else if (imagesx($src_img)/imagesy($src_img) > $ratio){
                $width = $width_std;
                $height = $width_std * imagesy($src_img) / imagesx($src_img);
                $pos_x = 0;
                $pos_y = ($height_std - $height) / 2;
            }
            else {
                $width = $width_std;
                $height = $height_std;
                $pos_x = 0;
                $pos_y = 0;
            }
        }
        
        
        $dst_img = imagecreatetruecolor($width_std,$height_std);
        $color = imagecolortransparent($dst_img, 0);
        imagecopyresampled($dst_img,$src_img,$pos_x,$pos_y,0,0,$width,$height,imagesx($src_img),imagesy($src_img));
        imagepng($dst_img,$repertory.$name.'.png');

        unset($src_img);

        return true;
    }


    /**
     * Clean data array before query database
     * Remove all keys not used in the query
     * @param  array $post the data
     * @return array       The cleaned data
     */
    private function clean_post($post){
        unset($post['add_photo']);
        return $post;
    }
}