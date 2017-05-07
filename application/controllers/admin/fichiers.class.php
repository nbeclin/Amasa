<?php

class Fichiers extends Controller {

    private $template;
    private $fichiers;

    function __construct(){
        parent::__construct('admin');
    }

    function index($action=false, $sub_param=false){
        $user_id = $this->session->get('user');
        if(!$user_id){
            $this->redirect('admin/login');
        }
        
        switch ($action) {
            case 'add':
                $template = $this->loadView('admin/fichiers/form');
                $template->set('static', $this->staticFiles);
                $template->set('nav', 'fichiers');

                $fichiers = $this->loadModel('Fichier_all');

                $template->set('info_fichier', $this->loadModel('fichier'));

                if (isset($_POST['form_fichier'])) {
                    $template->set('post', $_POST);

                    $post_result = $fichiers->register($_POST, $_FILES);
                    
                    if(isset($post_result['errors'])){
                        $template->set('errors', $post_result['errors']);
                    }
                    else {
                        $template->set('success', true);
                    }
                }
                break;

            case 'delete':
                $template = $this->loadView('admin/fichiers/main');
                $template->set('static', $this->staticFiles);
                $template->addJs('list-fichier', 'js');
                $template->set('nav', 'fichiers');

                $fichiers = $this->loadModel('Fichier_all');

                $result = $fichiers->delete_one($sub_param);

                if ($result[0]){
                    $template->set('delete_success', true);
                }
                else {
                    $template->set('delete_success', false);
                    $pages = $this->loadModel('Page_all');
                    $template->set('pages_selected',$pages->load_selected($result[1]));
                }

                $fichiers = $this->loadModel('Fichier_all');
                $template->set('fichiers', $fichiers->all);
                break;

            default:
                $template = $this->loadView('admin/fichiers/main');
                $template->set('static', $this->staticFiles);
                $template->addJs('list-fichier', 'js');
                $template->set('nav', 'fichiers');

                $fichiers = $this->loadModel('Fichier_all');
                $template->set('fichiers', $fichiers->all);
        }

        $user = $this->loadModel('User_all'); 
        $template->set('user', $user->load_one($this->session->get('user')));

        $template->render();
    }
}