<!DOCTYPE html>
<html lang="en">
<!-- Basic -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!-- Mobile Metas -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="initial-scale=1, maximum-scale=1">
<!-- Site Metas -->
<title> SISTEM PAKAR DIAGNOSIS KERUSAKAN SEPEDA MOTOR YAMAHA GRAND FILANO</title>
<meta name="keywords" content="">
<meta name="description" content="">
<meta name="author" content="">
<!-- Site Icons -->
<link rel="shortcut icon" href="<?= base_url(); ?>assets/images/fevicon.ico.png" type="image/x-icon" />
<link rel="apple-touch-icon" href="<?= base_url(); ?>assets/images/apple-touch-icon.png">
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<!-- Site CSS -->
<link rel="stylesheet" href="<?= base_url(); ?>assets/style.css">
<!-- Colors CSS -->
<link rel="stylesheet" href="<?= base_url(); ?>assets/css/colors.css">
<!-- ALL VERSION CSS -->
<link rel="stylesheet" href="<?= base_url(); ?>assets/css/versions.css">
<!-- Responsive CSS -->
<link rel="stylesheet" href="<?= base_url(); ?>assets/css/responsive.css">
<!-- Custom CSS -->
<link rel="stylesheet" href="<?= base_url(); ?>assets/css/custom.css">
<!-- Modernizer for Portfolio -->
<script src="<?= base_url(); ?>assets/js/modernizer.js"></script>
<!-- [if lt IE 9] -->
</head>

<body class="clinic_version">
    <!-- LOADER -->
    <div id="preloader">
        <img class="preloader" src="<?= base_url(); ?>assets/images/loaders/heart-loading2.gif" alt="">
    </div>
    <header>
        <div class="header-bottom wow fadeIn">
            <div class="container">
                <nav class="main-menu">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"><i class="fa fa-bars" aria-hidden="true"></i></button>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                            <li><a class="<?php if ($this->uri->uri_string() == "") {
                                                echo "active";
                                            } ?>" href="<?= base_url(''); ?>">Home</a></li>
                            <li><a class="<?php if ($this->uri->uri_string() == "berita") {
                                                echo "active";
                                            } ?>" data-scroll href="<?= base_url('berita'); ?>">Informasi</a></li>
                            <li><a class="<?php if ($this->uri->uri_string() == "periksa") {
                                                echo "active";
                                            } ?>" data-scroll href="<?= base_url('periksa'); ?>">Periksa</a></li>
                            <li><a class="<?php if ($this->uri->uri_string() == "Contact") {
                                                echo "active";
                                            } ?>" data-scroll href="<?= base_url('Contact'); ?>">Tentang</a></li>
                        </ul>
                    </div>
                </nav>
                <div class="serch-bar navbar-collapse collapse" id="navbar">
                    <ul class="nav navbar-nav">
                        <li>
                            <a class="btn btn-info btn-lg" data-scroll href="<?= site_url('administrator/login'); ?>">Login <i class="fa fa-sign-in" aria-hidden="true"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>