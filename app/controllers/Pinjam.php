<?php 


class Pinjam extends Controller {
    public function peminjaman() {
        if(isset($_POST['submit'])) {
            $this->checkLogin();

            $id = $_SESSION['user']['id'];
            $id_buku = $_POST['id_buku'];

            // Cek stok buku
            $buku = $this->model('Buku_model')->getBukuById($id_buku);
            if($buku['stok'] <= 0) {
                $_SESSION['pesan'] = 'Peminjaman <strong>gagal</strong>, stok buku kosong!';
                $_SESSION['tipe_pesan'] = 'danger';
                header('Location: ' . BASEURL . '/home');
                exit;
            }

            $tanggal_pinjam = $_POST['tanggal_pinjam'];
            $tanggal_kembali = $_POST['tanggal_kembali'];

            // Memanggil model untuk menyimpan data
            if($this->model('Pinjam_model')->simpanPeminjaman($id, $id_buku, $tanggal_pinjam, $tanggal_kembali) > 0) {
                // Jika berhasil, kurangi stok buku
                if($this->model('Buku_model')->kurangiStokBuku($id_buku) > 0 ) {
                    $_SESSION['pesan'] = 'Peminjaman <strong>berhasil!</strong>';
                    $_SESSION['tipe_pesan'] = 'success';
                    header('Location: ' . BASEURL . '/home');
                    exit;
                } else {
                    $_SESSION['pesan'] = 'Peminjaman <strong>gagal</strong>, stok buku kosong!';
                    $_SESSION['tipe_pesan'] = 'danger';
                    header('Location: ' . BASEURL . '/home');
                    exit;
                }
            } else {
                $_SESSION['pesan'] = 'Gagal!';
                $_SESSION['tipe_pesan'] = 'danger';
                header('Location: ' . BASEURL . '/home');
                exit;
            }
            // Redirect ke halaman utama atau tampilkan pesan sukses
            
        }
        
    } 
}

