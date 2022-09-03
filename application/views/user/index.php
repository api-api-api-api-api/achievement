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
            <h4 class="h4 mb-2 mt-1 text-gray-900"><i class="fa fa-fw fa-list"></i> <?= $judul; ?></h4>

        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
            <button type="button" data-toggle="modal" data-target="#tambah-data" class="btn text-white bg-gradient-primary" role="button"><i class="fas fa-fw fa-plus"></i> Tambah Data</button>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="table-achievement" class="table table-striped display" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Keterangan</th>                                    
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
            <span>Copyright &copy; IT-SEKARTAMA <?= date('Y'); ?></span>
        </div>
    </div>
</footer>
<!-- End of Footer -->


<div class="modal fade" id="tambah-data" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-white bg-gradient-primary">
                <h5 class="modal-title">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <?= form_open('menu/tambah_data_aksi', ['id' => 'formTambahData']); ?>
            <div class="modal-body">
                <div class="form-group">
                    <label for="tanggal">Tanggal</label>
                    <input readonly name="tanggal" class="form-control" id="datepicker" value ="" type="text" placeholder="Klik untuk pilih tanggal">
                    <div class="invalid-feedback"></div>
                </div>
                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <textarea name="keterangan" class="form-control" id="keterangan" rows="12"></textarea>
                    <div class="invalid-feedback"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn text-white bg-gradient-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn text-white bg-gradient-primary">Simpan</button>
                </div>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>

<!-- Detail -->
<div class="modal fade" id="detail-achievement" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-gradient-info text-white">
                <h5 class="modal-title">Edit Achievement</h5> <h5 class="instansi">
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('menu/ubah_status'); ?>" method="post">
                <div class="modal-body">
                    <input type="hidden" name="id" id="id_achievement">
                    <div class="modal-body">
                        <div class="form-group floating-label-form-group">
                            <label for="tanggal">Tanggal</label>
                            <label readonly class="form-control tgl" name="tgl">
                        </div>

                        <div class="form-group floating-label-form-group">
                            <label for="keterangan">Keterangan</label>
                            <textarea class="form-control isi" rows="10" name="keterangan" id="keterangan"></textarea>
                        </div>
                </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn text-white bg-gradient-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn text-white bg-gradient-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal Box - Hapus Data -->
<div class="modal fade" id="hapus-achievement" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-white bg-gradient-danger">
                <h5 class="modal-title">Hapus Achievement</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('menu/hapus_data'); ?>" method="post">
                <div class="modal-body">
                    Apakah anda yakin ingin menghapus data ini?
                    <input type="hidden" name="id" id="id">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn text-white bg-gradient-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn text-white bg-gradient-primary">Yakin</button>
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
<script src="<?= base_url(); ?>assets/plugin/datepicker/dist/js/bootstrap-datepicker.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

<script>
    $(document).ready(function() {

        // DataTables - ebook
        dataTables_achievement();

        function dataTables_achievement() {
            $('#table-achievement').DataTable({
                responsive: true,
                "destroy": true,
                "processing": true,
                "serverSide": true,
                "order": [],

                "columnDefs": [{
                    "targets": [0],
                    "orderable": false
                }],
                scrollY: "300px",
                scrollX: true,
                // scrollCollapse: false,
                // paging: true,
                "lengthChange": false,

                "lengthMenu": [
                    [10, 30, 50, -1],
                    [10, 30, 50, "All"]
                ],

                "ajax": {
                    "url": "<?= base_url('menu/read_data_user') ?>",
                    "type": "POST"
                },

            })
        }

        // var table = $('#table-achievement').DataTable()
        // table.columns([4]).visible(false);

        // Modal Box - achievement
        $(document).on("click", ".btn-hapus", function() {

            $(".modal-body #id_achievement").val($(this).data('id'))
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

<script>
    $('#datepicker').datepicker({
    autoclose: true,
    format: 'yyyy-mm-dd',
    });
</script>

<script>
    $(document).ready(function() {
        $("#formTambahData").submit(function(e) {
            e.preventDefault()

            var form = $("#formTambahData")
            var data = $(this).serialize()

            $.ajax({
                url: form.attr('action'),
                type: form.attr('method'),
                dataType: 'json',
                data: data,
                success: function(res) {
                    // jika respon -> status = true
                    if (res.status) {
                        $('#tambah-data').modal('toggle')
                        location.reload()
                        // jika respon -> status = false
                    } else {
                        $.each(res.errors, function(key, value) {
                            $('[name="' + key + '"]').addClass('is-invalid');
                            $('[name="' + key + '"]').next().text(value);
                            if (value == "") {
                                $('[name="' + key + '"]').removeClass('is-invalid');
                                $('[name="' + key + '"]').addClass('is-valid');
                            }
                        })
                    }
                }
            })
        })
    })
</script>

</body>

</html>