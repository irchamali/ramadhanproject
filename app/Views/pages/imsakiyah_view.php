<?= $this->extend('layouts/template-page'); ?>

<?= $this->section('content'); ?>
<!-- Contact Info -->
<section class="contact-info">
    <div class="auto-container">
        <div class="inner-container">
            <div class="bg-white px-3 mt-0 px-0 py-5 px-lg-5 rounded-3">
            <body class="bg-light">
                <div class="container my-4">
                    <h2 class="text-center mb-4">Jadwal Sholat dan Imsakiyah</h2>
                    <p class="text-center mb-4">Realtime using API <a href="https://api.myquran.com/v2/sholat/kota/semua">MyQuran</a></p>
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
            </body>
            </div>
        </div>
    </div>
</section>
<!-- End Contact Info -->

<!-- Tambahkan jQuery dan DataTables -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<script>
    jQuery.noConflict();
    jQuery(document).ready(function ($) {
        console.log("DataTables initialized");
        console.log(typeof $.fn.DataTable); // Debugging

        $('#mytable').DataTable({
            "paging": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "language": {
                "lengthMenu": "Tampilkan _MENU_ data per halaman",
                "zeroRecords": "Data tidak ditemukan",
                "info": "Menampilkan _PAGE_ dari _PAGES_ halaman",
                "infoEmpty": "Tidak ada data tersedia",
                "infoFiltered": "(difilter dari _MAX_ total data)",
                "search": "Cari:",
                "paginate": {
                    "first": "Pertama",
                    "last": "Terakhir",
                    "next": "Selanjutnya",
                    "previous": "Sebelumnya"
                }
            }
        });
    });
</script>

<?= $this->endSection(); ?>
