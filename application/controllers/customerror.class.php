<?php
class CustomError extends Controller {

    function index(){
        $this->error404();
    }

    function error404(){
        $template = $this->loadView('error404');
        $template->set('static', $this->staticFiles);
        $template->addCss('style', 'css');
        $template->set('title', 'ERREUR 404');
        $template->set('nav', null);
        
        $user = $this->loadModel('User_all'); 
        var_dump($this->session->get('user'));
        $template->set('user', ($this->session->get('user')) ? $user->load_one($this->session->get('user')) : $this->loadModel('User'));
        
        $template->render();
    }

}