<?= $this->extend('layouts/template') ?>
<?= $this->section('content') ?>
<section class="vh-100 bg-light">
    <div class="container h-100">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-lg-6">
                <div class="card shadow-lg p-5">
                    <h2 class="text-center mb-4">Password recovery</h2>
                    <form action="<?= base_url('forget'); ?>" method="post">
                        <div class="mb-3">
                            <label class="form-label">Email address</label>
                            <input type="email" name="email" class="form-control" placeholder="Your email">
                        </div>
                        <button type="submit" class="btn btn-primary">Proses</button>
                    </form>
                    <div class="mt-3 text-center">
                        <p>Sudah punya akun? <a href="<?= base_url('login'); ?>">Login disini</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>