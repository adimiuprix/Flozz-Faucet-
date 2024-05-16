<?= $this->extend('layouts/template') ?>
<?= $this->section('content') ?>

<div class="hero-area">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-6 col-lg-5 col-md-12 col-12">
                <div class="hero-content">
                    <h1 class="wow fadeInLeft" data-wow-delay=".4s">Claim your free troncoin</h1>
                    <p class="wow fadeInLeft" data-wow-delay=".6s">It's a fun and easy way to accumulate troncoin and start building your crypto portfolio.</p>
                    <div class="button wow fadeInLeft" data-wow-delay=".8s">
                        <a href="<?= base_url('login'); ?>" class="btn">Login</a>
                        <a href="<?= base_url('registration'); ?>" class="btn btn-alt">Sign up</a>
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
                            <div class="count">09 May 2024</div>
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
                                <p><a href="<?= base_url('/'); ?>" style="color:#2196f3">Tronzyllo</a> is a website that allows users to claim free troncoin hourly and play online games to earn even more troncoin.
                                    It's a fun and easy way to accumulate troncoin and start building your crypto portfolio. <br>With its user-friendly interface and variety of games to choose from, troncoin is the perfect platform for those looking to get into the world of cryptocurrency. <br>Sign up now and start earning troncoin today!
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"><span class="title"><span class="serial">02</span>How about the affliate program?</span><i class="fas fa-plus"></i></button></h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>You will get <b>50%</b> bonus every time your refferals claim free troncoin and <b>0.4%</b> of their total wager.</p>
                                <p>You can see your referral link at <a href="login.html" style="color:#2196f3">Referrals page</a>.</p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree"><span class="title"><span class="serial">03</span>How to earn more free spins?</span><i class="fas fa-plus"></i></button></h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>You will get 10 free spins on your first registration. In addition, users who are active in introducing and advertising the Tronzyllo website to other users or on social networks will also receive random free spins.
                                    The more effective the referral activity, the greater the chance of getting free spins reward.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingFour"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour"><span class="title"><span class="serial">04</span>Where to see my deposit and withdrawal transaction history?</span><i class="fas fa-plus"></i></button></h2>
                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>Click on your avatar icon then select Transactions.</p>
                                <p>Or visit <a href="login.html" style="color:#2196f3"> Transactions</a> page.</p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingFive"><button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive"><span class="title"><span class="serial">05</span>How do I contact the support team?</span><i class="fas fa-plus"></i></button></h2>
                        <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>You can contact us via <a href="contact.html">Contact page</a> or email <a href="cdn-cgi/l/email-protection.html" class="__cf_email__" data-cfemail="0c7f797c7c637e784c68636b696765626b226563">[email&#160;protected]</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>