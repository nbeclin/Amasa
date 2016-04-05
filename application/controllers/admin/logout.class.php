<?php
class Logout extends Controller {
    function __construct(){
        parent::__construct('admin');
    }
    
    function index(){
        $this->session->delete('user');
        $this->redirect('admin/login');
    }
}