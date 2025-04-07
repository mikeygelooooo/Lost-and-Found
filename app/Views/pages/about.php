<?= $this->extend('layouts/base') ?>

<?= $this->section('content') ?>
<section class="py-5 bg-body-tertiary">
    <div class="container text-center">
        <h1 class="display-4 fw-bold">About FindMyStuff</h1>
        <p class="lead mb-0">Learn more about our mission to reunite people with their lost belongings</p>
    </div>
</section>

<!-- Our Story -->
<section class="py-5 bg-light" id="our-story">
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

<!-- Our Mission -->
<section class="py-5 bg-body-tertiary" id="our-mission">
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

<!-- Testimonials -->
<section class="py-5 bg-light" id="testimonials">
    <div class="container">
        <h2 class="text-center fw-bold mb-5">Success Stories</h2>
        <div class="row g-4">
            <div class="col-lg-6">
                <div class="card h-100 border-0 shadow">
                    <div class="card-body p-4">
                        <div class="d-flex mb-3">
                            <i class="fas fa-quote-left text-primary fa-2x me-3 mt-1"></i>
                            <p class="mb-0">I lost my wallet during a hiking trip and thought it was gone forever. Within 3 days of posting on FindMyStuff, someone had found it and reached out. All my cards and IDs were intact!</p>
                        </div>
                        <div class="d-flex align-items-center mt-3">
                            <img src="<?= base_url('assets/images/david_williams.png') ?>" alt="User" class="img-fluid rounded-circle me-3" width="50" height="50">
                            <div>
                                <h4 class="h6 fw-bold mb-0">David Williams</h4>
                                <p class="text-muted small mb-0">Portland, OR</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card h-100 border-0 shadow">
                    <div class="card-body p-4">
                        <div class="d-flex mb-3">
                            <i class="fas fa-quote-left text-primary fa-2x me-3 mt-1"></i>
                            <p class="mb-0">I found a laptop at a coffee shop and had no idea how to find the owner. Posted it on FindMyStuff and was able to safely return it the next day. The secure messaging system made all the difference!</p>
                        </div>
                        <div class="d-flex align-items-center mt-3">
                            <img src="<?= base_url('assets/images/jessica_martinez.png') ?>" alt="User" class="img-fluid rounded-circle me-3" width="50" height="50">
                            <div>
                                <h4 class="h6 fw-bold mb-0">Jessica Martinez</h4>
                                <p class="text-muted small mb-0">Chicago, IL</p>
                            </div>
                        </div>
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