<?php 

class Pinjam_model {
    private $table = 'pinjaman';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function simpanPeminjaman($id, $id_buku, $tanggal_pinjam, $tanggal_kembali) {
        $query = "INSERT INTO " . $this->table . " (id, id_buku, tanggal_pinjam, tanggal_kembali) VALUES (:id, :id_buku, :tanggal_pinjam, :tanggal_kembali)";
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->bind('id_buku', $id_buku);
        $this->db->bind('tanggal_pinjam', $tanggal_pinjam);
        $this->db->bind('tanggal_kembali', $tanggal_kembali);
        $this->db->execute();

        return $this->db->rowCount();
    }
}

