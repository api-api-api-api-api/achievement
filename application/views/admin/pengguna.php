<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- .row -->
    <div class="row mt-4">
        <!-- .col -->
        <div class="col-12">

            <!-- cek session -->
            <?php if ($this->session->flashdata('msg')) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    Data berhasil <strong><?= $this->session->flashdata('msg'); ?></strong>
                </div>
            <?php endif; ?>

            <!-- page heading - judul -->
            <h1 class="h4 my-1 text-gray-800"><i class="fa fa-fw fa-users"></i> <?= $judul; ?></h1>

        </div>
    </div>

    <div class="row">
        <div class="col">

            <div class="card mt-4">
                <div class="card-header">
                    <a href="<?= base_url('tambah-pengguna') ?>" class="d-none d-sm-inline-block btn btn-sm text-white bg-gradient-primary shadow-sm my-2"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama</th>
                                    <th>Divisi</th>
                                    <th>Username</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (empty($pengguna)) : ?>
                                    <tr>
                                        <td colspan="7">
                                            <h3>Belum ada data!</h3>
                                        </td>
                                    </tr>
                                <?php else : ?>
                                    <?php foreach ($pengguna as $num => $p) : ?>
                                        <tr>
                                            <td><?= $num + 1; ?></td>
                                            <td><?= $p['nama']; ?></td>
                                            <td><?= $p['nama_divisi']; ?></td>
                                            <td><?= $p['username']; ?></td>
                                            <td>
                                                <a href="" data-toggle="modal" data-target="#modalPassword" class="btn btn-sm text-white bg-gradient-warning" id="password-pengguna" data-id="<?= $p['id_user']; ?>">Password</a>
                                                <a href="" data-toggle="modal" data-target="#modalHapus" class="btn btn-sm text-white bg-gradient-danger" id="hapus-pengguna" data-id="<?= $p['id_user']; ?>">Hapus</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>

                    </div>

                </div>

            </div>

        </div>

    </div>

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

<!-- Modal Hapus Data Pengguna -->
<div class="modal fade" id="modalHapus" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header badge-primary">
                <h5 class="modal-title">Hapus <?= $judul; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/hapus_pengguna'); ?>" method="post">
                <div class="modal-body">
                    Apakah anda yakin ingin menghapus data ini?
                    <input type="hidden" name="id" id="id">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Yakin</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modalPassword" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-gradient-info text-white">
                <h5 class="modal-title">Reset Password</h5> <h5 class="password">
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/reset_password'); ?>" method="post">
                <div class="modal-body">
                    <input type="hidden" name="id" id="id">
                    <div class="modal-body">
                        <div class="form-group floating-label-form-group">
                            <label for="keterangan" class="font-underline"><u>Password</u></label>
                            <input class="form-control" name="password"></input>
                        </div>
                </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn text-white bg-gradient-primary">Simpan</button>
                    <button type="button" class="btn text-white bg-gradient-danger" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

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

<script>
    $(document).ready(function() {
        $(document).on("click", "#hapus-pengguna", function() {
            $(".modal-body #id").val($(this).data('id'));
        });
    });

    $(document).ready(function() {
        $(document).on("click", "#password-pengguna", function() {
            $(".modal-body #id").val($(this).data('id'));
        });
    });
</script>

</body>

</html>