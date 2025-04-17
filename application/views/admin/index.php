<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background-color: #f8f9fa;">
    <div class="container mt-4 pt-3">
        <h1 class="text-center">Hai Admin, <?= $this->session->userdata('username'); ?></h1>
        <div class="d-flex justify-content-start mb-4">
            <!-- direct ke controller auth/logout -->
            <a href="<?= base_url('auth/logout') ?>" class="btn btn-danger">Logout</a>
        </div>

        <div class="card" style="border-radius: 10px;">
            <div class="card-header text-white" style="background-color: #212529; font-weight: bold;">Daftar Aduan Warga</div>
            <div class="card-body" style="background-color: #ffffff;">
                <table class="table table-striped table-bordered" style="border-radius: 8px;">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama Warga</th>
                            <th>Nomor Telepon</th>
                            <th>Detail Aduan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody style="text-align: center;">
                        <?php
                        $no = 1;
                        foreach ($aduan as $a) : 
                            $statusClass = '';
                            switch ($a->status) {
                                case 'selesai':
                                    $statusClass = 'badge bg-success';
                                    break;
                                case 'diproses':
                                    $statusClass = 'badge bg-warning'; 
                                    break;
                                case 'baru':
                                    $statusClass = 'badge bg-primary';
                                    break;
                            }
                        ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= htmlspecialchars($a->nama); ?></td>
                                <td><?= htmlspecialchars($a->telepon); ?></td>
                                <td><?= htmlspecialchars($a->detail); ?></td>
                                <td>
                                    <span class="<?= $statusClass; ?>" style="font-size: 1rem;"><?= ucfirst($a->status); ?></span>
                                </td>
                                <td>
                                    <!-- direct ke controller admin/ubah_staus untuk menampilkan aduan spesifik warga -->
                                    <a href="<?= base_url('admin/ubah_status/' . $a->aduan_id); ?>" class="btn btn-warning btn-sm">Ubah Status</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
