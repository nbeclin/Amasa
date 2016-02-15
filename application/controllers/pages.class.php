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
    			$template = $this->loadView('front/pages/commun');
		        $template->set('static', $this->staticFiles);
		        $template->set('nav', 'main');
       			$template->addCss('style', 'css');

		        $pages = $this->loadModel('Page_all');
                $template->set('pages', $pages->all);
            	$template->set('info_page', $pages->load_one(1, 'page'));
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
}