<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="View your cart at ChronoElite">
    <meta name="keywords" content="cart, ChronoElite, watches">
    <title>ChronoElite - Cart</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700;800&display=swap" rel="stylesheet">
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
        .cart {
            padding: 120px 0 80px;
            background: linear-gradient(135deg, var(--bg), var(--card-bg));
        }
        .cart-header {
            text-align: center;
            margin-bottom: 40px;
        }
        .cart-title {
            font-size: 3rem;
            font-weight: 800;
            background: linear-gradient(45deg, var(--accent), var(--secondary));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }
        .cart-table {
            width: 100%;
            border-collapse: collapse;
            background: var(--card-bg);
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 15px var(--shadow);
        }
        .cart-table th, .cart-table td {
            padding: 20px;
            text-align: center;
            border-bottom: 1px solid rgba(0,0,0,0.1);
        }
        .cart-table th {
            background: var(--accent);
            color: var(--bg);
            font-weight: 600;
        }
        .cart-table img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 10px;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
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
        .btn-remove {
            background: #e74c3c;
        }
        .btn-remove:hover {
            background: #c0392b;
        }
        .total {
            text-align: right;
            margin-top: 20px;
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--accent);
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
            .cart-table {
                display: block;
                overflow-x: auto;
            }
        }
        @media (max-width: 480px) {
            .cart-title {
                font-size: 2rem;
            }
            .cart-table th, .cart-table td {
                padding: 10px;
            }
            .cart-table img {
                width: 60px;
                height: 60px;
            }
        }
    </style>
</head>
<body>
    <?php
    $conn = mysqli_connect("localhost", "root", "", "chronoelite");
    if (!$conn) {
        die("Connection failed: " . mysqli_error($conn));
    }
    mysqli_select_db($conn, "chronoelite");

    if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
        header("Location: login.php");
        exit;
    }

    // Handle Remove from Cart
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['remove_from_cart'])) {
        $cart_id = $_POST['cart_id'];
        $query = "DELETE FROM cart WHERE id='$cart_id'";
        mysqli_query($conn, $query);
    }

    // Fetch Cart Items
    $user_id = $_SESSION['user_id'];
    $query = "SELECT c.id AS cart_id, p.name, p.price, p.image, c.quantity 
              FROM cart c 
              JOIN products p ON c.product_id = p.id 
              WHERE c.user_id='$user_id'";
    $result = mysqli_query($conn, $query);
    $total = 0;
    ?>

    <header class="header">
        <div class="container">
            <div class="logo"><a href="index.php">ChronoElite</a></div>
            <div class="nav-container">
                <nav class="nav-menu">
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="shop.php">Shop</a></li>
                        <li><a href="collections.php">Collections</a></li>
                        <li><a href="about.php">About</a></li>
                        <li><a href="contact.php">Contact</a></li>
                        <li><a href="cart.php">Cart</a></li>
                        <li><a href="logout.php">Logout</a></li>
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

    <section class="cart">
        <div class="container">
            <div class="cart-header">
                <h1 class="cart-title">Your Cart</h1>
            </div>
            <?php if (mysqli_num_rows($result) > 0): ?>
                <table class="cart-table">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($item = mysqli_fetch_array($result)): ?>
                            <?php
                            $item_total = $item['price'] * $item['quantity'];
                            $total += $item_total;
                            ?>
                            <tr>
                                <td><img src="<?php echo $item['image']; ?>" alt="<?php echo $item['name']; ?>"></td>
                                <td><?php echo $item['name']; ?></td>
                                <td>₹<?php echo number_format($item['price'], 2); ?></td>
                                <td><?php echo $item['quantity']; ?></td>
                                <td>₹<?php echo number_format($item_total, 2); ?></td>
                                <td>
                                    <form method="POST" style="display: inline;">
                                        <input type="hidden" name="cart_id" value="<?php echo $item['cart_id']; ?>">
                                        <button type="submit" name="remove_from_cart" class="btn btn-remove">Remove</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
                <div class="total">Total: ₹<?php echo number_format($total, 2); ?></div>
            <?php else: ?>
                <p style="text-align: center; font-size: 1.2rem;">Your cart is empty.</p>
            <?php endif; ?>
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
                        <li><a href="collections.php">Collections</a></li>
                        <li><a href="about.php">About</a></li>
                        <li><a href="contact.php">Support</a></li>
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

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['toggle_theme'])) {
        $_SESSION['theme'] = $theme === 'dark' ? 'light' : 'dark';
        header("Location: cart.php");
        exit;
    }
    mysqli_close($conn);
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