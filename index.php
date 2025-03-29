<!-- index.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Timeless luxury watches at ChronoElite">
    <meta name="keywords" content="luxury watches, timepieces, watch store">
    <title>ChronoElite - Timeless Luxury</title>
    <style>
        :root {
            /* Dark Theme */
            --bg-dark: #1a1a1a;
            --text-dark: #ffffff;
            --accent-dark: #ff6b6b;
            --secondary-dark: #4ecdc4;
            --card-dark: #2d2d2d;
            --shadow-dark: rgba(0,0,0,0.3);

            /* Enhanced Light Theme */
            --bg-light: #fefefe;
            --text-light: #2d3436;
            --accent-light: #e84393; /* Vibrant pink */
            --secondary-light: #0984e3; /* Bright blue */
            --card-light: #ffffff;
            --shadow-light: rgba(0,0,0,0.15);

            /* Current Theme Variables */
            --bg: var(--bg-dark);
            --text: var(--text-dark);
            --accent: var(--accent-dark);
            --secondary: var(--secondary-dark);
            --card-bg: var(--card-dark);
            --shadow: var(--shadow-dark);
            --transition: all 0.3s ease;
        }

        body.light-theme {
            --bg: var(--bg-light);
            --text: var(--text-light);
            --accent: var(--accent-light);
            --secondary: var(--secondary-light);
            --card-bg: var(--card-light);
            --shadow: var(--shadow-light);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', Arial, sans-serif;
        }
        a{
            text-decoration: none;
            color: transparent;
        }
        body {
            background: var(--bg);
            color: var(--text);
            transition: var(--transition);
            line-height: 1.6;
        }

        .container {
            max-width: 1300px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Header */
        .header {
            background: var(--bg);
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            padding: 20px 0;
            border-bottom: 1px solid rgba(0,0,0,0.1);
            box-shadow: 0 2px 10px var(--shadow);
        }

        .header .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 2rem;
            font-weight: 700;
            background: linear-gradient(45deg, var(--accent), var(--secondary));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            cursor: pointer;
        }

        .nav-container {
            display: flex;
            align-items: center;
            gap: 30px;
        }

        .nav-menu ul {
            display: flex;
            list-style: none;
        }

        .nav-menu li {
            margin-left: 35px;
        }

        .nav-menu a {
            color: var(--text);
            text-decoration: none;
            font-weight: 500;
            transition: var(--transition);
            position: relative;
        }

        .nav-menu a::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -5px;
            left: 0;
            background: var(--accent);
            transition: var(--transition);
        }

        .nav-menu a:hover::after {
            width: 100%;
        }

        .nav-menu a:hover {
            color: var(--accent);
        }

        .theme-toggle {
            background: var(--card-bg);
            /* border: 1px solid var(--bg); */
            border-radius: 50%;
            cursor: pointer;
            font-size: 1.2rem;
            color: var(--accent);
            width: 40px;
            height: 40px;
            transition: var(--transition);
            /* margin-top: 10px; */
        }

        .theme-toggle:hover {
            background: var(--accent);
            color: var(--bg-dark);
        }

        .menu-toggle {
            display: none;
            flex-direction: column;
            gap: 5px;
            cursor: pointer;
            background: none;
            border: none;
        }

        .menu-toggle span {
            width: 30px;
            height: 3px;
            background: var(--accent);
            transition: var(--transition);
        }

        .menu-toggle.active span:nth-child(1) {
            transform: rotate(45deg) translate(5px, 5px);
        }

        .menu-toggle.active span:nth-child(2) {
            opacity: 0;
        }

        .menu-toggle.active span:nth-child(3) {
            transform: rotate(-45deg) translate(7px, -7px);
        }

        /* Hero */
        .hero {
            min-height: 100vh;
            background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), 
                        url('Assets/main.jpg') center/cover no-repeat;
            display: flex;
            align-items: center;
            margin-top: 80px;
            position: relative;
        }

        .hero-content {
            text-align: center;
            padding: 0 20px;
            animation: fadeIn 1s ease;
        }

        .hero-content h1 {
            font-size: 4rem;
            font-weight: 800;
            margin-bottom: 20px;
            background: linear-gradient(45deg, var(--accent), var(--secondary));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .hero-content p {
            font-size: 1.4rem;
            max-width: 600px;
            margin: 0 auto 30px;
            color: var(--text);
        }

        .btn {
            display: inline-block;
            padding: 15px 35px;
            background: var(--accent);
            color: var(--bg);
            text-decoration: none;
            border-radius: 5px;
            font-weight: 600;
            transition: var(--transition);
            position: relative;
            overflow: hidden;
        }

        .btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: var(--secondary);
            transition: var(--transition);
            z-index: -1;
        }

        .btn:hover::before {
            left: 0;
        }

        .btn:hover {
            box-shadow: 0 5px 15px var(--shadow);
        }

        /* Featured Products */
        .featured {
            padding: 80px 0;
        }

        .section-title {
            text-align: center;
            font-size: 2.5rem;
            margin-bottom: 50px;
            color: var(--secondary);
            font-weight: 700;
            position: relative;
        }

        .section-title::after {
            content: '';
            width: 60px;
            height: 3px;
            background: var(--accent);
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
        }

        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 30px;
        }

        .product-card {
            background: var(--card-bg);
            border-radius: 15px;
            overflow: hidden;
            transition: var(--transition);
            box-shadow: 0 5px 15px var(--shadow);
        }

        .product-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 25px var(--shadow);
        }

        .product-image img {
            width: 100%;
            height: 300px;
            object-fit: cover;
            transition: var(--transition);
        }

        .product-card:hover .product-image img {
            transform: scale(1.05);
        }

        .product-info {
            padding: 20px;
            text-align: center;
        }

        .product-title {
            font-size: 1.3rem;
            margin-bottom: 10px;
            color: var(--accent);
            font-weight: 600;
        }

        .product-price {
            font-size: 1.2rem;
            color: var(--text);
            font-weight: 500;
        }

        /* Features Section */
        .features {
            padding: 60px 0;
            background: linear-gradient(135deg, var(--bg), var(--card-bg));
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            margin-top: 40px;
        }

        .feature-item {
            text-align: center;
            padding: 20px;
            background: var(--card-bg);
            border-radius: 10px;
            transition: var(--transition);
        }

        .feature-item:hover {
            transform: scale(1.05);
            box-shadow: 0 5px 15px var(--shadow);
        }

        .feature-item i {
            font-size: 2rem;
            color: var(--accent);
            margin-bottom: 15px;
        }

        .feature-item h3 {
            color: var(--secondary);
            margin-bottom: 10px;
        }

        /* Footer */
        .footer {
            background: var(--card-bg);
            padding: 60px 0 20px;
            color: var(--text);
        }

        .footer-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 30px;
            margin-bottom: 40px;
        }

        .footer-section h3 {
            color: var(--accent);
            margin-bottom: 20px;
            font-weight: 600;
        }

        .footer-section ul {
            list-style: none;
        }

        .footer-section li {
            margin-bottom: 10px;
        }

        .footer-section a {
            color: var(--text);
            text-decoration: none;
            transition: var(--transition);
        }

        .footer-section a:hover {
            color: var(--accent);
        }

        .footer-bottom {
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid rgba(0,0,0,0.1);
        }

        /* Animations */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            .hero-content h1 {
                font-size: 3rem;
            }
        }

        @media (max-width: 768px) {
            .menu-toggle {
                display: flex;
            }

            .nav-menu {
                position: fixed;
                top: 80px;
                left: -100%;
                width: 100%;
                height: calc(100vh - 80px);
                background: var(--bg);
                padding: 40px;
                transition: var(--transition);
                box-shadow: 0 5px 15px var(--shadow);
            }

            .nav-menu.active {
                left: 0;
            }

            .nav-menu ul {
                flex-direction: column;
                gap: 25px;
                align-items: center;
            }

            .nav-menu li {
                margin: 0;
            }
        }

        @media (max-width: 480px) {
            .hero-content h1 {
                font-size: 2rem;
            }

            .section-title {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    <header class="header">
        <div class="container">
            <div class="logo"><a href="home.php">ChronoElite</a></div>
            <div class="nav-container">
                <nav class="nav-menu">
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="shop.php">Shop</a></li>
                        <li><a href="collection.php">Collections</a></li>
                        <li><a href="about.php">About</a></li>
                        <li><a href="contact.php">Contact</a></li>
                    </ul>
                </nav>
                <button class="menu-toggle">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                <button class="theme-toggle" aria-label="Toggle theme">☀️</button>
            </div>
        </div>
    </header>

    <section class="hero">
        <div class="hero-content">
            <h1>Elevate Your Time</h1>
            <p>Experience luxury redefined with our exclusive watch collections</p>
            <a href="shop.php" class="btn">Discover Now</a>
        </div>
    </section>

    <section class="featured">
        <div class="container">
            <h2 class="section-title">Trending</h2>
            <div class="products-grid">
                <?php
                $products = [
                    ['name' => 'Tommy Hilfiger', 'price' => 15999.99, 'image' => 'Assets/tommy.png'],
                    ['name' => 'Sonata Unveil Quartz', 'price' => 3449.99, 'image' => 'Assets/sonata.png'],
                    ['name' => 'Rolex Day-Date,36 ', 'price' => 8943.99, 'image' => 'Assets/rolex.avif'],
                    ['name' => 'boAt Wave Convex', 'price' => 1899.99, 'image' => 'Assets/smart1.webp']
                ];

                foreach ($products as $product) {
                    echo "
                        <div class='product-card'>
                            <div class='product-image'>
                                <img src='{$product['image']}' alt='{$product['name']}'>
                            </div>
                            <div class='product-info'>
                                <h3 class='product-title'>{$product['name']}</h3>
                                <p class='product-price'>₹" . $product['price'] . "</p>
                                <a href='#' class='btn'>Add to Cart</a>
                            </div>
                        </div>
                    ";
                }
                ?>
            </div>
        </div>
    </section>

    <section class="features">
        <div class="container">
            <h2 class="section-title">Why ChronoElite</h2>
            <div class="features-grid">
                <div class="feature-item">
                    <i class="fas fa-shipping-fast"></i>
                    <h3>Free Shipping</h3>
                    <p>Worldwide delivery included</p>
                </div>
                <div class="feature-item">
                    <i class="fas fa-shield-alt"></i>
                    <h3>2-Year Warranty</h3>
                    <p>Unmatched quality assurance</p>
                </div>
                <div class="feature-item">
                    <i class="fas fa-gift"></i>
                    <h3>Luxury Packaging</h3>
                    <p>Elegant unboxing experience</p>
                </div>
            </div>
        </div>
    </section>

    <footer class="footer">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-section">
                    <h3>About ChronoElite</h3>
                    <p>Where Precision meets elegance.</p>
                </div>
                <div class="footer-section">
                    <h3>Navigation</h3>
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="shop.php">Shop</a></li>
                        <li><a href="collection.php">Collections</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Support</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h3>Contact</h3>
                    <ul>
                        <li>Email: info@chronoelite.com</li>
                        <li>Phone: +91 1234567890</li>
                        <li>GP Porbandar</li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <p>© <?php echo date('Y'); ?> ChronoElite. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        // Theme Toggle
        const themeToggle = document.querySelector('.theme-toggle');
        const body = document.body;

        themeToggle.addEventListener('click', () => {
            body.classList.toggle('light-theme');
            themeToggle.textContent = body.classList.contains('light-theme') ? '🌙' : '☀️';
            localStorage.setItem('theme', body.classList.contains('light-theme') ? 'light' : 'dark');
        });

        // Load saved theme
        const savedTheme = localStorage.getItem('theme');
        if (savedTheme === 'light') {
            body.classList.add('light-theme');
            themeToggle.textContent = '🌙';
        } else {
            themeToggle.textContent = '☀️';
        }

        // Menu Toggle
        const menuToggle = document.querySelector('.menu-toggle');
        const navMenu = document.querySelector('.nav-menu');

        menuToggle.addEventListener('click', () => {
            menuToggle.classList.toggle('active');
            navMenu.classList.toggle('active');
        });

        navMenu.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => {
                menuToggle.classList.remove('active');
                navMenu.classList.remove('active');
            });
        });
    </script>
</body>
</html>