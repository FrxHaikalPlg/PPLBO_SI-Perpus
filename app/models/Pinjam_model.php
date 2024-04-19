<?php 

class Pinjam_model {
    private $table = 'pinjaman';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function simpanPeminjaman($id, $id_buku, $tanggal_pinjam, $tanggal_kembali) {
        $status = 'dipinjam'; // Status default ketika buku dipinjam
        $query = "INSERT INTO " . $this->table . " (id, id_buku, tanggal_pinjam, tanggal_kembali, status) VALUES (:id, :id_buku, :tanggal_pinjam, :tanggal_kembali, :status)";
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->bind('id_buku', $id_buku);
        $this->db->bind('tanggal_pinjam', $tanggal_pinjam);
        $this->db->bind('tanggal_kembali', $tanggal_kembali);
        $this->db->bind('status', $status); // Bind status
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function periksaDanUpdateStatusPinjaman() {
        $tanggalSekarang = date('Y-m-d');
        // Pertama, update status menjadi 'belum dikembalikan' untuk pinjaman yang terlambat
        $queryUpdateStatus = "UPDATE " . $this->table . " SET status = 'belum dikembalikan' WHERE tanggal_kembali < :tanggalSekarang AND status = 'dipinjam'";
        $this->db->query($queryUpdateStatus);
        $this->db->bind('tanggalSekarang', $tanggalSekarang);
        $this->db->execute();
    
        // Kemudian, hitung dan update denda untuk pinjaman yang terlambat
        $queryHitungDenda = "SELECT id_pinjaman, DATEDIFF(:tanggalSekarang, tanggal_kembali) AS hari_terlambat FROM " . $this->table . " WHERE status = 'belum dikembalikan'";
        $this->db->query($queryHitungDenda);
        $this->db->bind('tanggalSekarang', $tanggalSekarang);
        $pinjamanTerlambat = $this->db->resultSet();
    
        foreach ($pinjamanTerlambat as $pinjaman) {
            if ($pinjaman['hari_terlambat'] > 0) {
                $duitDenda = $pinjaman['hari_terlambat'] * 1000; // Rp. 1,000 per hari
                $denda = 'Rp. ' . $duitDenda;
                $queryUpdateDenda = "UPDATE " . $this->table . " SET denda = :denda WHERE id_pinjaman = :id_pinjaman";
                $this->db->query($queryUpdateDenda);
                $this->db->bind('denda', strval($denda));
                $this->db->bind('id_pinjaman', $pinjaman['id_pinjaman']);
                $this->db->execute();
            }
        }
    
        return $this->db->rowCount();
    }

    public function getHistoryPinjaman($userId) {
        // Query untuk mengambil data history pinjaman beserta judul buku
        $this->db->query("SELECT p.id_pinjaman, p.id, p.id_buku, p.tanggal_pinjam, p.tanggal_kembali, p.status, p.denda, b.judul FROM " . $this->table . " AS p JOIN buku AS b ON p.id_buku = b.id_buku WHERE p.id = :userId ORDER BY p.tanggal_pinjam DESC");
        $this->db->bind('userId', $userId);
        return $this->db->resultSet();
    }
}

