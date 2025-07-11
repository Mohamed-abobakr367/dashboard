<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E_store</title>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    </head>
<body>
    <header class="main-header">
        <div class="container">
            <h1 class="logo">E_store</h1> 
            <nav class="main-nav">
                <ul>
                    <li><a href="#products-demo">Browse Products</a></li>
                    <li><a href="{{route('login')}}" >Login</a></li>
                    <li><a href="{{route('register')}}" >Register</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        <section class="hero-section">
            <div class="container">
                <h2>Discover a World of Quality and Innovation!</h2>
                <p>Explore our exclusive collection of products that meet all your needs.</p>
                <a href="#products-demo" class="btn primary-btn">View Demo Now</a>
            </div>
        </section>

        <section id="products-demo" class="products-section">
            <div class="container">
                <h3>A Glimpse of Our Products</h3>
                <div class="product-grid">
                    <div class="product-card">
                        <img src="{{ asset('images/care3.png') }}" alt="Product 1">
                        <h4>Pure Skincare Collection</h4>
                        <p class="description">Elevate your daily routine with minimalist skincare essentials — crafted for clarity, purity, and natural glow.</p>
                        <a href="#" class="btn secondary-btn view-details-btn">View Details</a>
                    </div>
                    <div class="product-card">
                        <img src="{{ asset('images/care2.png') }}" alt="Product 2">
                        <h4>Luxury Anti-Aging Set by Estée Lauder</h4>
                        <p class="description"> Experience the power of night renewal. Hydrate, repair, and reveal youthful, radiant skin every morning.</p>
                        <a href="#" class="btn secondary-btn view-details-btn">View Details</a>
                    </div>
                    </div>
                <div class="view-more">
                    <a href="#" class="btn primary-btn">Explore All Categories</a>
                </div>
            </div>
        </section>

        <section class="about-us-section">
            <div class="container">
                <h3>Why YourStore Is Your Best Choice?</h3>
                <div class="features-grid">
                    <div class="feature-item">
                        <i class="icon">🛒</i>
                        <h4>Wide Selection</h4>
                        <p>We offer thousands of diverse products to suit all tastes.</p>
                    </div>
                    <div class="feature-item">
                        <i class="icon">✨</i>
                        <h4>Unmatched Quality</h4>
                        <p>We carefully select the finest materials and products.</p>
                    </div>
                    <div class="feature-item">
                        <i class="icon">🚀</i>
                        <h4>Fast & Reliable Shipping</h4>
                        <p>Receive your orders as quickly and safely as possible.</p>
                    </div>
                </div>
            </div>
        </section>

        <section id="auth-forms" class="auth-forms-overlay">
            <div class="auth-container">
                <button class="close-btn">&times;</button>

                <div id="loginForm" class="auth-form active">
                    <h3>Login</h3>
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="loginEmail">Email Address:</label>
                            <input type="email" id="loginEmail" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="loginPassword">Password:</label>
                            <input type="password" id="loginPassword" name="password" required>
                        </div>
                        <button type="submit" class="btn primary-btn">Login</button>
                        <p class="switch-form">Don't have an account? <a href="#" id="switchToRegister">Register Now</a></p>
                    </form>
                </div>

                <div id="registerForm" class="auth-form">
                    <h3>Register</h3>
                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="registerName">Full Name:</label>
                            <input type="text" id="registerName" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="registerEmail">Email Address:</label>
                            <input type="email" id="registerEmail" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="registerPassword">Password:</label>
                            <input type="password" id="registerPassword" name="password" required>
                        </div>
                        <div class="form-group">
                            <label for="confirmPassword">Confirm Password:</label>
                            <input type="password" id="confirmPassword" name="password_confirmation" required>
                        </div>
                        <button type="submit" class="btn primary-btn">Create Account</button>
                        <p class="switch-form">Already have an account? <a href="#" id="switchToLogin">Login</a></p>
                    </form>
                </div>
            </div>
        </section>
    </main>

    <footer class="main-footer">
        <div class="container">
            <p>&copy; 2025 YourStore. All rights reserved.</p>
        </div>
    </footer>

    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>