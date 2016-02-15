<?php

class Pages extends Controller {

    private $template;
    private $pages;

    function __construct(){
        parent::__construct('admin');
    }

    function index($action=false, $sub_param=false){
         switch ($action) {
            case 'add':
                $template = $this->loadView('admin/pages/form');
                $template->set('static', $this->staticFiles);
                $template->set('nav', 'main');

                $pages = $this->loadModel('Page_all');
                $template->set('pages', $pages->all);

                $template->set('info_page', $this->loadModel('Page'));
                
                $template->render();
                break;

        	case 'modify_page':
                $template = $this->loadView('admin/pages/form');
		        $template->set('static', $this->staticFiles);
		        $template->set('nav', 'main');

		        $pages = $this->loadModel('Page_all');
                $template->set('pages', $pages->all);
            	
            	$template->set('info_page', $pages->load_one($sub_param, 'page'));
                
                if (isset($_POST['modif_page'])) {
                    
                    $template->set('post', $_POST);
                    $post_result = $pages->register($_POST, 'page');
                    
                    if($post_result){
                        $template->set('success', true);
                    }
                }

                $template->render();
        		break;

            case 'modify_sous_page':
                $template = $this->loadView('admin/pages/form');
                $template->set('static', $this->staticFiles);
                $template->set('nav', 'main');

                $pages = $this->loadModel('Page_all');
                $template->set('pages', $pages->all);
                
                $template->set('info_page', $pages->load_one($sub_param, 'sous_page'));
                
                if (isset($_POST['modif_page'])) {
                    
                    $template->set('post', $_POST);
                    $post_result = $pages->register($_POST, 'sous_page');
                    
                    if($post_result){
                        $template->set('success', true);
                    }
                }

                $template->render();
                break;

        	default:
		    	$template = $this->loadView('admin/pages/main');
		        $template->set('static', $this->staticFiles);
		        $template->set('nav', 'main');

		        $pages = $this->loadModel('Page_all');
		    	$template->set('pages', $pages->all);

				$template->render();
		}
    }
}