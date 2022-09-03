<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- .row -->
    <div class="row">
        <!-- .col -->
        <div class="col-12">

            <!-- welcome message -->
            <?php if ($this->session->flashdata('message')) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    Selamat datang <strong><?= $this->session->flashdata('message'); ?></strong>
                </div>
            <?php endif; ?>

            <?php if ($this->session->flashdata('msg')) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    Data berhasil <strong><?= $this->session->flashdata('msg'); ?></strong>
                </div>
            <?php endif; ?>

            <!-- page heading - judul -->
            <?php if ($user['role_id'] == 3) : ?>
            <h4 class="h4 mb-2 mt-1 text-gray-900"><i class="fa fa-fw fa-briefcase"></i> Kegiatan Divisi</h4>
            <?php endif; ?>
            <?php if ($user['role_id'] == 1 || $user['role_id'] == 2) : ?>
            <h4 class="h4 mb-2 mt-1 text-gray-900"><i class="fa fa-fw fa-briefcase"></i> <?= $this->session->userdata('nama_divisi'); ?></h4>
            <?php endif; ?>

        </div>
    </div>
    <?php if ($user['role_id'] == 3) : ?>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">

            <div class="card">
                <div class="card-body">
                    <table id="table-kegiatan-manager" class="table table-striped display" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Tanggal</th>
                                <th>Nama</th>
                                
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- DataTables -->
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
        <!-- / .col -->
    </div>
    <?php endif; ?>
    <?php if ($user['role_id'] == 1 || $user['role_id'] == 2) : ?>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">

            <div class="card">
                <div class="card-body">
                    <table id="table-kegiatan" class="table table-striped display" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Tanggal</th>
                                <th>Nama</th>
                                
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- DataTables -->
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
        <!-- / .col -->
    </div>
    <!-- / .row -->
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

<!-- Detail -->
<div class="modal fade" id="detail-kegiatan" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-gradient-primary">
                <h5 class="text-white modal-title">Detail kegiatan</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form>
                <div class="modal-body">
                    <input type="hidden" name="id" id="id_kegiatan">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-borderless">
                                    <tr>
                                        <td class="text-left">Nama</td>
                                        <th class="text-left instansi"></th>
                                    </tr>
                                    <tr>
                                        <td class="text-left">Tanggal</td>
                                        <th class="text-left tgl"></th>
                                    </tr>
                                </table>
                            </div>                            
                        </div>

                        <div class="form-group floating-label-form-group">
                            <textarea readonly class="form-control isi" rows="12"></textarea>
                        </div>
                </div>
                </div>
                <div class="modal-footer">
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

<!-- Datatables -->
<script src="<?= base_url('assets/') ?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/') ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/') ?>vendor/datatables/dataTables.rowReorder.min.js"></script>
<script src="<?= base_url('assets/') ?>vendor/datatables/dataTables.responsive.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

<script>
    $(document).ready(function() {

        // DataTables - ebook
        dataTables_kegiatan_manager();

        function dataTables_kegiatan_manager() {
            $('#table-kegiatan-manager').DataTable({
                "destroy": true,
                "processing": true,
                "serverSide": true,
                "order": [],

                "columnDefs": [{
                    "targets": [0],
                    "orderable": false
                }],
                // scrollCollapse: false,
                // paging: true,
                "lengthChange": false,
                "lengthMenu": [
                    [10, 30, 50, -1],
                    [10, 30, 50, "All"]
                ],

                "ajax": {
                    "url": "<?= base_url('kegiatan/read_data_manager') ?>",
                    "type": "POST"
                },

            })
        }

        dataTables_kegiatan();

        function dataTables_kegiatan() {
            $('#table-kegiatan').DataTable({
                "destroy": true,
                "processing": false,
                "serverSide": true,
                "order": [],

                "columnDefs": [{
                    "targets": [0],
                    "orderable": false
                }],
                // scrollCollapse: false,
                // paging: true,
                "lengthChange": false,
                "lengthMenu": [
                    [10, 30, 50, -1],
                    [10, 30, 50, "All"]
                ],

                "ajax": {
                    "url": "<?= base_url('kegiatan/read_data') ?>",
                    "type": "POST"
                },

            })
        }

        // var table = $('#table-kegiatan').DataTable()
        // table.columns([4]).visible(false);

        // Modal Box - kegiatan
        $(document).on("click", ".btn-hapus", function() {

            $(".modal-body #id_kegiatan").val($(this).data('id'))
            $(".modal-body div .tgl").html($(this).data('tgl'))
            $(".modal-body div .instansi").html($(this).data('instansi'))
            $(".modal-body div .judul").html($(this).data('judul'))
            $(".modal-body div .isi").html($(this).data('isi'))
        })

        $(document).on("click", ".btn-hapus", function() {
            $(".modal-body #id").val($(this).data('id'))
        })

    });
</script>

</body>

</html>