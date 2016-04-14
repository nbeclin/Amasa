<?php

class Stats extends Controller {

    private $template;
    private $stats;

    function __construct(){
        parent::__construct('admin');
    }

    function index($action=false, $sub_param=false){
        $user_id = $this->session->get('user');
        if(!$user_id){
            $this->redirect('admin/login');
        }

        $template = $this->loadView('admin/stats/main');
        $template->set('static', $this->staticFiles);
        $template->set('nav', 'stats');

        $stats = $this->loadModel('Stat_all');
        $template->set('stats', $stats->all);

        $user = $this->loadModel('User_all'); 
        $template->set('user', $user->load_one($this->session->get('user')));

        $template->render();
    }
}