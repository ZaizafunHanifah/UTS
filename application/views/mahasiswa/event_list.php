<!DOCTYPE html>
<html>
<head>
    <title>Daftar Event</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h4 class="mb-3 text-center">Daftar Event</h4>

            <?php if (empty($events)): ?>
                <div class="alert alert-warning">Tidak ada event yang tersedia.</div>
            <?php else: ?>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Event</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($events as $event): ?>
                            <tr>
                                <td><?= $event->id; ?></td>
                                <td><?= $event->nama_event; ?></td>
                                <td><?= date('d M Y', strtotime($event->tanggal)); ?></td>
                                <td>
                                    <a href="<?= site_url('mahasiswa/daftar/'.$event->id); ?>" class="btn btn-primary btn-sm">Daftar</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>

        </div>
    </div>
</div>

</body>
</html>
