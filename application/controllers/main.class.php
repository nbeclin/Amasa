<?php

class Main extends Controller {

    function __construct(){
        parent::__construct();
    }

    function index(){
        global $config;
        $this->redirect('pages/accueil');
    }

}