<?= $this->extend('layouts/user-template') ?>
<?= $this->section('content') ?>

<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-4">
            <div class="bg-secondary rounded d-flex align-items-center justify-content-center p-4">
                <div class="ms-3 text-center">
                    <p class="mb-2">Timer</p>
                    <h6 class="mb-0"><div id="time">00:00</div></h6>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-xl-4">
            <div class="bg-secondary rounded d-flex align-items-center justify-content-center p-4">
                <div class="ms-3 text-center">
                    <p class="mb-2">Reward</p>
                    <h6 class="mb-0"><?= $rewardRate;?> TRX</h6>
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
                <div class="authkong_captcha" data-sitekey="f01f5963c89f8263362492293fab4b24df47aa478826ae3d086d2bec7472eed0" data-theme="light"></div>
                <button type="submit" class="btn btn-secondary btn-lg claim-button"><i class="far fa-check-circle"></i> Collect your reward</button>
            </form>
        </div>
    </div>
</div>

<script>
// Timestamps
var unixTime = Math.floor(Date.now() / 1000);
var claimTime = <?= $CanClaimTime; ?>;

// Menghitung selisih waktu
var difference = claimTime - unixTime;

// Fungsi untuk mengonversi selisih waktu ke format countdown (00:00)
function formatTime(seconds) {
    var minutes = Math.floor(seconds / 60);
    var remainingSeconds = seconds % 60;
    return (minutes < 10 ? "0" : "") + minutes + ":" + (remainingSeconds < 10 ? "0" : "") + remainingSeconds;
}

var countdownElement = document.getElementById('time');

// Timer Countdown
var countdownInterval = setInterval(function() {
    if (difference <= 0) {
        clearInterval(countdownInterval);
        countdownElement.textContent = "Ready";
    } else {
        countdownElement.textContent = formatTime(difference);
        difference--;
    }
}, 1000);
</script>
<?= $this->endSection() ?>