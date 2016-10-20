<?php

class Users extends Controller {

    private $template;
    private $users;

    function __construct(){
        parent::__construct('admin');
    }

    function index($action=false, $sub_param=false){
        $user_id = $this->session->get('user');
        if(!$user_id){
            $this->redirect('admin/login');
        }

        $template = $this->loadView('admin/users/main');
        $template->set('static', $this->staticFiles);
        $template->set('nav', 'users');

        $users = $this->loadModel('User_all');
        $template->set('users', $users->load_all());

        $user = $this->loadModel('User_all'); 
        $template->set('user', $user->load_one($this->session->get('user')));

        $template->render();
    }
}