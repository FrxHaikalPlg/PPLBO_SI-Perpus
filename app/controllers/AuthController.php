<?php

class AuthController extends Controller {
    public function logout() {
        // Hapus semua data sesi
        session_unset();
        session_destroy();

        // Arahkan kembali ke halaman login atau home
        header('Location: ' . BASEURL . '/login');
        exit;
    }
}