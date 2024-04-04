<?php

class Mahasiswa extends Controller {
    public function index() {
        $data['judul'] = 'Daftar Mahasiswa';
        $data['mhs'] = $this->model('Mahasiswa_model')->getAllMahasiswa();
        $this->view('templates/header', $data);
        $this->view('mahasiswa/index',  $data);
        $this->view('templates/footer');
    }

    public function detail($id) {
        $data['judul'] = 'Detail Mahasiswa';
        $data['mhs'] = $this->model('Mahasiswa_model')->getMahasiswaBYId($id);
        $this->view('templates/header', $data);
        $this->view('mahasiswa/detail',  $data);
        $this->view('templates/footer');
    }

    public function tambah() {
        

        if( $this->model('Mahasiswa_model')->tambahDataMahasiswa($_POST) > 0){
            Flasher::setFlash('data','berhasil', 'ditambahkan' ,'success');
            header('Location: '. BASEURL .'/mahasiswa');
            exit;
        } else {
            Flasher::setFlash('data','gagal', 'ditambahkan' ,'danger');
            header('Location: '. BASEURL .'/mahasiswa');
            exit;
        }
    }
    
    public function register() {
        

        if( $this->model('Mahasiswa_model')->registerData($_POST) > 0){
            header('Location: '. BASEURL .'/login');
            Flasher::setFlash('Registrasi','Berhasil,', 'Silahkan Login' ,'success');
            exit;
        } else if (-1) {  // jika password dan konfirmasinya tidak sama
            Flasher::setFlash('Password tidak cocok!','', '' ,'danger');
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