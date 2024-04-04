<?php

class Mahasiswa_model {
    private $table = 'mahasiswa';
    private $db;
    
    public function __construct() {
        $this->db = new Database();
    }

    public function getAllMahasiswa(){
        $this->db->query( "SELECT * FROM ". $this->table );
        return $this->db->resultSet();
    }

    public function getMahasiswaById($id){
        $this->db->query('SELECT * FROM '.$this->table.' WHERE id=:id');

        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function registerData($data) {
        $nim = $data[ 'nim' ];
        $email =  $data['email'];
        $password = $data['password'];
        $password2  = $data['password2'];

        //cek jika nim sudah terdaftar
        $query = "SELECT nim FROM  mahasiswa WHERE nim = '$nim'";
        $this->db->query($query);
        

        //cek kecocokan password
        if($password !== $password2){
            return -1;
        } 

        //enkripsi password
        $password = password_hash($password, PASSWORD_DEFAULT);
        
        //tambahkan database
        $query = "INSERT INTO mahasiswa VALUES ('', :nim, :email, :password)";
        $this->db->query($query);
        
        $this->db->bind('nim',$nim);
        $this->db->bind('email',$email);
        $this->db->bind('password',$password);

        $this->db->execute();

        return $this->db->rowCount();
    }
}



