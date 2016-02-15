<?php
class Page extends SqlModel {

    public $id;
    public $libelle;
    public $titre;
    public $texte;
    public $historique;
    public $sous_pages = array();

    /**
     * Load object properties
     * @param array $data Contains object properties
     * @return object itself
     */
    public function __construct($data){
        parent::__construct($data);
        $this->load_sous_page();
    }

    private function load_sous_page(){
        if($this->id != null){
            require_once(__dir__ . '/page.class.php');
            $sous_pages = $this->selectAll('sous_page', '*', array('idPage' => $this->id, 'historique' => '0'));
            foreach($sous_pages as $sous_page){
                array_push($this->sous_pages, new Page($sous_page));
            }
        }
    }
}