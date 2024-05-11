<?= $this->extend('layouts/template') ?>
<?= $this->section('content') ?>
<section class="vh-100 bg-light">
    <div class="container h-100">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-lg-6">
                <div class="card shadow-lg p-5">
                    <h2 class="text-center mb-4">Login</h2>

                    <?php if (session()->has('fastmsg')): ?>
                        <div class="alert alert-success" role="alert">
                            <?= session('fastmsg') ?>
                        </div>
                    <?php endif ?>

                    <?php if (session()->has('error')): ?>
                        <div class="alert alert-danger" role="alert">
                            <?= session('error') ?>
                        </div>
                    <?php endif ?>

                    <form action="<?= base_url('logincheck'); ?>" method="post">
                        <div class="mb-3">
                            <label class="form-label">Email address</label>
                            <input type="email" name="email" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="pt-3">
                            <div class="col-12 col-md-12 col-lg-12 mb-4 text-center">
                                <div class="authkong_captcha" data-sitekey="<?= $siteKey; ?>" data-theme="light"></div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    <div class="mt-3 text-center">
                        <p>Don't have an account yet? <a href="<?= base_url('registration'); ?>">signup here</a></p>
                        <p>Forgot the password? <a href="<?= base_url('forget-password'); ?>">click here</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>