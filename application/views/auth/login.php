<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Pengaduan Warga</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
</head>

<body style="background-color: #f0f0f0; min-height: 100vh; display: flex; align-items: center; justify-content: center;">

    <div class="container">
        <div class="card shadow" style="max-width: 480px; margin: auto; border-radius: 16px; background-color: #ffffff;">
            <div class="card-header text-center" style="background-color: #343a40; color: white; border-top-left-radius: 16px; border-top-right-radius: 16px;">
                <h4 style="margin: 0; padding: 10px 0;">Aplikasi Pengaduan Warga</h4>
            </div>
            <div class="card-body p-4" style="background-color: #ffffff;">

                <!-- Flash Message -->
                <?php if ($this->session->flashdata('error')): ?>
                    <div class="alert alert-danger text-center" style="border-radius: 8px;">
                        <?= $this->session->flashdata('error'); ?>
                    </div>
                <?php endif; ?>
                
                <!-- direct ke controller auth/login unutuk veifikasi login -->
                <form action="<?= base_url('auth/login'); ?>" method="POST">
                    <div class="mb-3">
                        <label for="username" class="form-label" style="color: #343a40;">Nama / Username</label>
                        <input type="text" class="form-control" id="username" name="username" required placeholder="Nama (Warga) atau Username (Admin)" style="border-radius: 8px; background-color: #f8f9fa;">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label" style="color: #343a40;">Nomor Telepon / Password</label>
                        <input type="password" class="form-control" id="password" name="password" required placeholder="Nomor Telepon (Warga) atau Password (Admin)" style="border-radius: 8px; background-color: #f8f9fa;">
                    </div>
                    <button type="submit" class="btn w-100" style="background-color: #343a40; color: white; border-radius: 8px;">Login</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>

</html>
