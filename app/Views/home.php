<?= $this->extend('layouts/template') ?>
<?= $this->section('content') ?>

<div class="hero-area">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-6 col-lg-5 col-md-12 col-12">
                <div class="hero-content">
                    <h1 class="wow fadeInLeft" data-wow-delay=".4s">Welcome To Tronzyllo</h1>
                    <p class="wow fadeInLeft" data-wow-delay=".6s">Start earning free Troncoin today! Join us and claim your rewards easily, every day.</p>
                    <div class="button wow fadeInLeft" data-wow-delay=".8s">
                        <?php if(!is_null($is_login)): ?>
                        <a href="<?= base_url('dashboard'); ?>" class="btn btn-info">Dashboard</a>
                        <a href="<?= base_url('logout'); ?>" class="btn btn-danger">Logout</a>
                        <?php else: ?>
                        <a href="<?= base_url('login'); ?>" class="btn">Login</a>
                        <a href="<?= base_url('registration'); ?>" class="btn btn-alt">Get started</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-7 col-md-12 col-12 text-center">
                <div class="hero-img d-none d-md-block"><img class="shape faucet" src="public/assets/images/hero.svg" alt=""></div>
            </div>
        </div>
    </div>
</div>
<section id="features" class="features section pt-5" style="background:#0f212e;">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2 class="wow fadeInUp" data-wow-delay=".4s">Ways of earning.</h2>
                    <p class="wow fadeInUp" data-wow-delay=".6s">List of the types of tasks you can do to earn money using our service. Each task has a different way to complete!</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <div class="single-feature wow fadeInUp" data-wow-delay=".2s">
                    <i class="fas fa-hand-holding-usd"></i>
                    <h3>Faucet Claim</h3>
                    <p>Wait until the clock stops and click to "Ready To Claim" for claiming faucet.</p>
                </div>
            </div>
            <!-- <div class="col-lg-4 col-md-6 col-12">
                <div class="single-feature wow fadeInUp" data-wow-delay=".4s">
                    <i class="fas fa-solid fa-dice"></i>
                    <h3>Casino</h3>
                    <p>100% Provably Fair Games. A nice way to earn a lot of troncoins by playing exciting games.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <div class="single-feature wow fadeInUp" data-wow-delay=".6s">
                    <i class="fas fa-link"></i>
                    <h3>Affiliate</h3>
                    <p>Share your referral link and earn more 50% every time your referals spins and 0.4% of the their total wager.</p>
                </div>
            </div> -->
        </div>
    </div>
</section>

<section class="featured-game pt-5" style="background:#1a2c38!important">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <div class="col-12">
                    <div class="section-title">
                        <h2 class="wow fadeInUp" data-wow-delay=".4s">Payouts.</h2>
                        <p class="wow fadeInUp" data-wow-delay=".6s">The table below shows real-time payments to our users.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row p-4">
            <div class="col-12">
                <div style="width:100%;overflow-x:auto;margin-top:30px">
                    <table class="table table-striped bets_table" style="min-width:500px">
                        <thead>
                            <tr>
                                <td>Time</td>
                                <td>User name</td>
                                <td>Type Transation</td>
                                <td>Amount</td>
                                <th>Hash</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $counter = 1; ?>
                            <?php foreach($transacts as $trans): ?>
                            <tr>
                                <?php
                                    $carbonDate = \Carbon\Carbon::createFromTimestamp($trans['time']);
                                    $formattedDate = $carbonDate->diffForHumans();
                                ?>
                                <td><?= $formattedDate; ?></td>
                                <td><?= $trans['username']; ?></td>
                                <td><?= $trans['type']; ?></td>
                                <td><?= number_format($trans['amount'] / 100000000, 8); ?></td>
                                <td><?= substr_replace($trans['hash'], '***', 15, 20); ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="features section" style="background:#0f212e!important">
    <div class="funfact">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-4 col-sm-12">
                    <div class="single-fun">
                        <img src="public/assets/images/trx-stats.png" alt="player">
                        <div class="count-area">
                            <div class="count"><?= $totUser;?></div>
                        </div>
                        <p>Players</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12">
                    <div class="single-fun">
                        <img src="public/assets/images/trx-stats.png" alt="runing day">
                        <div class="count-area">
                            <div class="count">18 May 2024</div>
                        </div>
                        <p>Running Since</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12">
                    <div class="single-fun">
                        <img src="public/assets/images/trx-stats.png" alt="users">
                        <div class="count-area">
                            <div class="count"><?= number_format($totPaid / 100000000, 8); ?> TRX</div>
                        </div>
                        <p>TRX Won By Users</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="featured-game pt-5" style="background:#1a2c38!important">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <div class="col-12">
                    <div class="section-title">
                        <h2 class="wow fadeInUp" data-wow-delay=".4s">Frequently Asked Questions.</h2>
                        <p class="wow fadeInUp" data-wow-delay=".6s">Read the instructions below before you start earning.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row p-4">
            <div class="col-12">
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"><span class="title"><span class="serial">01</span>About Tronzyllo?</span><i class="fas fa-plus"></i></button></h2>
                        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample" style="">
                            <div class="accordion-body">
                                <p><a href="<?= base_url('/'); ?>" style="color:#2196f3">Tronzyllo</a> is a website that allows users to claim free troncoins to get more troncoins. This is a fun and easy way to accumulate troncoins and start building your crypto portfolio.
                                    With a user-friendly interface and a variety of games to choose from, troncoin is the perfect platform for those looking to dive into the world of cryptocurrency.
                                    Register now and start earning troncoins today!
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"><span class="title"><span class="serial">02</span>How about the affliate program?</span><i class="fas fa-plus"></i></button></h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>You will get a bonus in the same ratio every time your referral claims a free troncoin.</p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree"><span class="title"><span class="serial">03</span>What if my energy runs out?</span><i class="fas fa-plus"></i></button></h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>
                                    Each claim costs 1 energy. If your energy runs out, wait 24 hours and your energy will recover.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingFour"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour"><span class="title"><span class="serial">04</span>How do I contact the support team?</span><i class="fas fa-plus"></i></button></h2>
                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>You can contact us on telegram</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>