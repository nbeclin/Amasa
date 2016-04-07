<?php
class Photo_all extends Model {

    public $all = array();

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
}