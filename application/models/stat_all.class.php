<?php
class Stat_all extends Model {

    public $all = array();

    public function __construct(){
        parent::__construct();
        $this->load_all();
    }

    private function load_all(){
        foreach($this->selectAll('stat', '*') as $stat){
            array_push($this->all, new Stat($stat));
        }
    }
}