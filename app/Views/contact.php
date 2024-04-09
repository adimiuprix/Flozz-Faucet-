<?= $this->extend('layouts/template') ?>
<?= $this->section('content') ?>
<section class="contact-section py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <h2 class="mb-4">Contact Us</h2>
                <p class="lead">Have questions or suggestions? Feel free to get in touch with us!</p>
                <div class="social-links mb-4">
                    <a href="#" class="social-link"><img src="twitter-logo.png" alt="Twitter"></a>
                    <a href="#" class="social-link"><img src="facebook-logo.png" alt="Facebook"></a>
                    <a href="#" class="social-link"><img src="instagram-logo.png" alt="Instagram"></a>
                    <a href="#" class="social-link"><img src="linkedin-logo.png" alt="LinkedIn"></a>
                </div>
                <form>
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Your Name">
                    </div>
                    <div class="mb-3">
                        <input type="email" class="form-control" placeholder="Your Email">
                    </div>
                    <div class="mb-3">
                        <textarea class="form-control" rows="5" placeholder="Your Message"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg">Send Message</button>
                </form>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>