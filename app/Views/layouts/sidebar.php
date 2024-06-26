<style>
img.logo-sidebar {
    height: 90px;
    width: fit-content;
}
</style>
<!-- Sidebar Start -->
<div class="sidebar pe-4 pb-3">
    <a href="<?= base_url('/'); ?>" class="navbar-brand mx-4 mb-3">
        <img class="logo-sidebar pt-5" src="<?= base_url('public/assets/images/logo.png'); ?>" alt="logo">
    </a>
    <nav class="navbar bg-secondary navbar-dark">
        <div class="navbar-nav w-100">
            <a href="<?= base_url('dashboard'); ?>" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
            <a href="<?= base_url('faucet'); ?>" class="nav-item nav-link"><i class="fa fa-balance-scale me-2"></i>Faucet</a>
            <a href="<?= base_url('referral'); ?>" class="nav-item nav-link"><i class="fa fa-users-cog me-2"></i>Referrals</a>
            <a href="<?= base_url('withdraw'); ?>" class="nav-item nav-link"><i class="fa fa-angle-double-down me-2"></i>Withdraw</a>
        </div>
    </nav>
</div>
<!-- Sidebar End -->