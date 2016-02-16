<?php

class Pages extends Controller {

    private $template;
    private $pages;

    function __construct(){
        parent::__construct();
    }

    function index($action=false, $sub_param=false){
    	
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

            case 'adopte':
                $template = $this->loadView('front/pages/adopte');
                $template->set('static', $this->staticFiles);
                $template->set('nav', 'main');
                $template->addCss('style', 'css');

                $animaux = $this->loadModel('Animal_all');
                $template->set('title', 'Adoptés en '.$sub_param);
                $template->set('animaux', $animaux->tri(array('categorie' => 'adopte', 'anneeAdoption' => $sub_param)));
                $template->set('cpt', 0);

                $template->render();
                break;

            case 'adoption':
                $template = $this->loadView('front/pages/adoption');
                $template->set('static', $this->staticFiles);
                $template->set('nav', 'main');
                $template->addCss('style', 'css');

                switch ($sub_param){
                    case 'chat':
                        $categorie = 'adoptionChat';
                        break;

                    case 'chaton':
                        $categorie = 'adoptionChaton';
                        break;

                    case 'chien':
                        $categorie = 'adoptionChien';
                        break;
                }

                $animaux = $this->loadModel('Animal_all');
                $template->set('animaux', $animaux->tri(array('categorie' => $categorie)));

                $template->render();
            
                break;

    		default:
    		$template = $this->loadView('error404');
	        $template->set('static', $this->staticFiles);
	        $template->addCss('style', 'css');
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
        
        $pages = $this->loadModel('Page_all');
        $this->template->set('info_page', $pages->load_one_by_label($label, 'page'));

        $this->template->render();
    }
}