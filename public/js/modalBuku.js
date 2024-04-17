document.addEventListener('DOMContentLoaded', function () {
    var viewButtons = document.querySelectorAll('.view-btn');
    viewButtons.forEach(function(btn) {
        btn.onclick = function() {
            var id = this.getAttribute('data-id');
            var judul = this.getAttribute('data-judul');
            var pengarang = this.getAttribute('data-pengarang');
            var penerbit = this.getAttribute('data-penerbit');
            var tahun_terbit = this.getAttribute('data-tahun_terbit');
            var stok = this.getAttribute('data-stok');
            var gambar_sampul = this.getAttribute('data-gambar_sampul');
            var dlss = this.getAttribute('data-dlss') === 'true';
            var today = new Date().toISOString().split('T')[0]; // Mendapatkan tanggal saat ini dalam format YYYY-MM-DD

            // Mengatur batasan minimal tanggal_kembali ke hari esok
            var tomorrow = new Date();
            tomorrow.setDate(tomorrow.getDate() + 1); // Menambahkan 1 hari
            var minDate = tomorrow.toISOString().split('T')[0];
            var sebulan = new Date();
            sebulan.setDate(sebulan.getDate() + 32);
            var maxDate = sebulan.toISOString().split('T')[0];
            document.querySelector('[name="tanggal_kembali"]').setAttribute('min', minDate);
            document.querySelector('[name="tanggal_kembali"]').setAttribute('max', maxDate);

            // Update konten modal
            document.getElementById('judul_buku').textContent = ": " + judul;
            document.getElementById('pengarang').textContent = ": " + pengarang;
            document.getElementById('penerbit').textContent = ": " + penerbit;
            document.getElementById('tahun_terbit').textContent = ": " + tahun_terbit;
            document.getElementById('jumlah').textContent = ": " + stok;
            document.getElementById('sampul').src = "http://localhost/PPLBO_SI-Perpus/public/img/" + gambar_sampul;

            // Set tanggal_pinjam ke tanggal saat ini
            document.querySelector('[name="tanggal_pinjam"]').value = today;

            // Set id_buku dan reset tanggal_pinjam
            document.getElementById('id_buku').value = id;
            document.querySelector('[name="tanggal_kembali"]').value = ''; // Reset tanggal_kembali

            // Cek stok dan disable/enable input tanggal_kembali dan tombol pinjam
            var alertStokKosong = document.getElementById('alert-stok-kosong');
            if(stok <= 0) {
                document.querySelector('[name="tanggal_kembali"]').disabled = true;
                document.querySelector('[name="submit"]').disabled = true;
                if (!alertStokKosong) {
                    var alertDiv = document.createElement('div');
                    alertDiv.id = 'alert-stok-kosong';
                    alertDiv.className = 'alert alert-danger fade show';
                    alertDiv.innerHTML = 'Mohon maaf, stok buku <strong>Kosong!</strong>';
                    document.querySelector('.modal-body').prepend(alertDiv);
                }
            } else {
                document.querySelector('[name="tanggal_kembali"]').disabled = !dlss;
                document.querySelector('[name="submit"]').disabled = !dlss;
                if (alertStokKosong) {
                    alertStokKosong.remove();
                }
            }
            
        };
    });
});