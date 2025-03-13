<?= $this->extend('layouts/template-page'); ?>

<?= $this->section('content'); ?>
<!-- Contact Info -->
<section class="contact-info">
    <div class="auto-container">
    <h2 class="text-center"><?= $keyword; ?></h2><br>
        <div class="inner-container">
            <div class="bg-white px-3 mt-0 px-0 py-5 px-lg-5 rounded-3">
                <div class="panel panel-white">
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table id="mytable" class="display table table-striped table-hover" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Logo</th>
                                        <th>Mitra</th>
                                        <th>Deskripsi</th>
                                        <th>Tanggal</th>                    
                                        <th>Kategori</th>
                                        
                                    </tr>
                                </thead>
                                <tbody id="body-table">
                                    <?php $no = 0; foreach ($partners as $row) : $no++; ?>
                                        <tr>
                                            <td style="vertical-align: middle;"><?= $no; ?></td>
                                            <td style="vertical-align: middle;">
                                                <?php if (empty($row['partner_image'])) : ?>
                                                    <img class="img-circle" width="50" src="/assets/backend/images/partners/default-partners.png">
                                                <?php else : ?>
                                                    <img class="img-circle" width="50" src="/assets/backend/images/partners/<?= $row['partner_image']; ?>">
                                                <?php endif; ?>
                                            </td>
                                            <td style="vertical-align: middle;"><?= $row['partner_name']; ?></td>
                                            <td style="vertical-align: middle;">
                                                <a href="<?= $row['partner_link']; ?>"><?= $row['partner_desc']; ?></a>
                                            </td>
                                            <td style="vertical-align: middle;"><?= $row['partner_date']; ?></td>
                                            <td style="vertical-align: middle;"><?= $row['category_name']; ?></td>
                                            
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
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
