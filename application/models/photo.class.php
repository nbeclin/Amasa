<?php
class Photo extends SqlModel {

    public $id;
    public $idAnimal;
    public $lien;
    public $premiere;

    /**
     * Load object properties
     * @param array $data Contains object properties
     * @return object itself
     */
    public function __construct($data){
        parent::__construct($data);
    }
}