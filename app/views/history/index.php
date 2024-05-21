<div class="container mt-5">
    <h2>Riwayat Peminjaman</h2>
    <div class="table-responsive">
        <table class="table table-responsive table-hover mt-3">
            <thead class="thead-dark">
                <tr>
                    <th>Judul Buku</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Status</th>
                    <th>Denda</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data['history'] as $history): ?>
                    <tr>
                        <td><?= htmlspecialchars($history['judul']); ?></td>
                        <td><?= htmlspecialchars($history['tanggal_pinjam']); ?></td>
                        <td><?= htmlspecialchars($history['tanggal_kembali']); ?></td>
                        <td>
                            <?php
                            switch ($history['status']) {
                                case 'dikembalikan':
                                    echo '<span class="badge rounded-pill text-bg-success">Dikembalikan</span>';
                                    break;
                                case 'terlambat':
                                    echo '<span class="badge rounded-pill text-bg-primary">Dikembalikan Terlambat</span>';
                                    break;
                                case 'dipinjam':
                                    echo '<span class="badge rounded-pill text-bg-warning">Dipinjam</span>';
                                    break;
                                case 'belum dikembalikan':
                                    echo '<span class="badge rounded-pill text-bg-danger">Belum Dikembalikan</span>';
                                    break;
                                default:
                                    echo '<span class="badge rounded-pill text-bg-secondary">' . htmlspecialchars($history['status']) . '</span>';
                            }
                            ?>
                        </td>
                        <td><?= htmlspecialchars($history['denda']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

