<!DOCTYPE html>
<html lang="en">
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tronzyllo | Unlimited Troncoin, One Click Away!</title>
        <meta name="description" content="Start earning free Troncoin today! Join us and claim your rewards easily, every day.">
        <meta name="keyword" content="faucet, web mining, free claim, viefaucet, faucet crpto Flozzcet, Tronzyllo, tronzyllo, Free earning, crypto app, apk legit, crypro site">
        <link rel="icon" type="image/x-icon" href="public/assets/images/favicon.png">
        <link rel="shortcut icon" href="public/assets/images/favicon.png" type="image/x-icon">
        <link rel="stylesheet" href="public/assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="public/assets/css/plugin.css">
        <link rel="stylesheet" href="public/assets/css/style.css">
        <link rel="stylesheet" href="public/assets/css/responsive.css">
        <link rel="stylesheet" href="public/assets/css/icofont.min.css">
        <link rel="stylesheet" href="public/assets/css/jquery.toast.css">

    </head>
    <style>
		@media (max-width:575px){.navbar-brand{margin-top:5px!important}}
	</style>
    <body>
        <header class="header">
            <div class="mainmenu-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <a class="navbar-brand" href="<?= base_url('/'); ?>">
								<img src="public/assets/images/logo.png" alt="" style="height:60px">
							</a>
                            <div class="float-right mt-3">
                                <?php if(!is_null($is_login)): ?>
                                <a href="<?= base_url('dashboard'); ?>" class="btn btn-login mr-2">Dashboard</a>
                                <a href="<?= base_url('logout'); ?>" class="btn btn-login mr-2">Logout</a>
                                <?php else: ?>
                                <a href="<?= base_url('login'); ?>" class="btn btn-login mr-2">Login</a>
								<a href="<?= base_url('registration'); ?>" class="btn btn-signup">Sign up</a>
                                <?php endif; ?>
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <?= $this->renderSection('content'); ?>

        <footer class="footer" id="footer" style="font-size:14px;padding-top:5px">
            <div class="copy-bg" style="margin-top:10px">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <p class="copy_right text-center" style="font-size:14px">
                                <span style="font-weight:bold">Copyright ©2024 All rights reserved | Tronzyllo</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <div class="bottomtotop"><i class="fas fa-chevron-right"></i></div>

        <script src="public/assets/js/jquery.js"></script>
		<script src="public/assets/js/bootstrap.min.js"></script>
		<script src="public/assets/js/plugin.js"></script>
		<script src="public/assets/js/main.js"></script>
		<script src="public/assets/js/jquery.toast.js" type="text/javascript"></script>
		<script src="public/assets/js/bootstrap.bundle.min.js"></script>
        <script defer="defer" src="https://sg-captcha.authkong.com/static/challenges/js/api.js"></script>
    </body>
</html>