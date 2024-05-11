<?= $this->extend('layouts/template') ?>
<?= $this->section('content') ?>
<section class="vh-100 bg-light">
    <div class="container h-100">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-lg-6">
                <div class="card shadow-lg p-5">
                    <h2 class="text-center mb-4">Login</h2>
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