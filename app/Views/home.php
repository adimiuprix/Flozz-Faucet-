<?= $this->extend('layouts/template') ?>
<?= $this->section('content') ?>

<section class="welcome-section text-center py-5">
    <div class="container">
        <h2 class="title-site">Welcome to Flozzcet</h2>
        <p class="lead">Welcome to FlozzFaucet, the right step for your crypto experience.</p>
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
                        <p class="card-text">Since 14 Aprill 2024</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="team section">
    <div class="container">
        <div class="col-12">
            <div class="section-title">
                <div class="text-center">
                    <h2 class="wow fadeInUp" data-wow-delay=".4s" style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">Statistics &amp; Payment Proofs!</h2>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Username</th>
                                    <th>Amount</th>
                                    <th>Hash</th>
                                    <th>Type Transation</th>
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
                                    <td><?= $trans['type']; ?></td>
                                    <?php
                                        $carbonDate = \Carbon\Carbon::parse($trans['create_at']);
                                        $formatedDate = $carbonDate->format('d F Y');
                                    ?>
                                    <td><?= $formatedDate; ?></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>