<?php

class Animaux extends Controller {

    private $template;
    private $animaux;

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
        		$template = $this->loadView('admin/animaux/form');

		        $template->set('static', $this->staticFiles);
		        $template->set('nav', 'main');

		        $template->addJs('moment/moment', 'vendor');
		        $template->addJs('datetimepicker/datetimepicker', 'vendor');
        		$template->addJs('datetimepicker', 'js');

                $animaux = $this->loadModel('Animal_all');
                $template->set('animaux', $animaux->all);

                $template->set('info_animal', $this->loadModel('Animal'));

                if (isset($_POST['form_animal'])) {
                    
                    $template->set('post', $_POST);
                    $post_result = $animaux->register($_POST);

                    if($post_result){
                        $template->set('success', true);
                    }
                }
        		break;
            
            case 'modify':
                $template = $this->loadView('admin/animaux/form');
                
                $template->set('static', $this->staticFiles);
                $template->set('nav', 'main');

                $template->addJs('moment/moment', 'vendor');
                $template->addJs('datetimepicker/datetimepicker', 'vendor');
                $template->addJs('datetimepicker', 'js');
                
                $animaux = $this->loadModel('Animal_all');
                $template->set('animaux', $animaux->all);
                
                $template->set('info_animal', $animaux->load_one($sub_param));

                if (isset($_POST['form_animal'])) {

                    $template->set('post', $_POST);
                    $post_result = $animaux->register($_POST);

                    if($post_result){
                        $template->set('success', true);
                    }
                }
                break;

        	default:
		        $template = $this->loadView('admin/animaux/main');
		        $template->set('static', $this->staticFiles);
		        $template->set('nav', 'main');

                $animaux = $this->loadModel('Animal_all');
                
                if (isset($_POST['tri'])) {
                    $template->set('post', $_POST);
                    $template->set('animaux', $animaux->tri($_POST));
                }
                else {
                    $template->set('post', null);
                    $template->set('animaux', $animaux->all);
                }
        }
        
        $user = $this->loadModel('User_all'); 
        $template->set('user', $user->load_one($this->session->get('user')));

        $template->render();
    }
}