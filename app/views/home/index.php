<?php if(isset($_SESSION['pesan']) && isset($_SESSION['tipe_pesan'])): ?>
    <div class="d-flex justify-content-center">
        <div class="alert alert-<?= $_SESSION['tipe_pesan']; ?> alert-dismissible fade show mt-3 w-25 text-center" role="alert">
            <?= $_SESSION['pesan']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
    <?php 
    // Hapus pesan setelah ditampilkan
    unset($_SESSION['pesan']);
    unset($_SESSION['tipe_pesan']);
    ?>
<?php endif; ?>
<div class="album py-5 bg-body-tertiary">
    <div class="container">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

        <?php foreach($data['buku'] as $bk) : ?>

        
        <div class="col">
          <div class="card shadow-sm">
          <img class="card-img-top" src="<?= BASEURL; ?>/img/<?= $bk["gambar_sampul"] ?>" alt="Card image">
            <div class="card-body">
              <p class="card-text fs-5"><strong><?= $bk["judul"] ?></strong></p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <button type="button" class="btn btn-outline-info view-btn" data-bs-toggle="modal" data-bs-target="#detailBuku" 
                    data-id="<?= $bk['id_buku'] ?>" data-judul="<?= $bk['judul'] ?>" data-pengarang="<?= $bk['pengarang'] ?>" data-penerbit="<?= $bk['penerbit'] ?>" 
                    data-tahun_terbit="<?= $bk['tahun_terbit'] ?>" data-stok="<?= $bk['stok'] ?>"data-dlss="<?= isset($_SESSION['user_logged_in']) ? 'true' : 'false'; ?>" data-gambar_sampul="<?= $bk['gambar_sampul'] ?>">
                  Pilih</button>
                </div>
                <small class="text-body-secondary"><?= $bk["pengarang"] ?></small>
              </div>
            </div>
          </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="detailBuku" tabindex="-1" aria-labelledby="modalDetailBuku" aria-hidden="true">
          <div class="modal-dialog modal-lg">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="modalDetailBuku">Detail Buku</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <form id="form" action="<?= BASEURL; ?>/Pinjam/peminjaman" method="POST">
                    <input type="hidden" name="id_buku" id="id_buku" value="">
                    <input type="hidden" name="tanggal_pinjam" value="">
                      <div class="modal-body">
                          <div class="row">
                              <div class="col-md-5 d-flex justify-content-center align-items-center" style="height: 350px;">
                                  <img id="sampul" width="200" height="350" src="" alt="foto sampul buku" style="max-height: 100%; margin-bottom: 20px;">
                              </div>
                              <div class="col-md-7">
                                  <table class="table table-striped">
                                      <tbody>
                                          <tr>
                                              <td>Judul Buku</td>
                                              <td id="judul_buku">: </td>
                                          </tr>
                                          <tr>
                                              <td>Penerbit</td>
                                              <td id="penerbit">: </td>
                                          </tr>
                                          <tr>
                                              <td>Pengarang</td>
                                              <td id="pengarang">: </td>
                                          </tr>
                                          <tr>
                                              <td>Tahun Terbit</td>
                                              <td id="tahun_terbit">: </td>
                                          </tr>
                                          <tr>
                                              <td>Stok</td>
                                              <td id="jumlah">: </td>
                                          </tr>
                                          <tr>
                                              <td>Pinjam Sampai</td>
                                              <td id="pinjam" class="d-flex align-items-center">:  <input type="date" required min="" name="tanggal_kembali" class="form-control" style="margin-left: 5px;" <?php if(!isset($_SESSION['user_logged_in'])): ?>disabled<?php endif; ?>></td>
                                          </tr>
                                      </tbody>
                                  </table>
                                  <?php if(!isset($_SESSION['user_logged_in'])): ?>
                                  <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                      <strong>Peringatan!</strong> Silahkan login terlebih dahulu agar dapat melakukan peminjaman buku.
                                  </div>
                                  <?php endif; ?>
                              </div>
                          </div>
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="submit" <?php if(!isset($_SESSION['user_logged_in'])): ?>disabled<?php endif; ?> name="submit" class="btn btn-primary" onclick="return confirm('Apakah Anda yakin?')">Pinjam</button>
                      </div>
                  </form>
              </div>
            </div>
          </div>


        <?php endforeach; ?>

      </div>
    </div>
  </div>

<!-- Javascript -->
<script src="<?= BASEURL; ?>/js/modalBuku.js"></script>
