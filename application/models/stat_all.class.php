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

    public function register($ip){
        $results = array();

        foreach($this->selectAll('stat', '*', array('ip' => $ip, 'date' => date('Y-m-d'))) as $stat){
            array_push($results, new Stat($stat));
        }

        if (empty($results)){
            $this->insertOne('stat', array('nb_page' => '1', 'ip' => $ip, 'date' => date('Y-m-d')));
        } else {
            $this->update('stat', array('nb_page' => $results['0']->nb_page + 1), array('ip' => $ip, 'date' => date('Y-m-d')));
        }    
    }
}