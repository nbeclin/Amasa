<?php
class Page_all extends Model {

    public $all = array();

    public function __construct(){
        parent::__construct();
        $this->load_all();
    }

    private function load_all(){
        foreach($this->selectAll('page', '*', null, 'WHERE historique LIKE 0') as $page){
            array_push($this->all, new Page($page));
        }
    }

    public function load_one($id, $type){
        $page = new Page($this->selectOne($type, '*', array('id' => $id)));
        return $page;
    }

    public function register($post, $type){
        $label = $post['libelle'];

        unset($post['libelle']);
        unset($post['modif_page']);

        $result = array();
        $cpt = 0;
        
        foreach($this->selectAll($type, '*', array('libelle' => $label), 'ORDER BY historique ASC') as $page){
            array_push($result, new Page($page));
            if ($result[$cpt]->historique == '0') {
                $this->update($type, $post, array('id' => $result[$cpt]->id));
            }
            else {
                $fields = array (
                        'titre' => $result[$cpt-1]->titre,
                        'texte' => $result[$cpt-1]->texte
                    );
                $this->update($type, $fields, array('id' => $result[$cpt]->id)); 
            }
            $cpt++;
        }
        return true;
    }
}