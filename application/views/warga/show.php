<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lihat Aduan Warga</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background-color: #f8f9fa;">
    <div class="container mt-4 pt-3">
        <a href="<?= base_url('warga') ?>" class="btn btn-dark mb-3">
            <i class="bi bi-arrow-left-circle-fill"></i> Kembali
        </a>
        <div class="card" style="border-radius: 10px;">
            <div class="card-header text-white" style="background-color: #212529; font-weight: bold;">Lihat Aduan</div>
            <div class="card-body" style="background-color: #ffffff;">
                <form>
                    <input type="hidden" name="warga_id" value="<?= $this->session->userdata('warga_id'); ?>">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control mb-3 mt-2" readonly value="<?= $this->session->userdata('nama'); ?>">
                    <label for="telepon">Telepon</label>
                    <input type="text" class="form-control mb-3 mt-2" readonly value="<?= $this->session->userdata('telepon'); ?>">
                    <label for="detail">Detail Aduan</label>
                    <textarea name="detail" id="detail" class="form-control mb-3 mt-2" rows="4" readonly><?= htmlspecialchars($aduan->detail) ?></textarea>
                    <label for="status">Status</label>
                    <input type="text" name="status" id="status" class="form-control mb-3 mt-2" value="<?= htmlspecialchars($aduan->status) ?>" readonly>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</body>

</html>
