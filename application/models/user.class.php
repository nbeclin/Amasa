<?php
class User extends SqlModel{
    public $id;
    public $login;
    public $site_grade;
    public $email;
    public $password;
    public $datetime;
    public $ip;
    public $blocked;
    public $lost_attempts;
    
    public function __construct($data){
        parent::__construct($data);
    }
}