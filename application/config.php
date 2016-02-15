<?php
$config['base_url'] = 'AMASA/administration/';
$config['project'] = 'AMASA';
$config['admins'] = array();
$config['default_controller'] = 'main';
$config['default_admin_controller'] = 'main';
$config['error_controller'] = 'customerror';
$config['admin_mode'] = 'admin';
$config['base_template'] = 'base';
$config['base_template_admin'] = 'admin';
$config['db_host'] = 'localhost';
$config['db_name'] = 'perso';
$config['db_username'] = 'root';
$config['db_password'] = 'nicolas';
$config['autoload'] = array(
    'plugins' => array(),
    'helpers' => array('session', 'url', 'staticFiles')
);
