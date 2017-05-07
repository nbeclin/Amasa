<?php
class fichier extends SqlModel {

    public $id;
    public $lien;
    public $type = 'img/_unk.png';

    /**
     * Load object properties
     * @param array $data Contains object properties
     * @return object itself
     */
    public function __construct($data){
        parent::__construct($data);
    }
}