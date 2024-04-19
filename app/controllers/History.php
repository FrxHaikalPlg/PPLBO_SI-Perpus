<?php 

class History extends Controller {
    public function index() {
        $this->checkLogin();
        $data['judul'] = 'History';

        // Memanggil metode untuk memeriksa dan mengupdate status pinjaman
        $this->model('Pinjam_model')->periksaDanUpdateStatusPinjaman();

        // Mengambil data history pinjaman untuk ditampilkan
        $data['history'] = $this->model('Pinjam_model')->getHistoryPinjaman($_SESSION['user']['id']);

        $this->view('templates/header', $data);
        $this->view('history/index', $data);
        $this->view('templates/footer');
    }
}

