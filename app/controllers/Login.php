<?php

class Login extends Controller {
    public function index() {
        $this->checkGuest();
        $data['judul'] = 'Login';
        $this->view('templates/header', $data);
        $this->view('login/index');
        $this->view('templates/footer');
    }

    public function login(){
        $email = $_POST['email'];
        $password = $_POST['password'];
    
        $user = $this->model('Login_model')->getUserByEmail($email);
    
        if($user){
            if($this->model('Login_model')->verifyPassword($password, $user['password'])){
                $_SESSION['user'] = $user;
                $_SESSION['user_logged_in'] = true;
                header('Location: ' . BASEURL);
                exit;
            } else {
                Flasher::setFlash('Gagal', 'Password salah','', 'danger');
                header('Location: ' . BASEURL . '/login');
                exit;
            }
        } else {
            Flasher::setFlash('Gagal', 'Email tidak ditemukan','', 'danger');
            header('Location: ' . BASEURL . '/login');
            exit;
        }
    }
}
