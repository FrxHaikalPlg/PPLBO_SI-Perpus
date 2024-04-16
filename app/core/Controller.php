<?php

class Controller {
    public function view($view, $data = []) {
        require_once  '../app/views/' . $view . '.php';
    }

    public function model($model, $data = []) {
        require_once  '../app/models/' . $model . '.php';
        return new $model;
    }

    protected function checkLogin() {
        // Misalkan Anda menyimpan informasi login di session dengan key 'is_logged_in'
        if (!isset($_SESSION['user_logged_in'])) {
            header('Location: ' . BASEURL . '/login');
            exit;
        }
    }

    protected function checkGuest() {
        // Jika pengguna sudah login, redirect ke home
        if (isset($_SESSION['user_logged_in'])) {
            header('Location: ' . BASEURL . '/home');
            exit;
        }
    }
}