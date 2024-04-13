<?= $this->extend('layouts/user-template') ?>
<?= $this->section('content') ?>

<!-- Blank Start -->
<div class="container-fluid pt-4 px-4">
    <div class="col-sm-12 col-xl-12">
        <div class="bg-secondary rounded h-100 p-4">
            <h6 class="mb-4">Setting your account</h6>
            <form action="<?= base_url('settuser'); ?>" method="post">
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="<?= $userdetail['username']; ?>" readonly />
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" name="email" value="<?= $userdetail['email']; ?>" placeholder="Your email">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">Address</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="sendto" value="<?= $userdetail['address']; ?>" placeholder="Your address">
                        <div class="form-text text-white">You can use the email registered with faucetpay to receive payments or you can also use the linked TRX address.</div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label">New Password</label>
                    <div class="col-sm-10">
                        <input type="password" name="password" class="form-control" placeholder="Leave blank to not change">
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Blank End -->

<?= $this->endSection() ?>