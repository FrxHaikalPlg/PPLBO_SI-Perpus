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
                  <button type="button" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#detailBuku">View</button>
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
                  <form id="form" action="Pinjem" method="POST">
                      <div class="modal-body">
                          <div class="row">
                              <div class="col-md-5">
                                  <img id="sampul" width="200" height="350" src="<?= BASEURL; ?>/img/<?= $bk["gambar_sampul"] ?>"" alt="foto sampul buku">
                              </div>
                              <div class="col-md-7">
                                  <table class="table table-striped">
                                      <tbody>
                                          <tr>
                                              <td>Judul Buku</td>
                                              <td id="judul_buku">: <?= $bk["judul"] ?></td>
                                          </tr>
                                          <tr>
                                              <td>Penerbit</td>
                                              <td id="penerbit">: <?= $bk["penerbit"] ?></td>
                                          </tr>
                                          <tr>
                                              <td>Pengarang</td>
                                              <td id="pengarang">: <?= $bk["pengarang"] ?></td>
                                          </tr>
                                          <tr>
                                              <td>Tahun Terbit</td>
                                              <td id="tahun_terbit">: <?= $bk["tahun_terbit"] ?></td>
                                          </tr>
                                          <tr>
                                              <td>Stok</td>
                                              <td id="jumlah">: <?= $bk["stok"] ?></td>
                                          </tr>
                                      </tbody>
                                  </table>
                                  <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                      <strong>Peringatan!</strong> Silahkan login terlebih dahulu agar dapat melakukan peminjaman buku.
                                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="submit" disabled name="submit" class="btn btn-primary" onclick="return confirm('Apakah Anda yakin?')">Pinjam</button>
                      </div>
                  </form>
              </div>
            </div>
          </div>


        <?php endforeach; ?>

      </div>
    </div>
  </div>