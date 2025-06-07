<?= $this->extend('layouts/template-page'); ?>

<?= $this->section('content'); ?>

<!-- Jadwal Sholat Harian -->
<section class="prayer-time">
    <div class="auto-container">
        <div class="inner-container">
            <div class="prayer-time_content">
                <h4 class="prayer-time_title">Prayer Time in <?= esc($lokasi . ', ' . $daerah) ?></h4>
                <?= 'Prayer times today begin at ' . ($jadwal_hari_ini->subuh ?? '-') . ' with Subuh prayer and end at ' . ($jadwal_hari_ini->isya ?? '-') . ' with Isya prayer.'; ?>
            </div>

            <div class="prayer-time_timing">
                <div class="d-flex justify-content-between align-items-center flex-wrap">
                    <!-- Bismillah -->
                    <div class="bismillah">
                    </div>

                    <div class="prayer-time_time">
                        <div id="judul-hari" class="title"></div>
                        <div id="jam-sekarang" class="time-countdown_subtitle"></div>
                        <div id="waktu-sekarang" class="text-center fw-bold fs-5 my-3"></div>
                    </div>

                    <div class="bismillah">
                    </div>
                </div>
            </div>

            <?php if ($jadwal_hari_ini): ?>
                <div class="prayer-time_list">
                    <div class="prayer-daytime">Imsak <span><?= $jadwal_hari_ini->imsak ?></span></div>
                    <div class="prayer-daytime">Subuh <span><?= $jadwal_hari_ini->subuh ?></span></div>
                    <div class="prayer-daytime">Dzuhur <span><?= $jadwal_hari_ini->dzuhur ?></span></div>
                    <div class="prayer-daytime">Ashar <span><?= $jadwal_hari_ini->ashar ?></span></div>
                    <div class="prayer-daytime">Maghrib <span><?= $jadwal_hari_ini->maghrib ?></span></div>
                    <div class="prayer-daytime">Isya <span><?= $jadwal_hari_ini->isya ?></span></div>
                </div>
            <?php else: ?>
                <div class="alert alert-warning">Data jadwal sholat hari ini tidak tersedia.</div>
            <?php endif; ?>

            <div class="makkah-timezone">
                <?php
                    $timezone_jakarta = new DateTimeZone('Asia/Jakarta');
                    $timezone_mecca = new DateTimeZone('Asia/Riyadh');
                    $now = new DateTime('now', $timezone_jakarta);
                    $now_mecca = new DateTime('now', $timezone_mecca);
                    $diff_hours = ($now_mecca->getOffset() - $now->getOffset()) / 3600;
                    echo "Waktu di Mekkah berbeda {$diff_hours} jam dari " . esc($daerah ?? 'lokasi Anda') . ".";
                ?>
            </div>
        </div>
    </div>
</section>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const hariIndo = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
        const bulanIndo = [
            'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        ];

        function updateWaktu() {
            const now = new Date();

            const hari = hariIndo[now.getDay()];
            const tanggal = now.getDate();
            const bulan = bulanIndo[now.getMonth()];
            const tahun = now.getFullYear();

            const jam = String(now.getHours()).padStart(2, '0');
            const menit = String(now.getMinutes()).padStart(2, '0');
            const detik = String(now.getSeconds()).padStart(2, '0');

            document.getElementById("judul-hari").textContent = hari;
            document.getElementById("jam-sekarang").textContent = `${jam}:${menit}:${detik}`;
            document.getElementById("waktu-sekarang").textContent =
                `${hari}, ${tanggal} ${bulan} ${tahun} - ${jam}:${menit}:${detik}`;
        }

        updateWaktu();
        setInterval(updateWaktu, 1000);
    });
</script>

<?= $this->endSection(); ?>


