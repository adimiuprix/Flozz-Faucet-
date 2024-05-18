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
                                Already have an account? <a href="<?= base_url('login'); ?>" class="text-info">Login here</a>.
                            </p>
                        </div>

                        <div class="col-lg-12">
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
                        </div>

                        <form action="<?= base_url('forget'); ?>" class="container" method="post">
                            <div class="col-lg-12 mb-2">
                                <div class="label_content">E-mail Address<span class="text_danger ml-1">*</span></div>
                                <div class="input_container">
                                    <div class="input_group password_container">
                                        <input type="email" maxlength="64" id="email" name="email">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 mb-2">
                                <button type="submit" class="btn btn-lg btn-login2" style="margin:10px calc(50% - 150px);">Send OTP</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>