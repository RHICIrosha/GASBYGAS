<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LPG Sri Lanka</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css') }}" rel="stylesheet">
    <link rel="icon" href="{{ asset('img/logo.png') }}" type="image/x-icon">

    <style>
        body {
            font-family: 'Arial', sans-serif;
            overflow-x: hidden;
            margin: 0;
            padding: 0;
            background-image: url('imag/background.png');
        }

        /* Welcome Page Styles */
        .welcome-page {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100vh;
            background: linear-gradient(to right, #f7d44a, #f8a427);
            z-index: 1000;
            transition: transform 1s ease-in-out;

        }

        .welcome-content {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
        }

        .wave {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 100px;
            background: url('/api/placeholder/1360/100');
            background-size: cover;
            animation: waveAnimation 10s infinite linear;
        }

        /* Home Page Styles */
        .home-page {
            min-height: 100vh;
            opacity: 0;
            transition: opacity 1s ease-in-out;
            background-image: url('{{ asset('img/background.png') }}');

        }

        .navbar {
            background: linear-gradient(to right, #f7d44a, #f8a427);
        }

        .feature-card {
            transition: transform 0.3s ease;
            cursor: pointer;
        }

        .feature-card:hover {
            transform: translateY(-10px);
        }

        .service-icon {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            color: #f8a427;
        }

        .cta-section {
            background: linear-gradient(to right, #f7e08362, #f8a42746);
            padding: 2rem 0;
            margin-top: 2rem;
        }

        .stats-section {
            background: linear-gradient(to right, #f7d44a, #c27e18);
            padding: 5rem 0;
            color: white;
        }

        .stat-card {
            text-align: center;
            padding: 2rem;
        }

        .stat-number {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 0.4rem;
        }

        /* Animations */
        @keyframes fadeInDown {
            0% { opacity: 0; transform: translateY(-50px); }
            100% { opacity: 1; transform: translateY(0); }
        }

        @keyframes fadeInUp {
            0% { opacity: 0; transform: translateY(50px); }
            100% { opacity: 1; transform: translateY(0); }
        }

        @keyframes waveAnimation {
            0% { background-position: 0; }
            100% { background-position: 1360px; }
        }

        .animate-fade-in {
            animation: fadeInUp 1s ease-out forwards;
        }

        .page-hidden {
            transform: translateY(-100%);
        }

        .home-visible {
            opacity: 1;
        }

.modern-footer {
    position: relative;
    background: #1a1a1a;
    color: #fff;
}

.footer-main {
    position: relative;
    padding: 3rem 0 2rem;
}

.footer-top {
    margin-bottom: 3rem;
    padding-bottom: 2rem;
    border-bottom: 1px solid rgba(255,255,255,0.1);
}

.footer-logo h2 {
    margin: 0;
    color: #fff;
    font-weight: 600;
}

.footer-logo p {
    color: #999;
    margin-top: 0.5rem;
}

.emergency-contact {
    text-align: right;
}

.emergency-contact .badge {
    background: #dc3545;
    color: #fff;
    padding: 0.5rem 1rem;
    font-size: 0.9rem;
    margin-bottom: 0.5rem;
}

.emergency-phone {
    color: #fff;
    font-size: 1.8rem;
    font-weight: 600;
    margin: 0.5rem 0;
}

.footer-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 2rem;
    margin-top: 2rem;
}

.footer-card h4 {
    color: #fff;
    margin-bottom: 1.5rem;
    font-weight: 600;
    position: relative;
    padding-bottom: 0.5rem;
}

.footer-card h4::after {
    content: '';
    position: absolute;
    left: 0;
    bottom: 0;
    width: 50px;
    height: 2px;
    background: #dc3545;
}

.footer-links {
    list-style: none;
    padding: 0;
    margin: 0;
}

.footer-links li {
    margin-bottom: 0.8rem;
}

.footer-links a {
    color: #999;
    text-decoration: none;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
}

.footer-links a i {
    font-size: 0.8rem;
    margin-right: 0.5rem;
    color: #dc3545;
    transition: all 0.3s ease;
}

.footer-links a:hover {
    color: #fff;
    transform: translateX(5px);
}

.contact-items {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.contact-item {
    display: flex;
    align-items: flex-start;
    color: #999;
}

.contact-item i {
    color: #dc3545;
    margin-right: 1rem;
    margin-top: 0.3rem;
}

.newsletter-form .input-group {
    background: rgba(255,255,255,0.1);
    border-radius: 5px;
    overflow: hidden;
}

.newsletter-form .form-control {
    background: transparent;
    border: none;
    color: #fff;
    padding: 0.8rem;
}

.newsletter-form .btn {
    padding: 0.8rem 1.2rem;
}

.social-links {
    display: flex;
    gap: 1rem;
    margin-top: 1.5rem;
}

.social-link {
    width: 35px;
    height: 35px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: rgba(255,255,255,0.1);
    color: #fff;
    border-radius: 50%;
    transition: all 0.3s ease;
}

.social-link:hover {
    background: #dc3545;
    color: #fff;
    transform: translateY(-3px);
}

.footer-bottom {
    background: #111;
    padding: 1.5rem 0;
}

.footer-bottom p {
    color: #999;
}

.footer-bottom-links {
    display: flex;
    justify-content: flex-end;
    gap: 1.5rem;
}

.footer-bottom-links a {
    color: #999;
    text-decoration: none;
    transition: color 0.3s ease;
}

.footer-bottom-links a:hover {
    color: #fff;
}

@media (max-width: 768px) {
    .emergency-contact {
        text-align: left;
        margin-top: 2rem;
    }

    .footer-bottom-links {
        justify-content: flex-start;
        margin-top: 1rem;
    }
}

@media (max-width: 576px) {
    .footer-grid {
        grid-template-columns: 1fr;
    }
}
    </style>
</head>
<body>
    <!-- Welcome Page -->
    <div class="welcome-page" id="welcomePage">
        <div class="welcome-content">
            <div>
                <img src="{{ asset('img/logo.png') }}" alt="LPG Sri Lanka Logo" class="mb-4" style="width: 200px;">
                <h1 class="display-4 fw-bold mb-3">Welcome to LPG Sri Lanka</h1>
                <p class="lead mb-4">Your Trusted Partner for Clean and Safe Energy Solutions</p>
                <p class="text-white-50">Click anywhere to continue</p>
            </div>
        </div>
        <div class="wave"></div>
    </div>

    <!-- Home Page -->
    <div class="home-page" id="homePage">
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="img\logo.png" alt="Logo" width="40" height="40">
                    LPG Sri Lanka
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Services</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Track Order</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
                        <li class="nav-item"><a class="btn btn-light ms-2" href="{{ route('login') }}">Login</a></li>
                        <li class="nav-item"><a class="btn btn-outline-light ms-2" href="{{ route('register') }}">Register</a></li>
                     </ul>
                </div>
            </div>
        </nav>

          <!-- Hero Section -->
        <section class="hero-section d-flex align-items-center">
            <div class="floating-shapes">
                <div class="shape"></div>
                <div class="shape"></div>
                <div class="shape"></div>
                <div class="shape"></div>
            </div>
            <div class="container position-relative" style="z-index: 2;">
                <div class="row align-items-center">
                    <div class="col-lg-6" data-aos="fade-right"><br>
                        <h1 class="display-4 fw-bold mb-4">Smart Gas Solutions for Modern Living</h1>
                        <p class="lead mb-4">Experience seamless gas delivery with real-time tracking and instant notifications.</p>
                        <button class="btn btn-light btn-lg me-3">Order Now</button>
                        <button class="btn btn-light  btn-lg">Track Order</button>
                    </div>
                </div>
            </div>
        </section>

        <!-- Features Section -->
        <div class="container my-5">

        </div>

        <!-- CTA Section -->
        <section class="cta-section text-white text-center">
            <div class="container">
                <h2 class="text-center mb-5">Our Services</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card feature-card h-100 shadow-sm">
                        <div class="card-body text-center">
                            <i class="fas fa-truck service-icon"></i>
                            <h5 class="card-title">Island-wide Delivery</h5>
                            <p class="card-text">Fast and reliable delivery service across Sri Lanka</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card feature-card h-100 shadow-sm">
                        <div class="card-body text-center">
                            <i class="fas fa-mobile-alt service-icon"></i>
                            <h5 class="card-title">Track Orders</h5>
                            <p class="card-text">Real-time tracking and SMS notifications</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card feature-card h-100 shadow-sm">
                        <div class="card-body text-center">
                            <i class="fas fa-business-time service-icon"></i>
                            <h5 class="card-title">Business Solutions</h5>
                            <p class="card-text">Specialized services for commercial clients</p>
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <!-- Stats Section -->
        <section class="stats-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-3" data-aos="fade-up">
                        <div class="stat-card">
                            <div class="stat-number" data-count="50000">0</div>
                            <div>Happy Customers</div>
                        </div>
                    </div>
                    <div class="col-md-3" data-aos="fade-up" data-aos-delay="100">
                        <div class="stat-card">
                            <div class="stat-number" data-count="200">0</div>
                            <div>Delivery Partners</div>
                        </div>
                    </div>
                    <div class="col-md-3" data-aos="fade-up" data-aos-delay="200">
                        <div class="stat-card">
                            <div class="stat-number" data-count="25">0</div>
                            <div>Districts Covered</div>
                        </div>
                    </div>
                    <div class="col-md-3" data-aos="fade-up" data-aos-delay="300">
                        <div class="stat-card">
                            <div class="stat-number" data-count="98">0</div>
                            <div>Satisfaction Rate</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="modern-footer">
            <!-- Main Footer Content -->
            <div class="footer-main">
                <div class="container">
                    <div class="footer-top">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <div class="footer-logo">
                                    <h2>LPG Sri Lanka</h2>
                                    <p>Powering homes and businesses across Sri Lanka</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="emergency-contact text-md-end">
                                    <span class="badge">24/7 Emergency Service</span>
                                    <h3 class="emergency-phone">+94 11 234 5678</h3>
                                    {{-- <button class="btn btn-light"><i class="fas fa-headset me-2"></i>Get Support</button> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="footer-grid">
                        <div class="footer-card">
                            <h4>Quick Links</h4>
                            <ul class="footer-links">
                                <li><a href="#"><i class="fas fa-chevron-right"></i>Home</a></li>
                                <li><a href="#"><i class="fas fa-chevron-right"></i>About Us</a></li>
                                <li><a href="#"><i class="fas fa-chevron-right"></i>Services</a></li>
                                <li><a href="#"><i class="fas fa-chevron-right"></i>Track Order</a></li>
                                <li><a href="#"><i class="fas fa-chevron-right"></i>Contact</a></li>
                            </ul>
                        </div>
                        <div class="footer-card">
                            <h4>Our Services</h4>
                            <ul class="footer-links">
                                <li><a href="#"><i class="fas fa-chevron-right"></i>Residential Gas</a></li>
                                <li><a href="#"><i class="fas fa-chevron-right"></i>Commercial Supply</a></li>
                                <li><a href="#"><i class="fas fa-chevron-right"></i>Gas Installation</a></li>
                                <li><a href="#"><i class="fas fa-chevron-right"></i>Safety Inspection</a></li>
                                <li><a href="#"><i class="fas fa-chevron-right"></i>Emergency Service</a></li>
                            </ul>
                        </div>
                        <div class="footer-card">
                            <h4>Contact Info</h4>
                            <div class="contact-items">
                                <div class="contact-item">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <span>123 Gas Street, Colombo 03, Sri Lanka</span>
                                </div>
                                <div class="contact-item">
                                    <i class="fas fa-envelope"></i>
                                    <span>info@lpgsrilanka.com</span>
                                </div>
                                <div class="contact-item">
                                    <i class="fas fa-phone"></i>
                                    <span>+94 76 234 5678</span>
                                </div>
                                <div class="contact-item">
                                    <i class="fas fa-clock"></i>
                                    <span>Mon - Sat: 8:00 AM - 6:00 PM</span>
                                </div>
                            </div>
                        </div>
                        <div class="footer-card newsletter-card">
                            <h4>Stay Updated</h4>
                            <p>Subscribe to our newsletter for updates and special offers</p>
                            <form class="newsletter-form">
                                <div class="input-group">
                                    <input type="email" class="form-control" placeholder="Your email address">
                                    <button type="submit" class="btn btn-warning">
                                        <i class="fas fa-paper-plane"></i>
                                    </button>
                                </div>
                            </form>
                            <div class="social-links">
                                <a href="#" class="social-link"><i class="fab fa-facebook-f"></i></a>
                                <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
                                <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                                <a href="#" class="social-link"><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer Bottom -->
            <div class="footer-bottom">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <p class="mb-0">© 2024 LPG Sri Lanka. All rights reserved.</p>
                        </div>
                        <div class="col-md-6">
                            <div class="footer-bottom-links">
                                <a href="#">Privacy Policy</a>
                                <a href="#">Terms of Service</a>
                                <a href="#">Cookie Policy</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const welcomePage = document.getElementById('welcomePage');
            const homePage = document.getElementById('homePage');

            // Add click event to welcome page
            welcomePage.addEventListener('click', function() {
                welcomePage.classList.add('page-hidden');
                homePage.classList.add('home-visible');
            });

            // Animate features on scroll
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate-fade-in');
                    }
                });
            });

            document.querySelectorAll('.feature-card').forEach((card) => {
                observer.observe(card);
            });
        });
         // Stats counter animation
         const stats = document.querySelectorAll('.stat-number');
         stats.forEach(stat => {
             const target = parseInt(stat.getAttribute('data-count'));
             let count = 0;
             const updateCount = () => {
                 const increment = target / 200;
                 if (count < target) {
                     count += increment;
                     stat.textContent = Math.ceil(count);
                     setTimeout(updateCount, 10);
                 } else {
                     stat.textContent = target;
                 }
             };
             updateCount();
         });
    </script>
</body>
</html>
