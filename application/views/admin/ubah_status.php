<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ubah Status Aduan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background-color: #f8f9fa;">
    <div class="container mt-4 pt-3">
        <div class="d-flex justify-content-start mb-3">
            <a href="<?= base_url('admin') ?>" class="btn btn-primary">← Kembali</a>
        </div>
        <div class="card" style="border-radius: 10px;">
            <div class="card-header text-white" style="background-color: #212529; font-weight: bold;">
                Ubah Status Aduan
            </div>
            <div class="card-body" style="background-color: #ffffff;">
            <!-- direct ke controller admin/update_status untuk udate status aduan warga-->
                <form action="<?= base_url('admin/update_status/' . $aduan->aduan_id) ?>" method="post">
                    <label for="nama" class="form-label fw-semibold">Nama</label>
                    <input type="text" class="form-control mb-3" readonly value="<?= htmlspecialchars($aduan->nama) ?>">

                    <label for="telepon" class="form-label fw-semibold">Telepon</label>
                    <input type="text" class="form-control mb-3" readonly value="<?= htmlspecialchars($aduan->telepon) ?>">

                    <label for="detail" class="form-label fw-semibold">Detail Aduan</label>
                    <textarea class="form-control mb-3" rows="4" readonly><?= htmlspecialchars($aduan->detail) ?></textarea>

                    <label for="status" class="form-label fw-semibold">Status</label>
                    <select name="status" id="status" class="form-select mb-4" required>
                        <?php
                        $statuses = ['baru', 'diproses', 'selesai'];
                        foreach ($statuses as $status) :
                            $selected = ($status == $aduan->status) ? 'selected' : '';
                        ?>
                            <option value="<?= $status ?>" <?= $selected ?>>
                                <?= ucfirst($status) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>

                    <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
