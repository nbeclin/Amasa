<?php

class Pages extends Controller {

    private $template;
    private $pages;

    function __construct(){
        parent::__construct();
    }

    function index($action=false, $sub_param=false){
    	
        $animals = $this->loadModel('Animal_all');

        switch ($action){
            case 'adopte':
                $template = $this->loadView('front/pages/adopte');
                $template->set('nav', 'main');

                $template->set('pet_of_the_month', $animals->pet_of_the_month());

                $template->set('title', 'Adoptés en '.$this->params[0]);
                $template->set('page', $this->page_selected());
                $template->set('selected', $animals->count_tri(array('categorie' => 'adopte', 'anneeAdoption' => $this->params[0])));
                $template->set('year', $this->params[0]);
                $template->set('cpt', 0);
                $template->set('animals', $animals->tri(array('categorie' => 'adopte', 'anneeAdoption' => $this->params[0]), $this->page_selected()));
                break;

            case 'adoption':
                $template = $this->loadView('front/pages/adoption');
                $template->set('nav', 'main');

                $template->set('pet_of_the_month', $animals->pet_of_the_month());

                switch ($this->params[0]){
                    case 'chat':
                        $categorie = 'adoptionChat';
                        $title = 'Chats à l\'adoption';
                        break;

                    case 'chaton':
                        $categorie = 'adoptionChaton';
                        $title = 'Chatons à l\'adoption';
                        break;

                    case 'chien':
                        $categorie = 'adoptionChien';
                        $title = 'Chien à l\'adoption';
                        break;
                }

                $template->set('title', $title);
                $template->set('page', $this->page_selected());
                $template->set('selected', $animals->count_tri(array('categorie' => $categorie)));
                $template->set('category', $this->params[0]);
                $template->set('cpt', 0);
                $template->set('animals', $animals->tri(array('categorie' => $categorie)));
            
                break;

    		default:
                $pages = $this->loadModel('Page_all');
                $load_page = $pages->load_one_by_label($action, 'page');
            
                if($load_page->id == null){
                    $template = $this->loadView('error404');
                    $template->set('title', 'ERREUR 404');
                    $template->set('nav', null);
                }
                else{
                    $template = $this->loadView('front/pages/commun');
                    $template->set('nav', 'main');       
                    $template->set('info_page', $load_page);
                }
    	}

        $template->set('pictures', $this->load_banner_photo());
        $template->set('static', $this->staticFiles);
        $template->addCss('style', 'css');

        $template->set('pet_of_the_month', $animals->pet_of_the_month());
        $template->render();
    }

    private function page_selected(){
        if (isset($this->params[1]) && is_numeric($this->params[1])){
            return floor($this->params[1]);
        }
        else {
            return 1;
        }
    }

    private function load_banner_photo(){
        $files = scandir('img/bandeau/');
        $results = array();
        foreach ($files as $file) {
            if (!($file == '.' || $file == '..')){ 
                array_push($results, 'http://'.$_SERVER['HTTP_HOST'].'/'.BASE_URL.'img/bandeau/'.$file);
            }           
        }
        return $results;
    }
}

