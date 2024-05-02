<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="<?= base_url('public/assets/css/bootstrap.css');?>" rel="stylesheet">
        <title>FlozzFaucet</title>
        <style>
        nav.nav-main {
            background-color: #141142;
        }
        .navbar-light .navbar-brand {
            color: #ffffffe6;
        }
        .navbar-light .navbar-nav .nav-link {
            color: #ffffff;
        }
        a.navbar-brand:hover {
            color: #1b97dd;
        }
        .navbar-light .navbar-nav .nav-link:hover {
            color: #1b97dd;
        }
        button.navbar-toggler.collapsed {
            line-height: 1;
            background-color: white;
            border: 1px solid #0d80c4;
            border-radius: .25rem;
            transition: box-shadow .15s ease-in-out;
        }
        button.navbar-toggler {
            line-height: 1;
            background-color: white;
            border: 1px solid #0d80c4;
            border-radius: .25rem;
            transition: box-shadow .15s ease-in-out;
        }
        section.welcome-section {
            background-color: #141142;
        }
        h2.title-site {
            color: white;
        }
        p.lead {
            color: white;
        }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light nav-main">
            <div class="container">
                <a class="navbar-brand" href="<?= base_url('/'); ?>">
                    <img src="<?= base_url('public/user/img/logo.png'); ?>" alt="Logo" width="auto" height="35" class="d-inline-block align-top">
                    FlozzFaucet
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link color-menu" href="<?= base_url('/'); ?>">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link color-menu" href="<?= base_url('about'); ?>">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link color-menu" href="<?= base_url('contact'); ?>">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <?= $this->renderSection('content'); ?>

        <footer class="footer mt-auto py-3 bg-light">
            <div class="container text-center">
                <span class="text-muted">Copyright 2024</span>
            </div>
        </footer>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>    </body>
</html>