<?php

class Pages extends Controller {

    private $template;
    private $pages;

    function __construct(){
        parent::__construct();
    }

    function index($action=false, $sub_param=false){

        if (isset($_POST['submit_form_contact'])) {
            $pages = $this->loadModel('Page_all');
            $result_form_contact = $pages->send_form_contact($_POST);
        }
        else {
            $result_form_contact = null;
        }

        $stats = $this->loadModel('Stat_all');

        if (isset($_SERVER['HTTP_REMOTE_IP'])){
            //spam detected
            $startip = explode('.', $_SERVER['HTTP_REMOTE_IP']);
            $startip = $startip[0].$startip[1];
            if ($startip == '188143'){
                $this->redirect('error404');
            }
            $stats->register($_SERVER['HTTP_REMOTE_IP']);
        }
        else {
            $stats->register('0.0.0.0');
        }    
    	
        $animals = $this->loadModel('Animal_all');

        switch ($action){
            case 'adopte':
                $template = $this->loadView('front/pages/adopte');
                $template->set('nav', 'main');

                $template->set('pet_of_the_month', $animals->pet_of_the_month());

                $template->set('title', 'Adoptés en '.$this->params[0]);
                $template->set('page', $this->page_selected());
                $template->set('selected', $animals->count_tri(array(
                    'categorie' => 'adopte', 
                    'anneeAdoption' => $this->params[0]
                    )));
                $template->set('year', $this->params[0]);
                $template->set('cpt', 0);
                $template->set('animals', $animals->tri(array(
                    'categorie' => 'adopte', 
                    'anneeAdoption' => $this->params[0]
                    ), $this->page_selected()));
                break;

            case 'adoption':
                $template = $this->loadView('front/pages/adoption');
                $template->set('nav', 'main');

                $template->set('pet_of_the_month', $animals->pet_of_the_month());

                $error_type = false;

                switch ($this->params[0]){
                    case 'chat':
                        $type = 'chat';
                        $title = 'Chats à l\'adoption';
                        break;

                    case 'chaton':
                        $type = 'chaton';
                        $title = 'Chatons à l\'adoption';
                        break;

                    case 'chien':
                        $type = 'chien';
                        $title = 'Chien à l\'adoption';
                        break;

                    default:
                        $error_type = true;
                }
                
                if($error_type == true){
                    $template = $this->loadView('error404');
                    $template->set('title', 'ERREUR 404');
                    $template->set('nav', null);
                }
                else {
                    $categorie = 'adoption';

                    $template->set('title', $title);
                    $template->set('page', $this->page_selected());
                    $template->set('selected', $animals->count_tri(array(
                        'categorie' => $categorie, 
                        'type' => $type, 
                        'paradis' => '0'
                        )));
                    $template->set('category', $this->params[0]);
                    $template->set('cpt', 0);
                    $template->set('animals', $animals->tri(array(
                        'categorie' => $categorie, 
                        'type' => $type, 
                        'paradis' => '0'
                        ),$this->page_selected()));
                }
            
                break;

            case 'paradis':
                $template = $this->loadView('front/pages/paradis');
                $template->set('nav', 'main');

                $template->set('pet_of_the_month', $animals->pet_of_the_month());

                $categorie = 'adoption';

                $template->set('title', 'Les Anges d\'Amasa');
                $template->set('page', $this->page_selected());
                $template->set('selected', $animals->count_tri(array(
                    'paradis' => '1'
                    )));
                $template->set('cpt', 0);
                $template->set('animals', $animals->tri(array(
                    'paradis' => '1'
                    ),$this->page_selected()));
            
                break;

            case 'parrainer' :
                $pages = $this->loadModel('Page_all');
                $load_page = $pages->load_one_by_label($action, 'page');
            
                if($load_page->id == null){
                    $template = $this->loadView('error404');
                    $template->set('title', 'ERREUR 404');
                    $template->set('nav', null);
                }
                else{
                    $template = $this->loadView('front/pages/commun');
                    $template->set('nav', 'main');       
                    $template->set('info_page', $load_page);
                }
                
                $template->set('cpt', 0);
                $template->set('animals', $animals->tri(array('parrainage' => '1')));
                $template->set('parrainer', true);
                break;

    		default:
                $pages = $this->loadModel('Page_all');
                $load_page = $pages->load_one_by_label($action, 'page');
            
                if($load_page->id == null){
                    $template = $this->loadView('error404');
                    $template->set('title', 'ERREUR 404');
                    $template->set('nav', null);
                }
                else{
                    $template = $this->loadView('front/pages/commun');
                    $template->set('nav', 'main');       
                    $template->set('info_page', $load_page);
                }
    	}

        $template->set('pictures', $this->load_banner_photo());
        $template->set('static', $this->staticFiles);
        $template->addCss('style', 'css');

        $template->set('result_form_contact', $result_form_contact);
        $template->set('pet_of_the_month', $animals->pet_of_the_month());
        $template->render();
    }

    private function page_selected(){
        if (isset($this->params[1]) && is_numeric($this->params[1])){
            return floor($this->params[1]);
        }
        else {
            return 1;
        }
    }

    private function load_banner_photo(){
        $files = scandir('img/bandeau/');
        $results = array();
        foreach ($files as $file) {
            if (!($file == '.' || $file == '..')){ 
                array_push($results, 'http://'.$_SERVER['HTTP_HOST'].'/'.BASE_URL.'img/bandeau/'.$file);
            }           
        }
        return $results;
    }
}

