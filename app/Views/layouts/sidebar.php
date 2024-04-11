<!-- Sidebar Start -->
<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-secondary navbar-dark">
        <a href="<?= base_url('/'); ?>" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>DarkPan</h3>
        </a>
        <div class="navbar-nav w-100">
            <a href="<?= base_url('dashboard'); ?>" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
            <a href="<?= base_url('faucet'); ?>" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Faucet</a>
            <a href="<?= base_url('referrals'); ?>" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Referrals</a>
            <a href="<?= base_url('withdraw'); ?>" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Withdraw</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Pages</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="signin.html" class="dropdown-item">Sign In</a>
                    <a href="signup.html" class="dropdown-item">Sign Up</a>
                    <a href="404.html" class="dropdown-item">404 Error</a>
                    <a href="blank.html" class="dropdown-item">Blank Page</a>
                </div>
            </div>
        </div>
    </nav>
</div>
<!-- Sidebar End -->