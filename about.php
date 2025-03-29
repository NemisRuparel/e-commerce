<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Learn about ChronoElite - Crafting timeless luxury watches since 1985">
    <meta name="keywords" content="about ChronoElite, luxury watches, timepieces">
    <title>ChronoElite - About Us</title>
    <style>
        <?php
        session_start();
        $theme = isset($_SESSION['theme']) ? $_SESSION['theme'] : 'dark';
        ?>
        :root {
            --bg-dark: #1a1a1a;
            --text-dark: #ffffff;
            --accent-dark: #ff6b6b;
            --secondary-dark: #4ecdc4;
            --card-dark: #2d2d2d;
            --shadow-dark: rgba(0,0,0,0.3);
            --bg-light: #fefefe;
            --text-light: #2d3436;
            --accent-light: #e84393;
            --secondary-light: #0984e3;
            --card-light: #ffffff;
            --shadow-light: rgba(0,0,0,0.15);
            --bg: var(--bg-<?php echo $theme; ?>);
            --text: var(--text-<?php echo $theme; ?>);
            --accent: var(--accent-<?php echo $theme; ?>);
            --secondary: var(--secondary-<?php echo $theme; ?>);
            --card-bg: var(--card-<?php echo $theme; ?>);
            --shadow: var(--shadow-<?php echo $theme; ?>);
            --transition: all 0.3s ease;
        }
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', Arial, sans-serif;
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
        .about {
            padding: 120px 0 80px;
            background: linear-gradient(135deg, var(--bg), var(--card-bg));
        }
        .section-title {
            text-align: center;
            font-size: 3rem;
            font-weight: 800;
            background: linear-gradient(45deg, var(--accent), var(--secondary));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            margin-bottom: 40px;
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
        .about-content {
            max-width: 800px;
            margin: 0 auto 60px;
            text-align: center;
        }
        .about-content p {
            font-size: 1.2rem;
            margin-bottom: 20px;
        }
        .mission {
            padding: 60px 0;
            background: var(--card-bg);
        }
        .mission-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 40px;
            margin-top: 40px;
        }
        .mission-item {
            text-align: center;
            padding: 30px;
            background: var(--bg);
            border-radius: 15px;
            transition: var(--transition);
            box-shadow: 0 5px 15px var(--shadow);
        }
        .mission-item:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 30px var(--shadow);
        }
        .mission-item h3 {
            font-size: 1.6rem;
            color: var(--accent);
            margin-bottom: 15px;
            font-weight: 700;
        }
        .mission-item p {
            font-size: 1.1rem;
        }
        .team {
            padding: 80px 0;
        }
        .team-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            margin-top: 40px;
        }
        .team-card {
            background: var(--card-bg);
            border-radius: 20px;
            overflow: hidden;
            transition: var(--transition);
            box-shadow: 0 5px 15px var(--shadow);
            text-align: center;
        }
        .team-card:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 30px var(--shadow);
        }
        .team-image img {
            width: 100%;
            height: 300px;
            object-fit: cover;
            transition: var(--transition);
        }
        .team-card:hover .team-image img {
            transform: scale(1.1);
        }
        .team-info {
            padding: 20px;
        }
        .team-name {
            font-size: 1.4rem;
            color: var(--accent);
            font-weight: 600;
            margin-bottom: 10px;
        }
        .team-role {
            font-size: 1.1rem;
            color: var(--text);
        }
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
        a {
            text-decoration: none;
            color: var(--text);
        }
        @media (max-width: 1024px) {
            .section-title {
                font-size: 2.5rem;
            }
            .mission-grid {
                grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
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
            .team-grid {
                grid-template-columns: 1fr;
            }
        }
        @media (max-width: 480px) {
            .section-title {
                font-size: 2rem;
            }
            .about-content p {
                font-size: 1rem;
            }
            .mission-item h3 {
                font-size: 1.4rem;
            }
            .team-image img {
                height: 250px;
            }
        }
    </style>
</head>
<body>
    <header class="header">
        <div class="container">
            <div class="logo"><a href="index.php">ChronoElite</a></div>
            <div class="nav-container">
                <nav class="nav-menu">
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="shop.php">Shop</a></li>
                        <li><a href="collection.php">Collections</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </nav>
                <button class="menu-toggle">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                <form method="POST" style="display: inline;">
                    <button type="submit" name="toggle_theme" class="theme-toggle"><?php echo $theme === 'dark' ? '☀️' : '🌙'; ?></button>
                </form>
            </div>
        </div>
    </header>

    <section class="about">
        <div class="container">
            <h1 class="section-title">Our Story</h1>
            <div class="about-content">
                <p>Founded in 1985, ChronoElite began with a simple vision: to craft timepieces that blend precision engineering with timeless elegance. Over the decades, we've grown from a small workshop to a globally recognized brand, celebrated for our dedication to quality and innovation.</p>
                <p>Every watch we create tells a story—of craftsmanship, passion, and a relentless pursuit of perfection. At ChronoElite, we believe that a watch is more than a tool; it’s a legacy, a companion through life’s moments, big and small.</p>
            </div>
        </div>
    </section>

    <section class="mission">
        <div class="container">
            <h2 class="section-title">Our Mission</h2>
            <div class="mission-grid">
                <div class="mission-item">
                    <h3>Innovate</h3>
                    <p>Pushing the boundaries of watchmaking with cutting-edge technology and design.</p>
                </div>
                <div class="mission-item">
                    <h3>Craft</h3>
                    <p>Delivering unparalleled quality through meticulous attention to detail.</p>
                </div>
                <div class="mission-item">
                    <h3>Inspire</h3>
                    <p>Creating timepieces that reflect individuality and timeless style.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- <section class="team">
        <div class="container">
            <h2 class="section-title">Meet the Team</h2>
            <div class="team-grid">
                <div class="team-card">
                    <div class="team-info">
                        <h3 class="team-name">Nemis Ruparel</h3>
                        <p class="team-role">Frontend Developer</p>
                    </div>
                </div>
                <div class="team-card">                    
                    <div class="team-info">
                        <h3 class="team-name">Mit Parmar</h3>
                        <p class="team-role">Web Developer & Designer</p>
                    </div>
                </div>
                <div class="team-card">
                    <div class="team-info">
                        <h3 class="team-name">Jaydev Parmar</h3>
                        <p class="team-role">Web Developer</p>
                    </div>
                </div>
            </div>
        </div> -->
    </section>

    <footer class="footer">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-section">
                    <h3>About ChronoElite</h3>
                    <p>Crafting timeless smartwatches since 1985. Precision meets elegance.</p>
                </div>
                <div class="footer-section">
                    <h3>Navigation</h3>
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="shop.php">Shop</a></li>
                        <li><a href="collection.php">Collections</a></li>
                        <li><a href="about.php">About</a></li>
                        <li><a href="#">Support</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h3>Contact</h3>
                    <ul>
                        <li>Email: info@chronoelite.com</li>
                        <li>Phone: +1 (555) 789-1234</li>
                        <li>123 Elite St, Time City</li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <p>© <?php echo date('Y'); ?> ChronoElite. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['toggle_theme'])) {
        $_SESSION['theme'] = $theme === 'dark' ? 'light' : 'dark';
        exit;
    }
    ?>

    <script>
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