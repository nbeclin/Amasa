<?php
class Stat extends SqlModel {

    public $id;
    public $ip;
    public $nb_page;
    public $date;

    /**
     * Load object properties
     * @param array $data Contains object properties
     * @return object itself
     */
    public function __construct($data){
        parent::__construct($data);
    }
}