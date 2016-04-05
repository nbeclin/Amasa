<?php

class Main extends Controller {

    function __construct(){
        parent::__construct('admin');
    }

    function index(){
        $user_id = $this->session->get('user');
        if(!$user_id){
            $this->redirect('admin/login');
        }
        
        global $config;
        $template = $this->loadView('admin/admin');
        $template->set('static', $this->staticFiles);
        $template->set('title', $config['project']);
        $template->set('nav', 'admin/admin');
        
        $user = $this->loadModel('User_all'); 
        $template->set('user', $user->load_one($this->session->get('user')));
        
        $template->render();
    }

}