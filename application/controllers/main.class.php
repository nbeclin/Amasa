<?php

class Main extends Controller {

    function __construct(){
        parent::__construct();
    }

    function index(){
        global $config;
        $this->template = $this->loadView('front/pages/commun');
        $this->template->set('static', $this->staticFiles);
        $this->template->set('nav', 'main');
        $this->template->addCss('style', 'css');
        
        $animals = $this->loadModel('Animal_all');        
        $this->template->set('pet_of_the_month', $animals->pet_of_the_month());
        
        $pages = $this->loadModel('Page_all');
        $this->template->set('info_page', $pages->load_one_by_label('accueil', 'page'));

        $this->template->render();
    }

}