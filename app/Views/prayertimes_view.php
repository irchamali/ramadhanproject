<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jadwal Sholat dan Imsakiyah</title>

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
</head>
<body class="bg-light">

    <div class="container my-4">
        <h2 class="text-center mb-4">Jadwal Sholat dan Imsakiyah</h2>
        <h5 class="text-center mb-4">Realtime using API <a href="https://api.myquran.com/v2/sholat/kota/semua">MyQuran</a></h5>
        <!-- Form Pilih Kota -->
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form method="get" action="<?= base_url('jadwalsholat') ?>" class="text-center">
                    <select name="kota" class="form-select" onchange="this.form.submit()">
                        <?php foreach ($list_kota as $k) : ?>
                            <option value="<?= esc($k->id) ?>" <?= $kota_terpilih == $k->id ? 'selected' : '' ?>>
                                <?= esc($k->lokasi) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </form>
            </div>
        </div>

        <!-- Tabel Jadwal Sholat -->
        <div class="table-responsive mt-4">
            <table class="table table-hover table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th width="200px">Tanggal</th>
                        <th>Imsak</th>
                        <th>Subuh</th>
                        <th>Dzuhur</th>
                        <th>Ashar</th>
                        <th>Maghrib</th>
                        <th>Isya</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($jadwal_sholat as $jadwal) : ?>
                        <tr>
                            <td><?= esc($jadwal->tanggal) ?></td>
                            <td><?= esc($jadwal->imsak) ?></td>
                            <td><?= esc($jadwal->subuh) ?></td>
                            <td><?= esc($jadwal->dzuhur) ?></td>
                            <td><?= esc($jadwal->ashar) ?></td>
                            <td><?= esc($jadwal->maghrib) ?></td>
                            <td><?= esc($jadwal->isya) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    </div>

    <!-- Bootstrap 5 JS (Opsional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
