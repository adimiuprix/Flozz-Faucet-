<?= $this->extend('layouts/template') ?>
<?= $this->section('content') ?>

<section class="page_body">
    <div class="container" style="max-width:450px">
        <div class="row mt-4">
            <div class="col-lg-12">
                <div class="info_card p-0">
                    <div class="row p-4">
                        <div class="col-lg-12 mb-2">
                            <h4 class="page_title"><i class="fas fa-sign-in-alt mr-1"></i>LOGIN</h4>
                            <p class="page_description mb-0">
                                Already have an account? <a href="<?= base_url('login'); ?>" class="text-info">Login</a>.
                            </p>
                        </div>

                        <div class="col-lg-12">
                            <?php if (session()->has('error')): ?>
                            <div class="alert alert-danger" role="alert">
                                <?= session('error') ?>
                            </div>
                            <?php endif ?>
                        </div>

                        <form action="<?= base_url('register'); ?>" class="container" method="post">
                            <div class="col-lg-12 mb-2">
                                <div class="label_content">Username<span class="text_danger ml-1">*</span></div>
                                <div class="input_container">
                                    <div class="input_group password_container">
                                        <input type="text" id="username" name="username">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 mb-2">
                                <div class="label_content">E-mail Address<span class="text_danger ml-1">*</span></div>
                                <div class="input_container">
                                    <div class="input_group password_container">
                                        <input type="email" maxlength="64" id="email" name="email">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 mb-2">
                                <div class="label_content">Password<span class="text_danger ml-1">*</span></div>
                                <div class="input_container">
                                    <div class="input_group password_container">
                                        <input type="password" maxlength="32" id="password" name="password"><i class="far fa-eye"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 mb-2">
                                <div class="label_content">referral (optional)<span class="text_danger ml-1">*</span></div>
                                <div class="input_container">
                                    <div class="input_group password_container">
                                        <input type="reffcode" maxlength="64" id="reffcode" name="reffcode">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 mb-2">
                                <button type="submit" class="btn btn-lg btn-login2" style="margin:10px calc(50% - 150px);">Create an account</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>







<section class="vh-100 bg-light">
    <div class="container h-100">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-lg-6">
                <div class="card shadow-lg p-5">
                    <h2 class="text-center mb-4">Registration</h2>

                    <form action="<?= base_url('register'); ?>" method="post">
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" class="form-control" name="username">
                            <div id="username" class="form-text">We'll never share your email with anyone else.</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email address</label>
                            <input type="email" class="form-control" name="email">
                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" id="password">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Referral code (optional)</label>
                            <input type="text" class="form-control" name="reffcode" value="<?= $reffCode; ?>" readonly>
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="remember">
                            <label class="form-check-label" for="remember">Remember me</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    <div class="mt-3 text-center">
                        <p>Already have an account? <a href="<?= base_url('login'); ?>">Login here</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>