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
        foreach($this->selectAll('animal', '*', null, 'ORDER BY nom') as $animal){
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

        var_dump($post);

        $other = null;

        if(isset($post['anneeAdoption'])){
            $other = 'AND anneeAdoption LIKE "%'.$post['anneeAdoption'].'%" ORDER BY nom';
            unset($post['anneeAdoption']);
        }
        else {
            $other = 'ORDER BY nom';
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

        var_dump($result);

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
            unset($post['age']);
        }
        else {
            $post['age'] = $this->date_conversion_datetime($post['age']);
        }

        if($post['anneeAdoption'] == ''){
            unset($post['anneeAdoption']);
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

            if (!isset($post['age'])){
                $this->raw('UPDATE `animal` SET `age` = NULL WHERE `id` = '.$animal_id.'', false);
            }
            if (!isset($post['anneeAdoption'])){
                $this->raw('UPDATE `animal` SET `anneeAdoption` = NULL WHERE `id` = '.$animal_id.'', false);
            }

            $this->update('photo', array('idAnimal' => '0', 'premiere' => '0'), array('idAnimal' => $animal_id));
            $this->update('animal', $this->clean_post($post), array('id' => $animal_id));
        }
        else{
            $animal_id = $this->insertOne('animal', $this->clean_post($post));
        }

        $first = true;

        foreach ($liens as $lien => $value) {
            if ($value != ''){
                if ($first){
                    $data = array(
                        'idAnimal' => $animal_id,
                        'premiere' => '1'
                    );
                    $first = false;
                }
                else {
                    $data = array(
                        'idAnimal' => $animal_id,
                        'premiere' => '0'
                    );
                }

                $this->update('photo', $data, array('id' => $value));
            }
        }

        return true;
    }

    public function delete_one($animal_id){
        $this->update('photo', array('idAnimal' => "0"), array('idAnimal' => $animal_id));

        return $this->delete('animal', array('id' => $animal_id));
    }

    /** 
    * Function date_conversion_fr
    * @param $dateToConvert - datetime format
    * @return string - fr date format 
    */
    private function date_conversion_fr($dateToConvert){
        if ($dateToConvert == null){
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
    * Function interval - Age format
    * @param $date - datetime format
    * @return $result - date in string
    */
    private function interval($date) {      
        $datenow = new DateTime("now");
        if ($date == null){
            return '?';
        } else {
            $date = new DateTime($date);
        }
        
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
}