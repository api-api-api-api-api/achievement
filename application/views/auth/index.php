<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $judul; ?></title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/'); ?>css/custom.css" rel="stylesheet">

    <style>
        .bg-login-image {
            background-image: url("<?= base_url('assets/img/bgn.jpg'); ?>");
            background-size: cover;
            background-position: center;
            text-align: center;
            height: 100%;
        }
        
        .tembus {
            position:relative;
            background-color: rgba(133, 0, 0, 0);
            width:100%;
            display:flex;
            justify-content:center;
        }
    </style>
</head>

<body class="bg-login-image">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5 tembus">
                    <div class="card-body p-0">


                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-5 d-block d-lg-block">
                                <br>
                                <img src="<?= base_url(); ?>/assets/img/logo.png" width="250px">
                            </div>

                            <div class="col-lg-7">
                                <div class="p-3">
                                    <div class="text-center">
                                        <hr class="bg-white">
                                        <h1 class="h3 text-white my-2"><b>SEKARTAMA</b></h1>
                                        <h1 class="h4 text-white my-2">Login!!!</h1>
                                        <hr class="bg-white">
                                    </div>
                                    <!-- Show Flash_msg -->
                                    <?= $this->session->flashdata('message') ?>

                                    <!-- form login -->
                                    <?= form_open('', ['class' => 'user']); ?>
                                    <form class="user" method="post" action="<?= base_url() ?>">
                                        <div class="form-group">
                                            <input type="text" name="username" class="form-control form-control-user <?= form_error('username') ? 'is-invalid border-left-danger' : 'border-left-info' ?>" value="<?= set_value('username') ?>" placeholder="Username">
                                            <div class="invalid-feedback">
                                                <?= form_error('username', '<p class="text-danger pl-3">', '</p>') ?>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <input type="password" name="pass" class="form-control form-control-user <?= form_error('pass') ? 'is-invalid border-left-danger' : 'border-left-info' ?>" placeholder="Password">
                                            <div class="invalid-feedback">
                                                <?= form_error('pass', '<p class="text-danger pl-3">', '</p>') ?>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn text-white bg-gradient-danger btn-user btn-block">
                                            Login
                                        </button>
                                        <?= form_close(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>