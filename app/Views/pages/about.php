<?= $this->extend('layouts/base') ?>

<?= $this->section('content') ?>
<section class="py-5 bg-body-tertiary">
    <div class="container text-center">
        <h1 class="display-4 fw-bold">About FindMyStuff</h1>
        <p class="lead mb-0">Learn more about our mission to reunite people with their lost belongings</p>
    </div>
</section>


<!-- Our Mission -->
<section class="py-5 bg-light" id="our-mission">
    <div class="container">
        <h2 class="text-center fw-bold mb-5">Our Mission</h2>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow">
                    <div class="card-body text-center p-4">
                        <div class="rounded-circle bg-primary bg-opacity-25 p-3 d-inline-block mb-3">
                            <i class="fas fa-handshake text-primary fa-2x"></i>
                        </div>
                        <h3 class="h4 fw-bold">Build Community</h3>
                        <p class="mb-0">Creating a trusted network of helpful individuals committed to looking out for each other.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow">
                    <div class="card-body text-center p-4">
                        <div class="rounded-circle bg-success bg-opacity-25 p-3 d-inline-block mb-3">
                            <i class="fas fa-shield-alt text-success fa-2x"></i>
                        </div>
                        <h3 class="h4 fw-bold">Ensure Safety</h3>
                        <p class="mb-0">Providing secure ways for people to connect and arrange safe item returns.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow">
                    <div class="card-body text-center p-4">
                        <div class="rounded-circle bg-info bg-opacity-25 p-3 d-inline-block mb-3">
                            <i class="fas fa-search-location text-info fa-2x"></i>
                        </div>
                        <h3 class="h4 fw-bold">Simplify Recovery</h3>
                        <p class="mb-0">Making the process of finding and reporting lost items intuitive and stress-free.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Our Story -->
<section class="py-5 bg-body-tertiary" id="our-story">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <img src="<?= base_url('assets/images/about_hero.jpg') ?>" alt="Our Story" class="img-fluid rounded shadow">
            </div>
            <div class="col-lg-6">
                <h2 class="fw-bold mb-4 text-center">Our Story</h2>
                <p class="mb-4">
                    FindMyStuff was founded in 2024 with a simple mission: to help people recover their lost items and return found ones to their rightful owners. What started as a small community initiative has grown into a trusted platform connecting thousands of people nationwide.
                </p>
                <p>
                    We understand how stressful and disruptive losing important possessions can be. That's why we've created a secure, user-friendly platform where people can report lost items and good Samaritans can help reunite them with their owners.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Useful Links -->
<section class="py-5 bg-light" id="about-links">
    <div class="container">
        <h2 class="text-center fw-bold mb-5">Useful Links</h2>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow">
                    <div class="card-body text-center p-4">
                        <div class="rounded-circle bg-secondary bg-opacity-25 p-3 d-inline-block mb-3">
                            <i class="fas fa-envelope text-secondary fa-2x"></i>
                        </div>
                        <h3 class="h4 fw-bold">Contact Us</h3>
                        <p class="mb-3">Have questions or need help? We're here to assist you.</p>
                        <a href="#" class="btn btn-secondary">Get in Touch</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow">
                    <div class="card-body text-center p-4">
                        <div class="rounded-circle bg-warning bg-opacity-25 p-3 d-inline-block mb-3">
                            <i class="fas fa-user-secret text-warning fa-2x"></i>
                        </div>
                        <h3 class="h4 fw-bold">Privacy Policy</h3>
                        <p class="mb-3">Understand how we collect, use, and protect your personal data.</p>
                        <a href="<?= base_url('about/privacy-policy') ?>" class="btn btn-warning">Read Policy</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow">
                    <div class="card-body text-center p-4">
                        <div class="rounded-circle bg-danger bg-opacity-25 p-3 d-inline-block mb-3">
                            <i class="fas fa-file-contract text-danger fa-2x"></i>
                        </div>
                        <h3 class="h4 fw-bold">Terms of Service</h3>
                        <p class="mb-3">Learn about the rules and conditions for using our platform.</p>
                        <a href="<?= base_url('about/terms-of-service') ?>" class="btn btn-danger">View Terms</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="bg-body-tertiary text-center py-5" id="get-started">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h2 class="display-6 mb-3 fw-bold">Join Our Community Today</h2>
                <p class="lead mb-4">Help us create a world where lost items find their way back home</p>
                <button class="btn btn-primary btn-lg px-5 py-3 fw-bold">Get Started - It's Free!</button>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>