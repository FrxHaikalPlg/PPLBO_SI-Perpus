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

<div id="carouselExampleIndicators" class="carousel slide shadow" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
    <img src="<?= BASEURL; ?>/img/cw1.jpg" class="d-block w-100 img-fluid" style="object-fit: cover; height: 500px;" alt="...">
      <div class="carousel-caption text-start pb-5 mb-5" >
      <h1 style="text-shadow: 2px 2px 4px #000000;">Selamat Datang di Perpustakaan Kami</h1>
      <p style="text-shadow: 2px 2px 4px #000000;">Temukan buku favoritmu di sini.</p>
      </div>
    </div>
    <div class="carousel-item">
    <img src="<?= BASEURL; ?>/img/cw2.jpg" class="d-block w-100 img-fluid" style="object-fit: cover; height: 500px;" alt="...">
      <div class="carousel-caption pb-5 mb-5">
        <h1 style="text-shadow: 2px 2px 4px #000000;">Jelajahi Koleksi Buku Terlengkap</h1>
        <p style="text-shadow: 2px 2px 4px #000000;">Dari fiksi hingga non-fiksi, semua ada.</p>
        <p><a class="btn btn-lg btn-primary" href="#">Browse</a></p>
      </div>
    </div>
    <div class="carousel-item">
    <img src="<?= BASEURL; ?>/img/cw3.jpg" class="d-block w-100 img-fluid" style="object-fit: cover; height: 500px;" alt="...">
      <div class="carousel-caption text-end pb-5 mb-5 pr-1">
        <h1 style="text-shadow: 2px 2px 4px #000000;">Pinjam Buku dengan Mudah</h1>
        <p style="text-shadow: 2px 2px 4px #000000;">Temukan dan pinjam buku favoritmu tanpa ribet.</p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<div class="album pb-5 bg-body-tertiary">
  <div class="text-center my-5">
      <h1 class="fw-bold fst-italic fs-1" >Editor's Choice</h1>
      <p  >Jelajahi koleksi pilihan editor kami dan temukan buku yang sempurna untuk petualangan membaca Anda selanjutnya.</p>
  </div>
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
                                  <img id="sampul" max-width="300" height="350" src="" alt="foto sampul buku" style="max-height: 100%; margin-bottom: 20px;">
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
                                              <td class="text-nowrap">Pinjam Sampai</td>
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

