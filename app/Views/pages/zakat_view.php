<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator Zakat</title>
    <link rel="stylesheet" href="<?= base_url(''); ?>assets/calculator/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
</head>
<body>
    <div class="container">
        <div class="tab-container">
            <div class="tab active" onclick="switchTab('zakat-maal')">Zakat Harta (Maal)</div>
            <div class="tab" onclick="switchTab('zakat-profesi')">Zakat Penghasilan</div>
        </div>

        <form id="zakat-maal" class="tab-content active">
            <div class="form-group">
                <label for="hargaemas-maal">Masukkan Harga Emas saat ini:</label>
                <!-- <input type="number" id="hargaemas-maal" placeholder="Masukkan Harga Emas saat ini" required> -->
                <input type="number" id="hargaemas-maal" placeholder="Mengambil harga emas..." required>

            </div>
            <div class="form-group">
                <label for="nisab-tahun-maal">Nisab Satu Tahun:</label>
                <input type="text" id="nisab-tahun-maal" value="" readonly>
                <small>Catatan: Nisab 1 tahun : harga 1 gram emas x 85 gram</small>
            </div>
            <div class="form-group">
                <label for="nisab-bulan-maal">Nisab Satu Bulan:</label>
                <input type="text" id="nisab-bulan-maal" value="" readonly>
                <small>Catatan: Nisab 1 bulan : nisab 1 tahun / 12 bulan</small>
            </div>
            <div class="form-group">
                <label for="a">a. Uang Tunai, Tabungan, Deposito atau sejenisnya</label>
                <input type="number" id="a" placeholder="" value="0" required>
            </div>
            <div class="form-group">
                <label for="b">b. Saham atau surat-surat berharga lainnya</label>
                <input type="number" id="b" placeholder="" value="0" required>
            </div>
            <div class="form-group">
                <label for="c">c. Real Estate (tidak termasuk rumah tinggal yang dipakai sekarang)</label>
                <input type="number" id="c" placeholder="" value="0" required>
            </div>
            <div class="form-group">
                <label for="d">d. Emas, Perak, Permata atau sejenisnya</label>
                <input type="number" id="d" placeholder="" value="0" required>
            </div>
            <div class="form-group">
                <label for="e">e. Mobil (lebih dari keperluan pekerjaan anggota keluarga)</label>
                <input type="number" id="e" placeholder="" value="0" required>
            </div>
            <div class="form-group">
                <label for="f">f. Jumlah Harta Simpanan (A+B+C+D+E)</label>
                <input type="text" id="f" readonly>
            </div>
            <div class="form-group">
                <label for="g">g. Hutang Pribadi yg jatuh tempo dalam tahun ini</label>
                <input type="number" id="g" placeholder="" value="0" required>
            </div>
            <div class="form-group">
                <label for="h">h. Harta simpanan kena zakat(F-G)</label>
                <input type="text" id="h" readonly>
            </div>
            <button type="button" onclick="hitungZakat('maal')">Hitung Zakat</button>
            <div id="result-maal"></div>
            <div id="buttons-below-nisab-maal" style="display: none;">
                <button class="reset-button" onclick="resetForm()">Reset</button>
                <a href="https://baznas.go.id/bayarzakat" class="action-button sedekah-button" target="_blank">Sedekah Sekarang</a>
            </div>
            <div id="buttons-above-nisab-maal" style="display: none;">
                <button class="reset-button" onclick="resetForm()">Reset</button>
                <a href="https://baznas.go.id/bayarzakat" class="action-button zakat-button" target="_blank">Zakat Sekarang</a>
            </div>
        </form>
         <!--Batas hitung zakat maal -->
        <form id="zakat-profesi" class="tab-content">
            <div class="form-group">
                <label for="penghasilan-profesi">Penghasilan dalam 1 bulan:</label>
                <input type="number" id="penghasilan-profesi" placeholder="Masukkan penghasilan bulanan" value="0" required>
            </div>
            <div class="form-group">
                <label for="kebutuhan-profesi">Kebutuhan pokok dalam 1 bulan:</label>
                <input type="number" id="kebutuhan-profesi" placeholder="Masukkan kebutuhan pokok" value="0" required>
            </div>
            <div class="form-group">
                <label for="penghasilan-bersih-profesi">Penghasilan Bersih:</label>
                <input type="text" id="penghasilan-bersih-profesi" readonly>
            </div>
            <div class="form-group">
                <label for="hargaemas-profesi">Masukkan Harga Emas saat ini:</label>
                <input type="number" id="hargaemas-profesi" placeholder="Mengambil harga emas..." required>
            </div>
            <div class="form-group">
                <label for="nisab-tahun-profesi">Nisab Satu Tahun:</label>
                <input type="text" id="nisab-tahun-profesi" value="" readonly>
                <small>Catatan: Nisab 1 tahun : harga 1 gram emas x 85 gram</small>
            </div>
            <div class="form-group">
                <label for="nisab-bulan-profesi">Nisab Satu Bulan:</label>
                <input type="text" id="nisab-bulan-profesi" value="" readonly>
                <small>Catatan: Nisab 1 bulan : nisab 1 tahun / 12 bulan</small>
            </div>
            <button type="button" onclick="hitungZakat('profesi')">Hitung Zakat</button>
            <div id="result-profesi"></div>
            <div id="buttons-below-nisab" style="display: none;">
                <button class="reset-button" onclick="resetForm()">Reset</button>
                <a href="https://baznas.go.id/bayarzakat" class="action-button sedekah-button" target="_blank">Sedekah Sekarang</a>
            </div>
            <div id="buttons-above-nisab" style="display: none;">
                <button class="reset-button" onclick="resetForm()">Reset</button>
                <a href="https://baznas.go.id/bayarzakat" class="action-button zakat-button" target="_blank">Zakat Sekarang</a>
            </div>
        </form>

        <!-- <div id="result-profesi"></div>
            <div id="buttons-below-nisab" style="display: none;">
                <button class="reset-button" onclick="resetForm()">Reset</button>
                <a href="https://lazalbahjah.org/program/" class="action-button sedekah-button" target="_blank">Sedekah Sekarang</a>
            </div>
            <div id="buttons-above-nisab" style="display: none;">
                <button class="reset-button" onclick="resetForm()">Reset</button>
                <a href="https://lazalbahjah.org/preview/zakat-penghasilan-profesi/donasi-sekarang" class="action-button zakat-button" target="_blank">Zakat Sekarang</a>
            </div>
        </div>
        <div id="result-maal"></div>
            <div id="buttons-below-nisab-maal" style="display: none;">
                <button class="reset-button" onclick="resetForm()">Reset</button>
                <a href="https://lazalbahjah.org/program/" class="action-button sedekah-button" target="_blank">Sedekah Sekarang</a>
            </div>
            <div id="buttons-above-nisab-maal" style="display: none;">
                <button class="reset-button" onclick="resetForm()">Reset</button>
                <a href="https://lazalbahjah.org/campaign/zakat-harta-maal" class="action-button zakat-button" target="_blank">Zakat Sekarang</a>
            </div>
        </div> -->

    <script src="<?= base_url(''); ?>assets/calculator/script.js"></script>
</body>
</html>
