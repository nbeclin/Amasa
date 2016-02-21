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
    		case 'association':
                $this->proceed($action);
                break;

            case 'bureau':
                $this->proceed($action);
                break;

            case 'condAdoption':
                $this->proceed($action);
                break;

            case 'tarifAdoption':
                $this->proceed($action);
                break;

            case 'devFamille':
                $this->proceed($action);
                break;

            case 'adherer':
                $this->proceed($action);
                break;

            case 'don':
                $this->proceed($action);
                break;

            case 'parrainer':
                $this->proceed($action);
                break;

            case 'lien':
                $this->proceed($action);
                break;

            case 'presse':
                $this->proceed($action);
                break;

            case 'adopte':
                $template = $this->loadView('front/pages/adopte');
                $template->set('static', $this->staticFiles);
                $template->set('nav', 'main');
                $template->addCss('style', 'css');

                $template->set('pet_of_the_month', $animals->pet_of_the_month());

                $template->set('title', 'Adoptés en '.$this->params[0]);
                $template->set('page', $this->page_selected());
                $template->set('selected', $animals->count_tri(array('categorie' => 'adopte', 'anneeAdoption' => $this->params[0])));
                $template->set('year', $this->params[0]);
                $template->set('cpt', 0);
                $template->set('animals', $animals->tri(array('categorie' => 'adopte', 'anneeAdoption' => $this->params[0]), $this->page_selected()));

                $template->render();
                break;

            case 'adoption':
                $template = $this->loadView('front/pages/adoption');
                $template->set('static', $this->staticFiles);
                $template->set('nav', 'main');
                $template->addCss('style', 'css');

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

                $template->render();
            
                break;

    		default:
    		$template = $this->loadView('error404');
	        $template->set('static', $this->staticFiles);
	        $template->addCss('style', 'css');

            $template->set('pet_of_the_month', $animals->pet_of_the_month());

	        $template->set('title', 'ERREUR 404');
	        $template->set('nav', null);
	        $template->render();
    	}
    }

    private function proceed($label){
        $this->template = $this->loadView('front/pages/commun');
        $this->template->set('static', $this->staticFiles);
        $this->template->set('nav', 'main');
        $this->template->addCss('style', 'css');
        
        $animals = $this->loadModel('Animal_all');        
        $this->template->set('pet_of_the_month', $animals->pet_of_the_month());
        
        $pages = $this->loadModel('Page_all');
        $this->template->set('info_page', $pages->load_one_by_label($label, 'page'));

        $this->template->render();
    }

    private function page_selected(){
        if (isset($this->params[1]) && is_numeric($this->params[1])){
            return floor($this->params[1]);
        }
        else {
            return 1;
        }
    }
}