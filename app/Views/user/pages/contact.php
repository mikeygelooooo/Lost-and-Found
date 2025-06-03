<?= $this->extend('user/base') ?>

<?= $this->section('content') ?>
<!-- Hero Section -->
<section class="py-5 bg-body-tertiary">
    <div class="container text-center">
        <h1 class="display-4 fw-bold">Contact FindMyStuff</h1>
        <p class="lead mb-0">Get in touch with our support team for help with lost or found items</p>
    </div>
</section>

<!-- Contact Information -->
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center fw-bold mb-5">Get in Touch</h2>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow">
                    <div class="card-body text-center p-4">
                        <div class="rounded-circle bg-primary bg-opacity-25 p-3 d-inline-block mb-3">
                            <i class="fas fa-envelope text-primary fa-2x"></i>
                        </div>
                        <h3 class="h4 fw-bold">Email Support</h3>
                        <p class="mb-3">Get help with your lost or found items via email.</p>
                        <a href="mailto:support@findmystuff.com" class="btn btn-primary">support@findmystuff.com</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow">
                    <div class="card-body text-center p-4">
                        <div class="rounded-circle bg-info bg-opacity-25 p-3 d-inline-block mb-3">
                            <i class="fas fa-clock text-info fa-2x"></i>
                        </div>
                        <h3 class="h4 fw-bold">Support Hours</h3>
                        <p class="mb-0">Monday - Friday: 9:00 AM - 6:00 PM<br>
                            Saturday: 10:00 AM - 4:00 PM<br>
                            Sunday: Closed</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow">
                    <div class="card-body text-center p-4">
                        <div class="rounded-circle bg-success bg-opacity-25 p-3 d-inline-block mb-3">
                            <i class="fas fa-phone text-success fa-2x"></i>
                        </div>
                        <h3 class="h4 fw-bold">Phone Support</h3>
                        <p class="mb-3">Speak directly with our support team by phone.</p>
                        <a href="tel:+1234567890" class="btn btn-success">+1 (234) 567-8900</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Form Section -->
<section class="py-5 bg-body-tertiary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h2 class="fw-bold mb-4 text-center">Send us a Message</h2>
                <div class="card border-0 shadow">
                    <div class="card-body p-4">
                        <form>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="firstName" class="form-label">First Name</label>
                                    <input type="text" class="form-control form-control-lg" id="firstName" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="lastName" class="form-label">Last Name</label>
                                    <input type="text" class="form-control form-control-lg" id="lastName" required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" class="form-control form-control-lg" id="email" required>
                            </div>

                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone Number (Optional)</label>
                                <input type="tel" class="form-control form-control-lg" id="phone">
                            </div>

                            <div class="mb-3">
                                <label for="subject" class="form-label">Subject</label>
                                <select class="form-select form-select-lg" id="subject" required>
                                    <option value="">Choose a topic...</option>
                                    <option value="lost-item">I Lost Something</option>
                                    <option value="found-item">I Found Something</option>
                                    <option value="technical-support">Technical Support</option>
                                    <option value="account-help">Account Help</option>
                                    <option value="feedback">Feedback or Suggestions</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>

                            <div class="mb-4">
                                <label for="message" class="form-label">Message</label>
                                <textarea class="form-control" id="message" rows="5" placeholder="Please provide details about your inquiry..." required></textarea>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    <i class="fas fa-paper-plane me-2"></i>
                                    Send Message
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Social Media Links -->
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center fw-bold mb-5">Follow Our Socials</h2>
        <div class="row g-4">
            <div class="col-lg-2 col-md-4 col-sm-6">
                <div class="card h-100 border-0 shadow">
                    <div class="card-body text-center p-4">
                        <div class="rounded-circle bg-primary bg-opacity-25 p-3 d-inline-block mb-3">
                            <i class="fab fa-facebook-f text-primary fa-2x"></i>
                        </div>
                        <h3 class="h6 fw-bold">Facebook</h3>
                        <a href="#" class="btn btn-primary btn-sm">Follow</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6">
                <div class="card h-100 border-0 shadow">
                    <div class="card-body text-center p-4">
                        <div class="rounded-circle bg-info bg-opacity-25 p-3 d-inline-block mb-3">
                            <i class="fab fa-twitter text-info fa-2x"></i>
                        </div>
                        <h3 class="h6 fw-bold">Twitter</h3>
                        <a href="#" class="btn btn-info text-white btn-sm">Follow</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6">
                <div class="card h-100 border-0 shadow">
                    <div class="card-body text-center p-4">
                        <div class="rounded-circle bg-danger bg-opacity-25 p-3 d-inline-block mb-3">
                            <i class="fab fa-instagram text-danger fa-2x"></i>
                        </div>
                        <h3 class="h6 fw-bold">Instagram</h3>
                        <a href="#" class="btn btn-danger btn-sm">Follow</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6">
                <div class="card h-100 border-0 shadow">
                    <div class="card-body text-center p-4">
                        <div class="rounded-circle bg-primary bg-opacity-25 p-3 d-inline-block mb-3">
                            <i class="fab fa-linkedin-in text-primary fa-2x"></i>
                        </div>
                        <h3 class="h6 fw-bold">LinkedIn</h3>
                        <a href="#" class="btn btn-primary btn-sm">Connect</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6">
                <div class="card h-100 border-0 shadow">
                    <div class="card-body text-center p-4">
                        <div class="rounded-circle bg-dark bg-opacity-25 p-3 d-inline-block mb-3">
                            <i class="fab fa-tiktok text-dark fa-2x"></i>
                        </div>
                        <h3 class="h6 fw-bold">TikTok</h3>
                        <a href="#" class="btn btn-dark btn-sm">Follow</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-6">
                <div class="card h-100 border-0 shadow">
                    <div class="card-body text-center p-4">
                        <div class="rounded-circle bg-success bg-opacity-25 p-3 d-inline-block mb-3">
                            <i class="fab fa-whatsapp text-success fa-2x"></i>
                        </div>
                        <h3 class="h6 fw-bold">WhatsApp</h3>
                        <a href="#" class="btn btn-success btn-sm">Chat</a>
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
                <a href="<?= base_url('signup') ?>" class="btn btn-primary btn-lg px-5 py-3 fw-bold">Get Started - It's Free!</a>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>