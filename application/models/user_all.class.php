<?php
class User_all extends Model {
    public $all = array();
    private $admin_grade = 1;
    public $user_per_page = 20;
    public function load_one($id){
        $user = new User($this->selectOne('user', '*', array('id' => (int)$id)));
        $user->is_admin = $this->is_admin($user);
        return $user;
    }
    public function load_all($id){
        foreach($this->selectAll('user', '*') as $user){
            $user->is_admin = $this->is_admin($user);
            array_push($this->all, new User($user));
        }
    }
    private function is_admin($user){
        if ($user->is_admin == $this->admin_grade){
            return true;
        }
        else {
            return false;
        }
    }
    public function login($post){
        $errors = $this->checkData($post, true);
        if(!empty($errors)){
            return array('in_error' => true, 'errors' => $errors);
        }
        try {
            $users = $this->selectAll('user', '*', array('login' => $post['login']));
            if(sizeof($users) > 1){
                $user_found = false;
                foreach($users as $user){
                    if($user['login'] == $post['login']){
                        $user_found = $user;
                    }
                }
                if(!$user_found){
                    throw new Exception('More than one user was found !');
                }
                $user = $user_found;
            }
            else {
                $user = $users[0];
            }
            if($user['blocked']){
                return array('in_error' => true, 'errors' => array('Votre compte est bloqué, veuillez contacter un administrateur du site'));
            }
            $success = array('user_id' => $user['id']);
            $data = array(
                'datetime'  => $this->escapeString(date('Y-m-d H:i:s')),
                'ip'    => $this->escapeString($this->getUserIp())
            );
            if(!$this->update('user', $data, array('id' => $user['id']))){
                return array('in_error' => true, 'errors' => array('Mise à jour des informations de connexion impossible'));
            }
            return array('in_error' => false, 'success' => $success);
        }
        catch(Exception $e){
            exit($e->getMessage());
        }
    }
    private function checkData($data, $login=false, $updating=false, $from_user=false){
        $errors = array();
        if(isset($data['login'])){
            if($data['login'] == ''){
                $errors['login'] = 'login vide';
            }
            elseif(strlen($data['login']) > 64 || strlen($data['login']) < 2){
                $errors['login'] = 'L\'login doit contenir entre 2 et 64 caract&eagrav;res';
            }
            elseif(preg_match('/^[a-z\d-_.]{2,64}$/i', $data['login']) == 0){
                $errors['login'] = 'L\'login ne doit pas contenir de caract&eagrav;res sp&eacute;ciaux';
            }
            if(!$login && !$updating){
                $existing_user = $this->selectOne('user', array('id', 'login'), array('login' => $data['login']));
                if($existing_user && $existing_user['login'] == $data['login']){
                    $errors['login'] = 'Utilisateur existant';
                }
            }
        }
        if(isset($data['email'])){
            if($data['email'] == ''){
                $errors['email'] = 'Adresse e-mail vide';
            }
            elseif(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)){
                $errors['email'] = 'Format d\'adresse e-mail invalide';
            }
            if(!$updating){
                $existing_user = $this->selectOne('user', 'id', array('email' => $data['email']));
                if($existing_user){
                    $errors['email'] = 'Utilisateur existant';
                }
            }
        }
        if(isset($data['password'])){
            if(!$updating && $data['password'] == ''){
                $errors['password'] = 'Mot de passe vide';
            }
            elseif(!$from_user && !isset($errors['login'])){
                $users = $this->selectAll('user', array('login', 'password'), array('login' => $data['login']));
                if(!$users){
                    $errors['login'] = 'Utilisateur introuvable';
                }
                elseif(sizeof($users) > 1){
                    $user_found = false;
                    foreach($users as $user){
                        if($user['login'] == $data['login']){
                            $user_found = $user;
                        }
                    }
                    if(!$user_found){
                        $errors['login'] = 'Probl&eagrav;me sur l\'login !';
                    }
                    $user = $user_found;
                }
                elseif(sizeof($users) == 1){
                    $user = $users[0];
                }
                elseif($user && !$this->checkPassword($data['password'], $user['password'])){
                    $errors['password'] = 'Mot de passe erron&eacute;';
                }
            }
            if($from_user && $data['password'] != ''){
                if($data['password_confirm'] == ''){
                    $errors['password_confirm'] = 'Mot de passe de confirmation vide';
                }
                elseif($data['password'] != $data['password_confirm']){
                    $errors['password'] = 'Les deux mots de passe ne correspondent pas';
                    $errors['password_confirm'] = '';
                }
            }
        }
        return $errors;
    }
    private function getUserIp(){
        if(!empty($_SERVER['HTTP_CLIENT_IP'])){
            return $_SERVER['HTTP_CLIENT_IP'];
        }
        elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
            return $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        else {
            return $_SERVER['REMOTE_ADDR'];
        }
    }
    public function countAll(){
        return sizeof($this->selectAll('user', 'id'));
    }
    public function search($data, $page=1){
        $users = array();
        $params = 'login LIKE "%'.$data.'%" OR email LIKE "%'.$data.'%" ORDER BY login ASC';
        $users_results = $this->selectAll('user', '*', array(), $params);
         foreach($users_results as $user){
            $loaded_user = $this->load_one($user);
            $users[$loaded_user->id] = $loaded_user;
        }
        return $users;
    }
    public function create($post, $from_user=false){
        $errors = $this->checkData($post, false, false, $from_user);
        if(!empty($errors)){
            return array('in_error' => true, 'errors' => $errors);
        }
        $user_password = !$from_user ? $this->generatePassword() : $post['password'];
        $data = array(
            'login'   => $post['login'],
            'points'        => 0.0,
            'email'         => $post['email'],
            'password'    => $this->hashPassword($user_password),
            'datetime'          => date('Y-m-d H:i:s'),
            'ip'            => $this->getUserIp()
        );
        $user_id = $this->insertOne('user', $data);
        if(!$user_id){
            return array('in_error' => true, 'errors' => array('Enregistrement de l\'utilisateur impossible'));
        }
        $success = array(
            'user_password' => $user_password,
            'user_id' => $user_id
        );
        if($from_user){
            $user = $this->selectOne('user', '*', array('login' => $user_id));
            $success['user'] = $this->load_one($user);
        }
        return array('in_error' => false, 'success' => $success);
    }
    public function updateData($post, $by='user'){
        $from_user = $by == 'user' ? true : false;
        $errors = $this->checkData($post, false, true, $from_user);
        if(!empty($errors)){
            return array('in_error' => true, 'errors' => $errors);
        }
        $data = array();
        if(isset($post['login'])){
            $data['login'] = $this->escapeString($post['login']);
        }
        if(isset($post['email'])){
            $data['email'] = $this->escapeString($post['email']);
        }
        if(isset($post['password']) && $post['password'] != ''){
            $data['password'] = $this->escapeString($this->hashPassword($post['password']));
        }
        $data['site_grade'] = isset($post['site_grade']) && $post['site_grade'] != '' ? $post['site_grade'] : 0;
        if(isset($post['lost_attempts'])){
            $data['lost_attempts'] = $post['lost_attempts'];
        }
        if(isset($post['blocked'])){
            $data['blocked'] = $post['blocked'];
        }
        if(!$this->update('user', $data, array('id' => $post['user_id']))){
            return array('in_error' => true, 'errors' => array('Enregistrement de l\'utilisateur impossible'));
        }
        return array('in_error' => false, 'success' => true);
    }
    public function remove(){
        if(!$this->delete('user', array('id' => $this->id))){
            return array('in_error' => true, 'errors' => array('Suppression du membre impossible'));
        }
        return array('in_error' => false, 'success' => true);
    }
    public function loginLost($email){
        $user = $this->selectOne('user', '*', array('email' => $email));
        if(!$user){
            return array('in_error' => true, 'errors' => array('Adresse e-mail introuvable'));
        }
        $message = 'Vous avez effectu&eacute; une demande de r&eacute;cup&eacute;ration d\'login sur le site 31pattesdamour.fr.
            '."\n".'Votre adresse e-amil est li&eacute;e à l\'login : '.$user['login'];
        if(!mail($user['email'], '[31pattesdamour.fr] R&eacute;cup&eacute;ration d\'login', $message)){
            return array('in_error' => true, 'errors' => array('Impossible d\'envoyer le mail'));
        }
        if($this->incrementLostAttempts($user)){
            return array('in_error' => false, 'success' => $user['email']);
        }
        return array('in_error' => true, 'errors' => array('Votre compte est bloqué car trop de tentatives, un message est parvenu à l\'administrateur du site'));
    }
    public function passwordLost($login){
        $users = $this->selectAll('user', '*', array('login' => $login));
        if(!$users){
            return array('in_error' => true, 'errors' => array('login introuvable'));
        }
        elseif(sizeof($users) > 1){
            $user_found = false;
            foreach($users as $user){
                if($user['login'] == $login){
                    $user_found = $user;
                }
            }
            if(!$user_found){
                return array('in_error' => true, 'errors' => array('Probl&eagrav;me sur l\'login !'));
            }
        }
        elseif(sizeof($users) == 1){
            $user = $users[0];
        }
        $link = base64_encode('action=reset-password&id='.$user['id']);
        $url = BASE_URL.'reset_password/'.$link;
        $message = 'Vous avez effectu&eacute; une demande de r&eacute;cup&eacute;ration de mot de passe sur le site 31pattesdamour.fr.
            '."\n".'Veuillez cliquer sur le lien suivant pour le r&eacute;initialiser : http://31pattesdamour.fr/'.$url;
        if(!mail($user['email'], '[31pattesdamour.fr] R&eacute;cup&eacute;ration de mot de passe', $message)){
            return array('in_error' => true, 'errors' => array('Impossible d\'envoyer le mail'));
        }
        if($this->incrementLostAttempts($user)){
            return array('in_error' => false, 'success' => true);
        }
        return array('in_error' => true, 'errors' => array('Votre compte est bloqué car trop de tentatives, un message est parvenu à l\'administrateur du site'));
    }
    public function resetPassword($post, $user_id){
        $errors = $this->checkData($post, false, false, true);
        if(!empty($errors)){
            return array('in_error' => true, 'errors' => $errors);
        }
        $user = $this->selectOne('user', '*', array('id' => (int)$user_id));
        if(!$user){
            return array('in_error' => true, 'errors' => array('Utilisateur introuvable'));
        }
        $data = array('password' => $this->escapeString($this->hashPassword($post['password'])));
        if(!$this->update('user', $data, array('id' => (int)$user_id))){
            return array('in_error' => true, 'errors' => array('Mise à jour du mot de passe impossible'));
        }
        return array('in_error' => false, 'success' => true);
    }
    
    private function generatePassword($length=8){
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
        $password = substr(str_shuffle($chars), 0, $length);
        return $password;
    }
    private function hashPassword($password){
        return password_hash($password, PASSWORD_DEFAULT);
    }
    private function checkPassword($password, $hash){
        return password_verify($password, $hash);
    }
    private function incrementLostAttempts($user){
        if($user['lost_attempts'] <= 2){
            $user['lost_attempts'] ++;
            $this->updateData(array('lost_attempts' => $user['lost_attempts'], 'user_id' => $user['id']));
            return true;
        }
        else {
            $user['blocked'] = true;
            $this->updateData(array('blocked' => 1, 'user_id' => $user['id']));
            global $config;
            $message = 'Bonjour,'."\n".'Le compte de '.$user['login'].' ('.$user['email'].') est bloqué.';
            foreach($config['admins'] as $admin_mail){
                mail($admin_mail, '[31pattesdamour.fr] Compte bloqué', $message);
            }
            return false;
        }
    }
    public function unblock(){
        $this->lost_attempts = 0;
        $this->blocked = 0;
        $data = array('user_id' => $this->id, 'lost_attempts' => $this->lost_attempts, 'blocked' => $this->blocked);
        return $this->updateData($data);
    }
}