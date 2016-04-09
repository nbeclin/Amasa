<?php

class Photos extends Controller {

    private $template;
    private $photos;

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
                $template = $this->loadView('admin/photos/form');
                $template->set('static', $this->staticFiles);
                $template->set('nav', 'main');

                $photos = $this->loadModel('Photo_all');

                if (isset($_POST['add_photo'])) {
                    $template->set('post', $_POST);
                    $post_result = $photos->register($_POST, $_FILES);
                    if($post_result){
                        $template->set('success', true);
                    }
                    else {
                        $template->set('nosuccess', $photo->error);
                    }
                }                    
                break;

            case 'modify':
                break;

            default:
                $template = $this->loadView('admin/photos/main');
                $template->set('static', $this->staticFiles);
                $template->set('nav', 'main');

                $photos = $this->loadModel('Photo_all');
                $template->set('photos', $photos->all);
        }

        $user = $this->loadModel('User_all'); 
        $template->set('user', $user->load_one($this->session->get('user')));

        $template->render();
    }
}