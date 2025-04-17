<!DOCTYPE html>
<html>
<head>
    <title>Login Mahasiswa</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <h4 class="mb-3 text-center">Login Mahasiswa</h4>

            <?php if ($this->session->flashdata('error')): ?>
                <div class="alert alert-danger">
                    <?= $this->session->flashdata('error'); ?>
                </div>
            <?php endif; ?>

            <form method="post" action="<?= site_url('auth/login'); ?>">
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary btn-block">Login</button>
            </form>

            <p class="mt-3 text-center">Belum punya akun? <a href="<?= site_url('auth/register'); ?>">Daftar di sini</a></p>
            <p class="text-center"><a href="<?= site_url('adminauth'); ?>">Login sebagai Admin</a></p>
        </div>
    </div>
</div>

</body>
</html>
