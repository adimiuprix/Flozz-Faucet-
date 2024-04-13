<?= $this->extend('layouts/template') ?>
<?= $this->section('content') ?>

<section class="welcome-section text-center py-5">
    <div class="container">
        <h2>Welcome</h2>
        <p class="lead">Selamat datang di FlozzFaucet, langkah tepat untuk pengalaman crypto anda. Silakan daftar atau login untuk melanjutkan.</p>
        <br>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <?php if(!is_null($is_login)): ?>
                <a href="<?= base_url('dashboard'); ?>" class="btn btn-primary btn-lg">Dashboard</a>
                <?php else: ?>
                <a href="<?= base_url('registration'); ?>" class="btn btn-primary btn-lg">Daftar</a>
                <a href="<?= base_url('login'); ?>" class="btn btn-secondary btn-lg">Login</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<section class="stats-section py-5">
    <div class="container">
        <h2 class="text-center mb-4">Stats</h2>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Total User</h5>
                        <p class="card-text"><?= $totUser;?></p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Total Paid</h5>
                        <p class="card-text"><?= $totPaid;?></p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Online</h5>
                        <p class="card-text">Since Aprill 2024</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="payout-proof py-5">
    <div class="container">
        <h2 class="text-center mb-4">Statistic</h2>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Username</th>
                        <th>Amount</th>
                        <th>Hash</th>
                        <th>Time</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $counter = 1; ?>
                    <?php foreach($transacts as $trans): ?>
                    <tr>
                        <td><?= $counter++; ?></td>
                        <td><?= $trans['username']; ?></td>
                        <td><?= $trans['amount']; ?></td>
                        <td><?= $trans['hash']; ?></td>
                        <td><?= $trans['create_at']; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<?= $this->endSection() ?>