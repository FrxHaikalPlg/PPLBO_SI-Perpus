<?php 
class Login_model {
    private $table = 'mahasiswa';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getUserByEmail($email)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE email=:email');
        $this->db->bind('email', $email);
        return $this->db->single();
    }

    public function verifyPassword($inputPassword, $storedPassword)
    {
        return password_verify($inputPassword, $storedPassword);
    }
}
