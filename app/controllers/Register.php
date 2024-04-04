<?php

class Register extends Controller {
    public function index() {
        $data['judul'] = 'Registrasi';
        $this->view('templates/header', $data);
        $this->view('register/index');
        $this->view('templates/footer');
    }

    public function register() {
        //var_dump($_POST);

        if( $this->model('Mahasiswa_model')->registerData($_POST) > 0){
            header('Location: '. BASEURL .'/login');
            Flasher::setFlash('Registrasi','Berhasil,', 'Silahkan Login' ,'success');
            exit;
        } else if (-1) {  // jika password dan konfirmasinya tidak sama
            Flasher::setFlash('Password tidak cocok!','', '' ,'danger');
            header('Location: '. BASEURL .'/register');
            exit;
        } else if (-2) { // jika email sudah terdaftar
            Flasher::setFlash('Email telah terdaftar!','', '' ,'danger');
            exit;
        } else if (-3) {  // jika NIM sudah terdaftar
            Flasher::setFlash('NIM telah terdaftar','', '' ,'danger');
            exit;
        } else {
            Flasher::setFlash('Registrasi','Gagal', '' ,'danger');
            header('Location: '. BASEURL .'/register');
            exit;
        }
    }
}