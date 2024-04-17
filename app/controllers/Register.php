<?php

class Register extends Controller {
    public function index() {
        $this->checkGuest();
        $data['judul'] = 'Registrasi';
        $this->view('templates/header', $data);
        $this->view('register/index');
        $this->view('templates/footer');
    }

    public function register() {
        $result = $this->model('Register_model')->registerData($_POST);
        if($result > 0){
            header('Location: '. BASEURL .'/login');
            Flasher::setFlash('Registrasi','Berhasil,', 'Silahkan Login' ,'success');
            exit;
        } else if ($result === -4) {  // jika password dan konfirmasinya tidak sama
            Flasher::setFlash('Password tidak cocok!','', '' ,'danger');
            header('Location: '. BASEURL .'/register');
            exit;
        } else if ($result === -2) { // jika email sudah terdaftar
            Flasher::setFlash('Email telah terdaftar!','', '' ,'danger');
            header('Location: '. BASEURL .'/register');
            exit;
        } else if ($result === -3) {  // jika NIM sudah terdaftar
            Flasher::setFlash('NIM telah terdaftar','', '' ,'danger');
            header('Location: '. BASEURL .'/register');
            exit;
        } else {
            Flasher::setFlash('Registrasi','Gagal, JANGAN NAKAL!', '' ,'danger');
            header('Location: '. BASEURL .'/register');
            exit;
        }
    }
}