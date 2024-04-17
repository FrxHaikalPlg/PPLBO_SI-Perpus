<?php 

class Register_model {
    private $table = 'mahasiswa';
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }


    public function registerData($data) {
        $nim = $data['nim'];
        $email = $data['email'];
        $password = $data['password'];
        $password2 = $data['password2'];

        //Cek Null
        if ($nim == null || $email == null || $password == null || $password2 == null) {
            return -1; // Input tidak boleh kosong
        }
        
        // Cek jika email sudah terdaftar
        $this->db->query("SELECT email FROM " . $this->table . " WHERE email = :email");
        $this->db->bind('email', $email);
        $this->db->execute();
        if ($this->db->rowCount() > 0) {
            return -2; // Email sudah terdaftar
        }

        // Cek jika NIM sudah terdaftar
        $this->db->query("SELECT nim FROM " . $this->table . " WHERE nim = :nim");
        $this->db->bind('nim', $nim);
        $this->db->execute();
        if ($this->db->rowCount() > 0) {
            return -3; // NIM sudah terdaftar
        }

        // Cek kecocokan password
        if ($password2 == null || $password == null || $password !== $password2) {
            return -4; // Password tidak cocok
        }

        // Enkripsi password
        $password = password_hash($password, PASSWORD_DEFAULT);

        // Tambahkan ke database
        $query = "INSERT INTO " . $this->table . " (nim, email, password) VALUES (:nim, :email, :password)";
        $this->db->query($query);
        $this->db->bind('nim', $nim);
        $this->db->bind('email', $email);
        $this->db->bind('password', $password);
        $this->db->execute();

        return $this->db->rowCount();
    }
}