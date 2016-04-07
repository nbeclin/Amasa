<?php
class Animal_all extends Model {

    public $all = array();
    
    public function __construct(){
        parent::__construct();
        $this->load_all();
    }

    /** 
    * Function load_all - load all animal
    */
    private function load_all(){
        foreach($this->selectAll('animal', '*') as $animal){
            $animal['age_text'] = $this->interval($animal['age']);
            array_push($this->all, new Animal($animal));
        }
    }

    /** 
    * Function tri 
    * @param $post - searched values
    * @return array of result
    */
    public function tri($post, $page=null){
        $result = array();

        $post = $this->clean_post_tri($post);

        $other = null;

        if(isset($post['anneeAdoption'])){
            $other = 'AND anneeAdoption LIKE "%'.$post['anneeAdoption'].'%" ORDER BY nom';
            unset($post['anneeAdoption']);
        }

        if (!empty($post)) {
            foreach($this->selectAllLimit('animal', '*', $post, $other, $page) as $animal){
                $animal['age_text'] = $this->interval($animal['age']);
                array_push($result, new Animal($animal));
            }
        }
        else {
            foreach($this->selectAllLimit('animal', '*', null, null, $page) as $animal){
                $animal['age_text'] = $this->interval($animal['age']);
                array_push($result, new Animal($animal));
            }
        }

        return $result;
    }

    /** 
    * Function pet_of_the_month
    * @return array with name and picture link of the animal
    */
    public function pet_of_the_month(){
        $animal = $this->selectOne('animal', '*', array('chatMois' => '1'));
        $animal['age_text'] = $this->interval($animal['age']);
        return new Animal($animal);
    }

    /** 
    * Function load_one
    * @param $post - searched values
    * @return int of result number
    */
    public function count_tri($post){
        $result = 0;

        $post = $this->clean_post_tri($post);

        $other = null;

        if(isset($post['anneeAdoption'])){
            $other = 'AND anneeAdoption LIKE "%'.$post['anneeAdoption'].'%"';
            unset($post['anneeAdoption']);
        }

        if (!empty($post)) {
            foreach($this->selectAll('animal', '*', $post, $other) as $animal){
                $result++;
            }
        }
        else {
            foreach($this->selectAll('animal', '*') as $animal){
                $result++;
            }
        }

        return $result;
    }

    /** 
    * Function load_one
    * @param $id - searched id
    * @return array of result
    */
    public function load_one($id){
        $animal = new Animal($this->selectOne('animal', '*', array('id' => $id)));
        $animal->age = $this->date_conversion_fr($animal->age);
        $animal->anneeAdoption = $this->date_conversion_fr($animal->anneeAdoption);
        return $animal;
    }

    /** 
    * Function register
    * @param $post - values ​​to add or change
    * @return boolean 
    */
    public function register($post){
        if($post['age'] == ''){
            $post['age'] = '0000-00-00';
        }
        else {
            $post['age'] = $this->date_conversion_datetime($post['age']);
        }

        if($post['anneeAdoption'] == ''){
            $post['anneeAdoption'] = '0000-00-00';
        }
        else {
            $post['anneeAdoption'] = $this->date_conversion_datetime($post['anneeAdoption']);
        }

        $liens = $post['liens'];

        if($post['chatMois'] == 1){
            $this->update('animal', array('chatMois' => '0'), array('chatMois' => '1'));
        }

        if($post['id'] != ''){
            $animal_id = $post['id'];
            $this->delete('photo', array('idAnimal' => $animal_id));
            $this->update('animal', $this->clean_post($post), array('id' => $animal_id));
        }
        else{
            $animal_id = $this->insertOne('animal', $this->clean_post($post));
        }
        
        foreach ($liens as $lien => $value) {
            if($lien == 1){
                $premiere = 1;
            }
            else {
                $premiere = 0;
            }

            if($value != ''){
               $this->image_register($animal_id, $value, $premiere);
            }
        }

        return true;
    }

    /** 
    * Function date_conversion_fr
    * @param $dateToConvert - datetime format
    * @return string - fr date format 
    */
    private function date_conversion_fr($dateToConvert){
        if ($dateToConvert == '0000-00-00 00:00:00.0' || $dateToConvert == '0000-00-00' || $dateToConvert == '' || $dateToConvert == '0001-11-30 00:00:00' || $dateToConvert == '2015-00-00 00:00:00'){
            return null;
        }
        else {
            $date = new DateTime($dateToConvert);
            return $date->format('d/m/Y');
        }
    }

    /** 
    * Function date_conversion_datetime
    * @param $dateToConvert - fr date format
    * @return string - datetime format
    */
    private function date_conversion_datetime($dateToConvert){
        $date = DateTime::createFromFormat('d/m/Y', $dateToConvert);
        return $date->format('Y-m-d');
    }

    /** 
    * Function clean_post
    * @param $post - array of data
    * @return array of cleaning data
    */
    private function clean_post($post){
        unset($post['form_animal']);
        unset($post['id']);
        unset($post['liens']);
        return $post;
    }

    /** 
    * Function clean_post_tri
    * @param $post - array of data
    * @return array of cleaning data
    */
    private function clean_post_tri($post){
        foreach ($post as $key => $value) {
            if ($post[$key] == ''){
                unset($post[$key]);
            }
        }
        unset($post['tri']);
        return $post;
    }

    /** 
    * Function image_register - BDD register
    * @param $idAnimal - id of animal
    * @param $lien - name of image
    * @param $premiere - position of image
    */
    private function image_register($idAnimal, $lien, $premiere){
        $values = array(
                'idAnimal' => $idAnimal,
                'lien' => $lien,
                'premiere' => $premiere    
            );

        $this->insertOne('photo', $values);
    }

    /** 
    * Function interval - Age format
    * @param $date - datetime format
    * @return $result - date in string
    */
    private function interval($date) {      
        $datenow = new DateTime("now");
        $date = new DateTime($date);
        
        $interval = date_diff($datenow, $date);
        
        switch ($interval->y) {
            case 0:
                if ($interval->m == 0) {
                    $result = 'Presque 1 mois';
                }
                else {
                    $result = $interval->m.' mois';
                }
                break;
            
            case 1:
                if ($interval->m == 0) {
                    $result = $interval->y.' an';
                }
                else {
                    $result = ''.$interval->y.' an et '.$interval->m.' mois';
                }
                break;
            
            Default:
                if ($interval->m == 0) {
                    $result = ''.$interval->y.' ans';
                }
                else {
                    $result = ''.$interval->y.' ans et '.$interval->m.' mois';
                }
        }
        
        return $result;
    }

    public function upload_image($size){
        
        if ($size == "small"){
            $width_std = 262;
            $height_std = 175;
            $name = '00-';
        }
        else if ($size == "normal"){
            $width_std = 750;
            $height_std = 500;
            $name = '';
        }

        $ratio = $width_std/$height_std;

        $src_img = imagecreatefromjpeg("img/test2.jpg");
        
        if (imagesx($src_img)/imagesy($src_img) < $ratio){
            $height = $height_std;
            $width = $height_std * imagesx($src_img) / imagesy($src_img);
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
        
        $dst_img = imagecreatetruecolor($width_std,$height_std);
        $color = imagecolortransparent($dst_img, 0);
        imagecopyresampled($dst_img,$src_img,$pos_x,$pos_y,0,0,$width,$height,imagesx($src_img),imagesy($src_img));
        imagepng($dst_img,"img/".$name."test2.png");

        unset($src_img);
    }
}