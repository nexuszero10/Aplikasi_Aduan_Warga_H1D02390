<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Aduan Warga</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body style="background-color: #f8f9fa;">
    <div class="container mt-4 pt-3">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="text-dark">Selamat datang, <?= $this->session->userdata('nama'); ?>!</h4>
            <a href="<?= base_url('auth/logout'); ?>" class="btn btn-danger">Logout</a>
        </div>
        <a href="<?= base_url('warga/create'); ?>" class="btn btn-dark mb-3">
            <i class="bi bi-plus-circle"></i> Tambah Aduan
        </a>
        <div class="card">
            <div class="card-header bg-dark text-white">
                Data Aduan Warga
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-center align-middle" style="table-layout: fixed;">
                        <thead class="table-secondary">
                            <tr>
                                <th style="width: 50px;">No</th>
                                <th>Nama</th>
                                <th>Telepon</th>
                                <th>Status Aduan</th>
                                <th style="width: 200px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="resultBody">
                            <?php if (empty($warga)): ?>
                                <tr>
                                    <td colspan="5" class="text-center">Tidak Ada Data.</td>
                                </tr>
                            <?php else: ?>
                                <?php $no = 1; ?>
                                <?php foreach ($warga as $w): ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= htmlspecialchars($w->nama); ?></td>
                                        <td><i class="bi bi-telephone-fill"></i> <?= htmlspecialchars($w->telepon); ?></td>
                                        <td>
                                            <?php
                                                $status = strtolower($w->status);
                                                $warna = 'secondary';
                                                if ($status == 'baru') $warna = 'success';
                                                elseif ($status == 'diproses') $warna = 'warning';
                                                elseif ($status == 'selesai') $warna = 'primary';
                                            ?>
                                            <span class="badge bg-<?= $warna; ?>" style="font-size: 0.9rem;"><?= ucfirst($status); ?></span>
                                        </td>
                                        <td>
                                            <a href="<?= base_url('aduan/show/' . $w->aduan_id); ?>" class="btn btn-primary btn-sm mb-1">Lihat</a>
                                            <?php if ($this->session->userdata('warga_id') == $w->warga_id): ?>
                                                <a href="<?= base_url('aduan/edit/' . $w->aduan_id); ?>" class="btn btn-warning btn-sm mb-1">Edit</a>
                                                <a href="<?= base_url('aduan/delete/' . $w->aduan_id); ?>" class="btn btn-danger btn-sm mb-1" onclick="return confirm('Yakin ingin menghapus aduan <?= htmlspecialchars($w->nama); ?>?');">Hapus</a>
                                            <?php else: ?>
                                                <button class="btn btn-warning btn-sm mb-1" disabled>Edit</button>
                                                <button class="btn btn-danger btn-sm mb-1" disabled>Hapus</button>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>;
    </script>

</body>

</html>
