<?= $this->extend('layouts/template') ?>
<?= $this->section('content') ?>
<section class="vh-100 bg-light">
    <div class="container h-100">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-lg-6">
                <div class="card shadow-lg p-5">
                    <form action="<?= base_url('recpass'); ?>" method="post">
                        <div class="mb-3">
                            <label class="form-label">Set new password</label>
                            <input type="hidden" name="iduser" value="<?= $idUser; ?>">
                            <input type="text" name="password" class="form-control" placeholder="Input your new password">
                        </div>
                        <div class="mt-3 text-center">
                            <button type="submit" class="btn btn-primary">Recovery</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>