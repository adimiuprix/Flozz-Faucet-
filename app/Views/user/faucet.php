<?= $this->extend('layouts/user-template') ?>
<?= $this->section('content') ?>

<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-4">
            <div class="bg-secondary rounded d-flex align-items-center justify-content-center p-4">
                <div class="ms-3 text-center">
                    <p class="mb-2">Timer</p>
                    <h6 class="mb-0">00:00</h6>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-xl-4">
            <div class="bg-secondary rounded d-flex align-items-center justify-content-center p-4">
                <div class="ms-3 text-center">
                    <p class="mb-2">Reward</p>
                    <h6 class="mb-0">1 TRX</h6>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-xl-4">
            <div class="bg-secondary rounded d-flex align-items-center justify-content-center p-4">
                <div class="ms-3 text-center">
                    <p class="mb-2">Energy</p>
                    <h6 class="mb-0"><?= $energy; ?></h6>
                </div>
            </div>
        </div>
    </div>

    <div class="pt-3">
        <div class="alert alert-info text-center">
            Follow our channel for latest announcements <a href="http://">@grouptele</a>
        </div>
    </div>

    <div class="pt-3">
        <div class="col-12 col-md-12 col-lg-12 mb-4 text-center">
            <form action="<?= base_url('faucet-run'); ?>" method="post">
                <div class="text-center">

                </div>
                <button type="submit" class="btn btn-secondary btn-lg claim-button"><i class="far fa-check-circle"></i> Collect your reward</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>