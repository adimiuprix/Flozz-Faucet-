<?= $this->extend('layouts/user-template') ?>
<?= $this->section('content') ?>

<!-- Sale & Revenue Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-4">
            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-chart-line fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Balance</p>
                    <h6 class="mb-0"><?= $stats['balance']; ?> TRX</h6>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-xl-4">
            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-poo-storm fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Energy</p>
                    <h6 class="mb-0"><?= $stats['energy']; ?></h6>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-xl-4">
            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-chart-pie fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Referral</p>
                    <h6 class="mb-0"><?= $stats['reffs']; ?></h6>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Sale & Revenue End -->

<!-- Content End -->
<?= $this->endSection() ?>