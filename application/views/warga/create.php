<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Aduan Warga</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background-color: #f8f9fa;">
    <div class="container mt-4 pt-3">
        <a href="<?= base_url('warga') ?>" class="btn btn-dark mb-3">
            <i class="bi bi-arrow-left-circle"></i> Kembali
        </a>

        <div class="card" style="border-radius: 10px;">
            <div class="card-header text-white" style="background-color: #212529; font-weight: bold;">
                Tambah Aduan
            </div>
            <div class="card-body" style="background-color: #ffffff;">
                <!-- direct ke controller aduan unutk menyimpan data aduan baru -->
                <form action="<?= base_url('aduan/store') ?>" method="post">
                    <input type="hidden" name="warga_id" value="<?= $this->session->userdata('warga_id'); ?>">

                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" readonly style="background-color: #e9ecef;" value="<?= $this->session->userdata('nama'); ?>">
                    </div>

                    <div class="mb-3">
                        <label for="telepon" class="form-label">Telepon</label>
                        <input type="text" class="form-control" readonly style="background-color: #e9ecef;" value="<?= $this->session->userdata('telepon'); ?>">
                    </div>

                    <div class="mb-3">
                        <label for="detail" class="form-label">Detail Aduan</label>
                        <textarea name="detail" id="detail" class="form-control" rows="4" required style="resize: none;"></textarea>
                    </div>

                    <div class="mb-4">
                        <label for="status" class="form-label">Status</label>
                        <input type="text" name="status" id="status" class="form-control" value="baru" readonly style="background-color: #e9ecef;">
                    </div>

                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-send-fill"></i> Kirim Aduan
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</body>

</html>
