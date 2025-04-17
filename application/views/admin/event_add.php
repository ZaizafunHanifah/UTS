<!DOCTYPE html>
<html>
<head>
    <title>Tambah Event</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h3>Tambah Event Baru</h3>
    <form method="post" action="<?= site_url('event/store') ?>">
        <div class="form-group">
            <label>Nama Event</label>
            <input type="text" name="nama_event" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control" required></textarea>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="<?= site_url('event') ?>" class="btn btn-secondary">Kembali</a>
    </form>
</div>

</body>
</html>
