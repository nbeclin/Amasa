<?php
class Fichier_all extends Model {
	
	public $all = array();
    public $errors = array();
    private $checks = array(
        'file' =>           array('required' => true,   'error' => 'Fichier vide !'),
        'link' =>           array('required' => true,   'error' => 'Lien vide !'),
        'file_format' =>    array('required' => false,  'error' => 'Format fichier incorrect !'),
        'recording' =>      array('required' => false,  'error' => 'Enregistrement fichier impossible !'),
        'link_name' =>      array('required' => false,  'error' => 'Le lien existe déjà !')
        );
    private $format_img = ['.jpg','.jpeg','.png','.gif'];
    private $format_doc = ['.doc','.docx'];
    private $format_xls = ['.xls','.xlsx'];

    public function __construct(){
        parent::__construct();
        $this->load_all();
    }

    private function load_all(){
        foreach($this->selectAll('fichier', 'fichier.id, fichier.lien', null, null) as $fichier){
            $extension = strrchr($fichier['lien'], '.');

            if (in_array($extension, $this->format_img)){
                $fichier['type'] = 'img';
            }

            if (in_array($extension, $this->format_doc)){
                $fichier['type'] = 'img/_doc.png';
            }

            if (in_array($extension, $this->format_xls)){
                $fichier['type'] = 'img/_xls.png';
            }

            if ($extension == '.pdf'){
                $fichier['type'] = 'img/_pdf.png';
            }

            array_push($this->all, new Fichier($fichier));
        }
    }

    public function load_one($id){
        return new Fichier($this->selectOne('fichier', '*', array('id' => $id)));
    }

    public function register($post, $files){
        $this->check_errors($post, $files);
        
        if(sizeof($this->errors) > 0){
            return array('errors' => $this->errors);
        }
       
        if(isset($post) && $post['link'] != ''){
            $link = strtolower($post['link']);
            $extension = strrchr($files['file']['name'], '.');

            if (in_array($extension, $this->format_img)){
                $repertory = "img/";
            }
            else {
                $repertory = "document/";
            }

            //Checking if the filename exists or not
            $is_result = array();
            
            foreach($this->selectAll('fichier', '*', array('lien' => $link.$extension)) as $fichier){
                array_push($is_result, new Fichier($fichier));
            }

            if (empty($is_result)) {
                if(isset($files['file']) && $files['file']['tmp_name'] != '') {
                    if(!move_uploaded_file($files['file']['tmp_name'], $repertory.$link.$extension))
                    {
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

        $fichier_id = $this->insertOne('fichier', array('lien' => $repertory.$link.$extension));

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

    public function delete_one($fichier_id){

        $fichier = $this->load_one($fichier_id);

        $in_use = array();

        foreach($this->selectAll('page', 'id', null, 'WHERE texte LIKE "%'.$fichier->lien.'%" AND historique LIKE 0') as $page){
            array_push($in_use, $page['id']);
        }

        if(!empty($in_use)){
            return array(false, $in_use);
        }

        if (file_exists($fichier->lien)){
            unlink($fichier->lien);
        }

        return array($this->delete('fichier', array('id' => $fichier_id)));
    }
}