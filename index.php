<?php
session_start();
error_reporting(E_ALL);
date_default_timezone_set('Europe/Paris');

$dev = gethostname() != '' ? true : false;
define('DEV', $dev);

define('ROOT_DIR', realpath(dirname(__FILE__)).'/');
define('APP_DIR', ROOT_DIR .'application/');

try{
    if(!file_exists(APP_DIR.'config.php')){
        throw new Exception('Impossible de trouver le fichier config.php, veuillez dupliquer le fichier config-dist.php');
    }
    else {
        require(APP_DIR.'config.php');
    }
}
catch(Exception $e){
    die($e->getMessage());
}

require_once(ROOT_DIR.'core/model.class.php');
require_once(ROOT_DIR.'core/sqlmodel.class.php');
require_once(ROOT_DIR.'core/view.class.php');
require_once(ROOT_DIR.'core/controller.class.php');
require_once(ROOT_DIR.'core/core.class.php');

global $config;
define('BASE_URL', $config['base_url']);

$core = new Core($config);
