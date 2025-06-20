// Format angka ke format Rp dengan titik ribuan
function formatRupiah(angka) {
    if (isNaN(angka)) return 'Rp 0';
    const format = new Intl.NumberFormat('id-ID', {
        style: 'currency',
        currency: 'IDR',
        minimumFractionDigits: 0,
    });
    return format.format(angka);
}

// Format angka biasa dengan titik ribuan (tanpa Rp)
function formatAngkaRibuan(angka) {
    return angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}

// Parse dari input bertitik ke angka biasa
function parseRupiah(rupiah) {
    return parseInt(rupiah.replace(/[^0-9]+/g, ""), 10) || 0;
}

function updateNisab(type) {
    const hargaEmas = parseRupiah(document.getElementById(`hargaemas-${type}`).value);

    if (!isNaN(hargaEmas)) {
        const nisabTahun = hargaEmas * 85;
        const nisabBulan = Math.floor(nisabTahun / 12);

        document.getElementById(`nisab-tahun-${type}`).value = formatRupiah(nisabTahun);
        document.getElementById(`nisab-bulan-${type}`).value = formatRupiah(nisabBulan);
    }
}

function updatePenghasilanBersihProfesi() {
    const penghasilan = parseRupiah(document.getElementById('penghasilan-profesi').value);
    const kebutuhan = parseRupiah(document.getElementById('kebutuhan-profesi').value);
    
    if (!isNaN(penghasilan) && !isNaN(kebutuhan)) {
        const penghasilanBersih = penghasilan - kebutuhan;
        document.getElementById('penghasilan-bersih-profesi').value = formatRupiah(penghasilanBersih);
    }
}

function updateHartaSimpananMaal() {
    const a = parseRupiah(document.getElementById('a').value);
    const b = parseRupiah(document.getElementById('b').value);
    const c = parseRupiah(document.getElementById('c').value);
    const d = parseRupiah(document.getElementById('d').value);
    const e = parseRupiah(document.getElementById('e').value);
    const g = parseRupiah(document.getElementById('g').value);

    if (!isNaN(a) && !isNaN(b) && !isNaN(c) && !isNaN(d) && !isNaN(e)) {
        const f = a + b + c + d + e;
        document.getElementById('f').value = formatRupiah(f);

        const h = f - g;
        document.getElementById('h').value = formatRupiah(h);
    }
}

function hitungZakat(type) {
    let resultText;
    let zakat;
    const resultDiv = document.getElementById('result');
    resultDiv.innerHTML = '';

    if (type === 'profesi') {
        const penghasilanBersih = parseRupiah(document.getElementById('penghasilan-bersih-profesi').value);
        const nisabBulan = parseRupiah(document.getElementById('nisab-bulan-profesi').value);

        if (isNaN(penghasilanBersih) || isNaN(nisabBulan)) {
            resultDiv.innerText = 'Mohon periksa input Anda.';
            return;
        }

        if (penghasilanBersih < nisabBulan) {
            resultText = 'Penghasilan Anda belum mencapai nisab. Anda tetap bisa menyempurnakan niat baik dengan bersedekah.';
            document.getElementById('buttons-below-nisab').style.display = 'flex';
            document.getElementById('buttons-above-nisab').style.display = 'none';
        } else {
            zakat = penghasilanBersih * 0.025;
            resultText = `Jumlah Zakat yang harus dibayar: ${formatRupiah(zakat)}`;
            document.getElementById('buttons-below-nisab').style.display = 'none';
            document.getElementById('buttons-above-nisab').style.display = 'flex';
        }
    } else if (type === 'maal') {
        const hartaKenaZakat = parseRupiah(document.getElementById('h').value);
        const nisabTahun = parseRupiah(document.getElementById('nisab-tahun-maal').value);

        if (isNaN(hartaKenaZakat) || isNaN(nisabTahun)) {
            resultDiv.innerText = 'Mohon periksa input Anda.';
            return;
        }

        if (hartaKenaZakat < nisabTahun) {
            resultText = 'Harta Anda belum mencapai nisab. Anda tetap bisa menyempurnakan niat baik dengan bersedekah.';
            document.getElementById('buttons-below-nisab-maal').style.display = 'flex';
            document.getElementById('buttons-above-nisab-maal').style.display = 'none';
        } else {
            zakat = hartaKenaZakat * 0.025;
            resultText = `Jumlah Zakat yang harus dibayar: ${formatRupiah(zakat)}`;
            document.getElementById('buttons-below-nisab-maal').style.display = 'none';
            document.getElementById('buttons-above-nisab-maal').style.display = 'flex';
        }
    }

    resultDiv.innerHTML = resultText;
}

function resetForm() {
    document.getElementById('zakat-maal').reset();
    document.getElementById('zakat-profesi').reset();
    document.getElementById('result').innerHTML = '';
    document.getElementById('buttons-below-nisab').style.display = 'none';
    document.getElementById('buttons-above-nisab').style.display = 'none';
}

function switchTab(tabName) {
    const tabs = document.getElementsByClassName('tab-content');
    for (let i = 0; i < tabs.length; i++) {
        tabs[i].classList.remove('active');
    }
    document.getElementById(tabName).classList.add('active');

    const tabButtons = document.getElementsByClassName('tab');
    for (let i = 0; i < tabButtons.length; i++) {
        tabButtons[i].classList.remove('active');
    }
    document.querySelector(`[onclick="switchTab('${tabName}')"]`).classList.add('active');
}

// Tambahkan format angka otomatis saat input
const inputIDs = ['a', 'b', 'c', 'd', 'e', 'g', 'penghasilan-profesi', 'kebutuhan-profesi', 'hargaemas-maal', 'hargaemas-profesi'];

inputIDs.forEach(id => {
    const input = document.getElementById(id);
    input.addEventListener('input', function () {
        const nilai = parseRupiah(this.value);
        this.value = formatAngkaRibuan(nilai);

        // Perbarui kalkulasi sesuai input
        if (['a','b','c','d','e','g'].includes(id)) {
            updateHartaSimpananMaal();
        }
        if (['penghasilan-profesi','kebutuhan-profesi'].includes(id)) {
            updatePenghasilanBersihProfesi();
        }
        if (['hargaemas-maal'].includes(id)) {
            updateNisab('maal');
        }
        if (['hargaemas-profesi'].includes(id)) {
            updateNisab('profesi');
        }
    });
});

function ambilHargaEmasRealtime() {
    fetch('/api/harga-emas')
        .then(response => response.json())
        .then(data => {
            if (data.harga_emas) {
                const formatted = formatAngkaRibuan(data.harga_emas);
                document.getElementById('hargaemas-maal').value = formatted;
                document.getElementById('hargaemas-profesi').value = formatted;
                updateNisab('maal');
                updateNisab('profesi');
            }
        })
        .catch(error => console.error('Gagal mengambil harga emas:', error));
}

window.addEventListener('DOMContentLoaded', () => {
    ambilHargaEmasRealtime();
});
