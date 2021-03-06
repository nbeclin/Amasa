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


    public function load_selected($pages){
        $pages_selected = array();
        foreach ($pages as $page) {
            array_push(
                $pages_selected, 
                new Page($this->selectOne('page', 'id, titre', array('id' => $page), 'AND historique LIKE 0'))
            );
        }
        return $pages_selected;
    }

    public function load_one_by_label($label, $type){
        $page = new Page($this->selectOne($type, '*', array('libelle' => $label, 'historique' => '0')));
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

    public function send_form_contact($post){
        $to = '31pattesdamour@gmail.com';
        $bcc = 'Bcc : nicolas.beclin@gmail.com, mirepoixmaud@gmail.com';

        if (isset($post['subject'])){
            $subject = $post['subject'];
        }
        else {
            $subject = '';
        }

        if (isset($post['mail'])){
            $subject = '[MESSAGE FROM WEBSITE] '.$subject.' - '.$post['mail'].'';
        }
        else {
            $subject = '[MESSAGE FROM WEBSITE] '.$subject.'';
        }
        
        if (isset($post['note'])){
            if ($post['note'] == '') {
                return array ('error' => 'Votre message n\'a pas été envoyé : message vide !');
            }
            else {
                if (mail($to, $subject, $post['note'], $bcc)) {
                    return array ('success' => 'Message envoyé : nous vous apporterons une réponse dans les meilleurs délais !');
                }
                else {
                    return array ('error' => 'Service momentanément indisponnible : merci de réessayer ultérieurement !');
                }
            }
        }
        else {
            return array ('error' => 'Votre message n\'a pas été envoyé : message vide !');
        }
    }
}