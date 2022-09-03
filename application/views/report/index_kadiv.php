<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row mt-4">
        <div class="col-xl-10 col-lg-10 col-md-12 col-sm-12 col-xs-12">

            <h4 class="h4 text-gray-900"><i class="fa fa-fw fa-print"></i> <?= $judul; ?></h4>

            <div class="card shadow-sm my-3">
                <div class="card-body border-left-info rounded-sm text-justify">
                    <i class="fa fa-fw fa-info-circle fa-lg"></i> <strong> Silahkan pilih range tanggal untuk melihat list data kegiatan.</strong>
                </div>
            </div>

        </div>
        <!-- .col -->
    </div>
    <!-- .row -->

    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <form action="<?= base_url('laporan/cetak_laporan_kadiv') ?>" method="post">
                <div class="form-row">
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
                            <label>Tanggal</label>
                            <div class="input-group">
                                <input readonly name="tgl_mulai" id="tgl_mulai" autocomplete="off" placeholder="tanggal mulai"
                                    class="form-control border-1 small border-left-primary">
                                <div class="input-group-append">
                                    <button class="btn btn-secondary" type="button" id="date1">
                                        <i class="fas fa-calendar fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                            <br>
                            <div class="input-group">
                                <input readonly name="tgl_selesai" id="tgl_selesai" autocomplete="off" placeholder="tanggal akhir"
                                    class="form-control border-1 small border-left-primary">
                                <div class="input-group-append">
                                    <button class="btn btn-secondary" type="button" id="date1">
                                        <i class="fas fa-calendar fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="divisi" id="divisi" class="form-control" value="<?= $this->session->userdata('divisi') ?>">
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <label for="namauser">Staff <sup class="text-info">Opsional</sup></label>
                            <select name="namauser" class="form-control shadow-sm border-left-primary" id="filter">
                                <option value="">-- Pilih Semua --</option>
                                <?php foreach ($namauser as $row) : ?>
                                    <option value="<?= $row['id_user']; ?>"><?= $row['nama']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12">
                        <button type="submit" name="btn-cek" class="btn bg-gradient-primary text-white shadow-sm btn-cek float-left" style="margin-top: 2rem;">Filter</button>

                        <!-- <button type="submit" name="cetak-pdf" class="btn btn-outline-danger shadow-sm ml-3" style="margin-top: 2rem;">PDF <i class="fa fa-file-pdf"></i></button> -->
                    </div>
                </div>
            </form>
        </div>
    </div>

    <?php if (!empty($data)) : ?>
        <div class="row my-1">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Tanggal</th>
                                <th>Nama</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $num => $row) : ?>
                                <tr>
                                    <td><?= $num + 1; ?></td>
                                    <td><?= $row['tanggal']; ?></td>
                                    <td><?= $row['nama']; ?></td>
                                    <td><textarea name="keterangan" readonly class="form-control-plaintext" id="keterangan" cols="30" rows="4"><?= $row['keterangan']; ?></textarea></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <?php else : ?>
        <div class="row my-1">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h3 class="h3 text-center">Data tidak ditemukan!</h3>
            </div>
        </div>
    <?php endif; ?>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; IT-SEKARTAMA <?= date('Y'); ?></span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- date Format -->
<script src="<?= base_url('assets/') ?>js/jquery-dateformat.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

<script src="<?= base_url(); ?>assets/plugin/datepicker/dist/js/bootstrap-datepicker.min.js"></script>

<script>
$('#tgl_mulai').datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd',
});

$('#tgl_selesai').datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd',
});
</script>

</body>

</html>