<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jadwal Sholat - CodeIgniter 4</title>
    <style>
        body { font-family: "Open Sans"; }
        .kotak { width: 80%; margin: 10px auto; overflow: hidden; }
        .imsakiyah table { width: 100%; border-collapse: collapse; }
        .imsakiyah table tr:nth-child(even) { background-color: #f2f2f2; }
        .imsakiyah table th { background: #4548ff; color: white; padding: 5px; border: 1px solid #ccc; }
        .imsakiyah table td { text-align: center; border: 1px solid #ccc; padding: 5px; }
    </style>
    <script>
        function updateKabupaten() {
            let provinsi = document.getElementById("provinsi").value;
            let kabupatenSelect = document.getElementById("kabupaten");
            let kabupatenData = <?= json_encode($provinsi) ?>;
            
            kabupatenSelect.innerHTML = "<option value=''>Pilih Kabupaten/Kota</option>";

            if (provinsi in kabupatenData) {
                kabupatenData[provinsi].forEach(kab => {
                    let option = new Option(kab.lokasi, kab.id);
                    kabupatenSelect.add(option);
                });
            }
        }
    </script>
</head>
<body>

    <center>
        <h2>Jadwal Sholat dan Imsakiyah</h2>
    </center>

    <center>
        <form method="get" action="<?= base_url('jadwalsholat') ?>">
            <!-- Pilih Provinsi -->
            <select name="provinsi" id="provinsi" onchange="updateKabupaten();">
                <option value="">Pilih Provinsi</option>
                <?php foreach ($provinsi as $nama_provinsi => $data_kota) : ?>
                    <option value="<?= esc($nama_provinsi) ?>" <?= $provinsi_terpilih == $nama_provinsi ? 'selected' : '' ?>>
                        <?= esc($nama_provinsi) ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <!-- Pilih Kabupaten/Kota -->
            <select name="kabupaten" id="kabupaten">
                <option value="">Pilih Kabupaten/Kota</option>
                <?php foreach ($kabupaten as $kab) : ?>
                    <option value="<?= esc($kab->id) ?>" <?= $kabupaten_terpilih == $kab->id ? 'selected' : '' ?>>
                        <?= esc($kab->lokasi) ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <!-- Tombol Submit -->
            <button type="submit">Tampilkan Jadwal</button>
        </form>
    </center>

    <br><br>

    <div class="kotak">
        <div class="imsakiyah">
            <table>
                <tr>
                    <th width="200px">Tanggal</th>
                    <th>Imsak</th>
                    <th>Subuh</th>
                    <th>Dzuhur</th>
                    <th>Ashar</th>
                    <th>Maghrib</th>
                    <th>Isya</th>
                </tr>
                <?php foreach ($jadwal_sholat as $jadwal) : ?>
                    <tr>
                        <th><?= esc($jadwal->tanggal) ?></th>
                        <td><?= esc($jadwal->imsak) ?></td>
                        <td><?= esc($jadwal->subuh) ?></td>
                        <td><?= esc($jadwal->dzuhur) ?></td>
                        <td><?= esc($jadwal->ashar) ?></td>
                        <td><?= esc($jadwal->maghrib) ?></td>
                        <td><?= esc($jadwal->isya) ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>

</body>
</html>
