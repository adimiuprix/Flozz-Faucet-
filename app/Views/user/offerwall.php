<?= $this->extend('layouts/user-template') ?>
<?= $this->section('content') ?>

<div class="container-fluid pt-4 px-4">
    <h2 class="mb-4">Topup page</h2>
    <div class="row g-4">
        <div class="col-sm-12 col-md-6 col-xl-4">
            <div class="h-100 bg-secondary rounded p-4 text-center">
                <p class="mb-2">
                    Price: 10 TRX</br>
                    Energy: 20 / day
                </p>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-xl-4">
            <div class="h-100 bg-secondary rounded p-4 text-center">
                <p class="mb-2">
                    Price: 10 TRX</br>
                    Energy: 20 / day
                </p>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-xl-4">
            <div class="h-100 bg-secondary rounded p-4 text-center">
                <p class="mb-2">
                    Price: 10 TRX</br>
                    Energy: 20 / day
                </p>
            </div>
        </div>
    </div>
    <div class="text-center">
        <button type="button" class="btn btn-primary rounded-pill m-2">Topup now</button>
    </div>
</div>

<!-- Content End -->
<?= $this->endSection() ?>