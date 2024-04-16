<?php 

class History extends Controller {
    public function index() {
        $this->checkLogin();
        $data['judul'] = 'History';
        $this->view('templates/header', $data);
        $this->view('history/index');
        $this->view('templates/footer');
    }
}

