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
                $this->proceed(1);
                break;

            case 'bureau':
                $this->proceed(3);
                break;

            case 'condAdoption':
                $this->proceed(4);
                break;

            case 'devFamille':
                $this->proceed(5);
                break;

            case 'adherer':
                $this->proceed(6);
                break;

            case 'don':
                $this->proceed(7);
                break;

            case 'parrainer':
                $this->proceed(8);
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

    private function proceed($idPage){
        $this->template = $this->loadView('front/pages/commun');
        $this->template->set('static', $this->staticFiles);
        $this->template->set('nav', 'main');
        $this->template->addCss('style', 'css');

        $pages = $this->loadModel('Page_all');
        $this->template->set('pages', $pages->all);
        $this->template->set('info_page', $pages->load_one($idPage, 'page'));
        $this->template->render();
    }
}