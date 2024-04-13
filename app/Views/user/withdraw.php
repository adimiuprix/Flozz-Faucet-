<?= $this->extend('layouts/user-template') ?>
<?= $this->section('content') ?>

<!-- Blank Start -->
<div class="container-fluid pt-4 px-4">
<div class="col-sm-12 col-xl-12">
    <div class="bg-secondary rounded h-100 p-4">
        <h6 class="mb-4">Withdraw Form</h6>
        <form action="<?= base_url('withdraw-request')?>" method="post">
            <div class="mb-3">
                <label class="form-label">Address</label>
                <input type="text" name="address" class="form-control" value="<?= isset($statUsr['address']) ? $statUsr['address'] : "Not set"; ?>" readonly />
                <div class="form-text text-white">Set your address from <a href="https://faucetpay.io/" target="_blank">faucetpay.io</a>, if you still not set, you can click <a href="<?= base_url('setting'); ?>">here</a> for setting that.</div>
            </div>
            <div class="mb-3">
                <label class="form-label">Amount</label>
                <input type="number" name="amount" value="0" class="form-control" step="any">
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">withdraw</button>
            </div>
        </form>
    </div>
</div></div>
<!-- Blank End -->

<?= $this->endSection() ?>