<div class="container-fluid">

    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">

            <div class="card shadow-sm">
                <div class="card-header badge-primary">
                    <h3 class="h3 text-white"><?= $judul ?></h3>
                </div>
                <div class="card-body">
                    <form action="" method="POST">

                        <div class="form-group">
                            <label for="nama">Nama Divisi</label>
                            <input type="text" name="nama" id="nama" class="form-control <?= form_error('nama') ? 'is-invalid' : 'border-left-primary' ?>" value="<?= set_value('nama'); ?>" placeholder="Nama">
                            <div class="invalid-feedback">
                                <?= form_error('nama'); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="float-right btn btn-primary shadow-sm">Tambah Data</button>
                            <a href="<?= base_url('data-pengguna'); ?>" class="float-right btn btn-warning mr-2 shadow-sm">Kembali</a>
                        </div>

                    </form>
                </div>
            </div>

        </div>
        <!-- / .col -->
    </div>
    <!-- / .row -->

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>CopyrightTSI &copy; SEKARTAMA <?= date('Y'); ?></span>
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

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

</body>

</html>