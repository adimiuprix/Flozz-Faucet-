<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Flozzcet</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?= base_url('public/user/lib/owlcarousel/assets/owl.carousel.min.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('public/user/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css'); ?>" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?= base_url('public/user/css/bootstrap.min.css'); ?>" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="<?= base_url('public/user/css/style.css'); ?>" rel="stylesheet">
    <style>
        .form-control:disabled, .form-control:read-only {
            background-color: white!important;
            opacity: 1;
        }
        .authkong_captcha {
            flex-direction: row;
            display: flex!important;
            align-content: space-between;
            justify-content: center;
            padding-bottom: 15px;
        }
    </style>
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->
        <?= $this->include('layouts/sidebar.php'); ?>
        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
                <a href="/" class="navbar-brand d-flex d-lg-none me-4"></a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                <i class="fa fa-bars"></i>
                </a>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                        <img class="rounded-circle me-lg-2" src="<?= base_url('public/user/img/user.jpg'); ?>" alt="" style="width: 40px; height: 40px;">
                        <span class="d-none d-lg-inline-flex">User</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="<?= base_url('setting'); ?>" class="dropdown-item">Settings</a>
                            <a href="<?= base_url('logout'); ?>" class="dropdown-item">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->
            <?= $this->renderSection('content'); ?>
            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">Your Site Name</a>, All Right Reserved. 
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End -->
        </div>
        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('public/user/lib/chart/chart.min.js'); ?>"></script>
    <script src="<?= base_url('public/user/lib/easing/easing.min.js'); ?>"></script>
    <script src="<?= base_url('public/user/lib/waypoints/waypoints.min.js'); ?>"></script>
    <script src="<?= base_url('public/user/lib/owlcarousel/owl.carousel.min.js'); ?>"></script>
    <script src="<?= base_url('public/user/lib/tempusdominus/js/moment.min.js'); ?>"></script>
    <script src="<?= base_url('public/user/lib/tempusdominus/js/moment-timezone.min.js'); ?>"></script>
    <script src="<?= base_url('public/user/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js'); ?>"></script>
    <!-- Template Javascript -->
    <script src="<?= base_url('public/user/js/main.js'); ?>"></script>
    <script defer="defer" src="https://sg-captcha.authkong.com/static/challenges/js/api.js"></script>

</body>

</html>