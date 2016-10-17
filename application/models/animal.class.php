<?php
class Animal extends SqlModel {

    public $id;
    public $nom;
    public $sexe;
    public $age;
    public $soin;
    public $commentaire;
    public $plus;
    public $moins;
    public $okChat;
    public $okChien;
    public $okEnfant;
    public $type;
    public $categorie;
    public $anneeAdoption;
    public $chatMois;
    public $parrainage;
    public $photos = array();
    public $age_text;

    /**
     * Load object properties
     * @param array $data Contains object properties
     * @return object itself
     */
    public function __construct($data){
        parent::__construct($data);
        $this->load_photos();
    }

    private function load_photos(){
        if($this->id != null){
            require_once(__dir__ . '/photo.class.php');
            $photos = $this->selectAll('photo', '*', array('idAnimal' => $this->id), 'ORDER BY premiere DESC');
            foreach($photos as $photo){
                array_push($this->photos, new Photo($photo));
            }
        }
    }
}