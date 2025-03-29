<!-- collections.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Explore smartwatch collections at ChronoElite">
    <meta name="keywords" content="smartwatches, watch collections, timepieces">
    <title>ChronoElite - Collections</title>
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
            --accent-light: #e84393;
            --secondary-light: #0984e3;
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
            border: 1px solid var(--accent);
            border-radius: 50%;
            cursor: pointer;
            font-size: 1.2rem;
            color: var(--accent);
            padding: 8px;
            width: 40px;
            height: 40px;
            transition: var(--transition);
        }

        .theme-toggle:hover {
            background: var(--accent);
            color: var(--bg);
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

        /* Collections Section */
        .collections {
            padding: 120px 0 80px;
            background: linear-gradient(135deg, var(--bg), var(--card-bg));
        }

        .collections-header {
            text-align: center;
            margin-bottom: 60px;
        }

        .collections-title {
            font-size: 3rem;
            font-weight: 800;
            background: linear-gradient(45deg, var(--accent), var(--secondary));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            margin-bottom: 20px;
        }

        .collections-nav {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
        }

        .collection-btn {
            padding: 12px 25px;
            background: var(--card-bg);
            color: var(--text);
            border: 1px solid var(--accent);
            border-radius: 25px;
            text-decoration: none;
            font-weight: 600;
            transition: var(--transition);
            cursor: pointer;
        }

        .collection-btn.active,
        .collection-btn:hover {
            background: var(--accent);
            color: var(--bg);
        }

        .collections-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 40px;
            margin-top: 40px;
        }

        .collection-card {
            background: var(--card-bg);
            border-radius: 20px;
            overflow: hidden;
            transition: var(--transition);
            box-shadow: 0 5px 15px var(--shadow);
            position: relative;
        }

        .collection-card:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 30px var(--shadow);
        }

        .collection-image {
            position: relative;
        }

        .collection-image img {
            width: 100%;
            height: 400px;
            object-fit: cover;
            transition: var(--transition);
        }

        .collection-card:hover .collection-image img {
            transform: scale(1.1);
        }

        .collection-info {
            padding: 25px;
            text-align: center;
        }

        .collection-title {
            font-size: 1.6rem;
            margin-bottom: 15px;
            color: var(--accent);
            font-weight: 700;
        }

        .collection-desc {
            font-size: 1.1rem;
            color: var(--text);
            margin-bottom: 20px;
        }

        .btn {
            display: inline-block;
            padding: 12px 30px;
            background: var(--accent);
            color: var(--bg);
            text-decoration: none;
            border-radius: 25px;
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

        /* Removed global a style causing invisibility */
        /* Responsive Design */
        @media (max-width: 1024px) {
            .collections-title {
                font-size: 2.5rem;
            }

            .collections-grid {
                grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
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

            .collections-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 480px) {
            .collections-title {
                font-size: 2rem;
            }

            .collection-title {
                font-size: 1.4rem;
            }

            .collection-image img {
                height: 300px;
            }
        }
    </style>
</head>
<body>
    <?php
    $collections = [
        'men' => [ // Changed key from 'chrono' to 'men' for consistency
            'title' => 'Men\'s Collection', // Fixed typo
            'desc' => 'Precision timing meets bold design. Perfect for the modern adventurer.',
            'products' => [
                ['name' => 'Timex Q 1975', 'price' => 1999.99, 'image' => 'Assets/main.jpg', 'category' => 'men'],
                ['name' => 'Sonata Wedding Edit Quartz', 'price' => 39445.00, 'image' => 'https://www.sonatawatches.in/dw/image/v2/BKDD_PRD/on/demandware.static/-/Sites-titan-master-catalog/default/dw8e41a7ea/images/Sonata/Catalog/77146WL01_1.jpg?sw=360&sh=360', 'category' => 'men'],
                ['name' => 'Fastrack FX1 pro', 'price' => 3529.99, 'image' => 'https://www.titan.co.in/dw/image/v2/BKDD_PRD/on/demandware.static/-/Sites-titan-master-catalog/default/dw1790eb4d/images/Fastrack/Catalog/38142NM01_1.jpg?sw=360&sh=360', 'category' => 'men'],
            ]
        ],
        'women' => [
            'title' => 'Women\'s Collection', // Fixed capitalization
            'desc' => 'Built for the depths. Robust, reliable, and stylish.',
            'products' => [
                ['name' => 'Fastrack Automatic Gold Dial', 'price' => 11295.99, 'image' => 'Assets/main.jpg', 'category' => 'women'],
                ['name' => 'Fastrack Radiant FX4 Premium', 'price' => 2799.99, 'image' => 'Assets/smart2.png', 'category' => 'smartwatches'],
                ['name' => 'Fastrack Vyb Ecilipse', 'price' => 9479.99, 'image' => 'https://www.titan.co.in/dw/image/v2/BKDD_PRD/on/demandware.static/-/Sites-titan-master-catalog/default/dw5ea8bb8d/images/Fastrack/Catalog/FV60072WM01_1.jpg?sw=360&sh=360', 'category' => 'women'],
                ['name' => 'Apple Jet Black', 'price' => 22599.99, 'image' => 'https://store.storeimages.cdn-apple.com/4668/as-images.apple.com/is/MXM23ref_FV99_VW_34FR+watch-case-46-aluminum-jetblack-nc-s10_VW_34FR+watch-face-46-aluminum-jetblack-s10_VW_34FR?wid=750&hei=712&trim=1%2C0&fmt=p-jpg&qlt=95&.v=1725645481882', 'category' => 'smartwatches']
            ]
        ],
        'smartwatches' => [
            'title' => 'Smartwatches Collection', // Fixed capitalization
            'desc' => 'Timeless elegance crafted with the finest materials.',
            'products' => [
                ['name' => 'Fastrack Radiant FX4 Premium', 'price' => 2799.99, 'image' => 'Assets/main.jpg', 'category' => 'smartwatches'],
                ['name' => 'Silver Apex', 'price' => 649.99, 'image' => 'watch5.jpg', 'category' => 'smartwatches'],
                ['name' => 'Platinum Pulse', 'price' => 899.99, 'image' => 'watch7.jpg', 'category' => 'smartwatches'],
                ['name' => 'Onyx Elite', 'price' => 699.99, 'image' => 'watch10.jpg', 'category' => 'smartwatches']
            ]
        ]
    ];

    $selectedCategory = isset($_GET['category']) ? $_GET['category'] : 'all';
    $displayCollections = ($selectedCategory === 'all') ? $collections : [$selectedCategory => $collections[$selectedCategory]];
    ?>

    <header class="header">
        <div class="container">
            <div class="logo"><a href="index.php">ChronoElite</a></div>
            <div class="nav-container">
                <nav class="nav-menu">
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="shop.php">Shop</a></li>
                        <li><a href="collection.php">Collections</a></li>
                        <li><a href="about.php">About</a></li>
                        <li><a href="#">Contact</a></li>
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

    <section class="collections">
        <div class="container">
            <div class="collections-header">
                <h1 class="collections-title">Our Collections</h1>
                <div class="collections-nav">
                    <a href="?category=all" class="collection-btn <?php echo $selectedCategory === 'all' ? 'active' : ''; ?>">All</a>
                    <a href="?category=men" class="collection-btn <?php echo $selectedCategory === 'men' ? 'active' : ''; ?>">Men</a>
                    <a href="?category=women" class="collection-btn <?php echo $selectedCategory === 'women' ? 'active' : ''; ?>">Women</a>
                    <a href="?category=smartwatches" class="collection-btn <?php echo $selectedCategory === 'smartwatches' ? 'active' : ''; ?>">Smartwatches</a>
                </div>
            </div>

            <div class="collections-grid">
                <?php
                foreach ($displayCollections as $category => $collection) {
                    $image = $collection['products'][0]['image'];
                    echo "
                        <div class='collection-card'>
                            <div class='collection-image'>
                                <img src='{$image}' alt='{$collection['title']}'>
                            </div>
                            <div class='collection-info'>
                                <h3 class='collection-title'>{$collection['title']}</h3>
                                <p class='collection-desc'>{$collection['desc']}</p>
                                <a href='shop.php?category={$category}' class='btn'>Explore Collection</a>
                            </div>
                        </div>
                    ";
                }
                ?>
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