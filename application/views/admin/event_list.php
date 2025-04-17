<!DOCTYPE html>
<html>
<head>
    <title>Daftar Event & Peserta</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h2 class="mb-4">Daftar Event</h2>

    <a href="<?= site_url('event/add') ?>" class="btn btn-success mb-3">+ Tambah Event</a>

    <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success"><?= $this->session->flashdata('success') ?></div>
    <?php endif; ?>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Nama Event</th>
                <th>Deskripsi</th>
                <th>Tanggal</th>
                <th>Peserta</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($events as $event): ?>
                <tr>
                    <td><?= $event->nama_event ?></td>
                    <td><?= $event->deskripsi ?></td>
                    <td><?= $event->tanggal ?></td>
                    <td>
                        <?php if (!empty($event->peserta)): ?>
                            <ul class="mb-0">
                                <?php foreach ($event->peserta as $peserta): ?>
                                    <li><?= $peserta->username ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php else: ?>
                            <em>Tidak ada peserta</em>
                        <?php endif; ?>
                    </td>
                    <td>
                        <a href="<?= site_url('event/delete/'.$event->id) ?>" 
                           class="btn btn-danger btn-sm" 
                           onclick="return confirm('Yakin ingin menghapus event ini?')">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

</body>
</html>
