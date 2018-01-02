<?php
class Photo extends SqlModel {

    public $id;
    public $idAnimal;
    public $lien;
    public $premiere;
    public $animal_categorie = null;
    public $associe = false;
    public $affiche = false;

    /**
     * Load object properties
     * @param array $data Contains object properties
     * @return object itself
     */
    public function __construct($data){
        parent::__construct($data);
        $this->setAssocie();
        $this->setAffiche();
    }

    private function setAssocie(){
        if ($this->idAnimal != 0){
            $this->associe = true;
        }
    }

    private function setAffiche(){
        if(($this->premiere == 0 && $this->animal_categorie == 'adopte') || $this->idAnimal == 0)
        {
            $this->affiche = false;
        }
        else{
            $this->affiche = true;
        }
    }
}