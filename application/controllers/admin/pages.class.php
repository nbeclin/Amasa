<?php

class Pages extends Controller {

    private $template;
    private $pages;

    function __construct(){
        parent::__construct('admin');
    }

    function index($action=false, $sub_param=false){
        $user_id = $this->session->get('user');
        if(!$user_id){
            $this->redirect('admin/login');
        }
        
        switch ($action) {
            case 'add':
                $template = $this->loadView('admin/pages/form');
                $template->set('static', $this->staticFiles);
                $template->set('nav', 'main');

                $pages = $this->loadModel('Page_all');
                $template->set('pages', $pages->all);

                $template->set('info_page', $this->loadModel('Page'));
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
                break;

        	default:
		    	$template = $this->loadView('admin/pages/main');
		        $template->set('static', $this->staticFiles);
		        $template->set('nav', 'main');

		        $pages = $this->loadModel('Page_all');
		    	$template->set('pages', $pages->all);
		}

        $user = $this->loadModel('User_all'); 
        $template->set('user', $user->load_one($this->session->get('user')));

        $template->render();
    }
}