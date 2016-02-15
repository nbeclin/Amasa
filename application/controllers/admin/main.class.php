<?php

class Main extends Controller {

    function __construct(){
        parent::__construct('admin');
    }

    function index(){
        global $config;
        $template = $this->loadView('admin/admin');
        $template->set('static', $this->staticFiles);
        $template->set('title', $config['project']);
        $template->set('nav', 'admin/admin');
        $template->render();
    }

}