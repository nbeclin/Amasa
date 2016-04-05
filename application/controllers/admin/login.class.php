<?php
class Login extends Controller {
    function __construct(){
        parent::__construct('admin');
    }
    function index(){   
        
        $user_id = $this->session->get('user');
        if($user_id){
            $this->redirect('');
        }

        $from = isset($_GET['from']) ? $_GET['from'] : false;
        $template = $this->loadView('admin/users/login');
        $user = $this->loadModel('User_all'); 
        if(isset($_POST['submit_user'])){
            $login = $user->login($_POST);
            if(isset($login['in_error']) && $login['in_error']){
                $template->set('errors', $login['errors']);
            }
            elseif(isset($login['success'])){
                $this->session->set('user', $login['success']['user_id']);
                $this->session->set('password', $login['success']['user_id']);
                $this->redirect('admin'.$from);
            }
        }

        $template->set('static', $this->staticFiles);
        $template->set('title', 'Connexion');
        $template->set('nav', 'login');
        $template->render();
    }
}