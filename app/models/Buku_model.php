<?php 

class Buku_model {
    private $table = 'buku';
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getAllBuku(){
        $this->db->query( "SELECT * FROM ". $this->table );
        return $this->db->resultSet();
    }

    public function getBukuById($id){
        $this->db->query('SELECT * FROM '.$this->table.' WHERE id_buku=:id_buku');

        $this->db->bind('id_buku', $id);
        return $this->db->single();
    }

    public function kurangiStokBuku($id_buku) {
         // Cek stok saat ini
        $this->db->query("SELECT stok FROM buku WHERE id_buku = :id_buku");
        $this->db->bind('id_buku', $id_buku);
        $stokSaatIni = $this->db->single()['stok'];

        if($stokSaatIni <= 0) {
            // Handle jika stok 0 atau kurang
            return -1;
        }

        $this->db->query("UPDATE {$this->table} SET stok = stok - 1 WHERE id_buku = :id_buku AND stok > 0");
        $this->db->bind('id_buku', $id_buku);
        $this->db->execute();
        
        return $this->db->rowCount();
    }
}

