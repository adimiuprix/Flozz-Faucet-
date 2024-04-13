<?= $this->extend('layouts/template') ?>
<?= $this->section('content') ?>
<section class="vh-100 bg-light">
    <div class="container h-100">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-lg-6">
                <div class="card shadow-lg p-5">
                    <form action="<?= base_url('passing-otp'); ?>" method="post">
                        <div class="mb-3">
                            <label class="form-label">Input OTP</label>
                            <input type="number" name="otpcode" class="form-control" placeholder="Input OTP from email">
                        </div>
                        <div class="mt-3 text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>