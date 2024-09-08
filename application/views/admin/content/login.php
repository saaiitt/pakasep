<!doctype html>
<html lang="en">

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Sistem Pakar Diagnosis Kerusakan Sepeda Motor Yamaha Grand Filano</title>
<link rel="shortcut icon" type="image/png" href="<?= base_url(); ?>assets/images/fevicon.ico.png" />
<link rel="stylesheet" href="<?php echo base_url() ?>assets/dashboard/css/styles.min.css" />
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
        <div class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-md-8 col-lg-6 col-xxl-4">
                        <div class="card mb-0">
                            <div class="card-body">
                                <h3 class="text-center">SELAMAT DATANG DI<br>SISTEM PAKAR DIAGNOSA<br>KERUSAKAN SEPEDA MOTOR YAMAHA GRAND FILANO</h3><br>
                                <?php $this->load->view('admin/partials/alert.php'); ?>
                                <form action="<?= site_url('administrator/login/process'); ?>" method="post">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Username</label>
                                        <input type="text" class="form-control" name="username" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-4">
                                        <label for="exampleInputPassword1" class="form-label">Password</label>
                                        <input type="password" class="form-control" name="password" id="exampleInputPassword1">
                                    </div>
                                    <button class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2" type="submit">Sign In</button>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <a class="text-primary fw-bold" href="">Forgot Password ?</a>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <p class="fs-4 mb-0 fw-bold">Back to main menu?</p>
                                        <a class="text-primary fw-bold ms-2" href="<?= site_url(''); ?>">Back to home</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo base_url() ?>assets/dashboard/libs/jquery/dist/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>assets/dashboard/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>