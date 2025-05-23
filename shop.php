<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Shop smartwatches watches at ChronoElite">
    <meta name="keywords" content="smartwatches watches, timepieces, shop watches">
    <title>ChronoElite - Shop</title>
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
        .shop {
            padding: 120px 0 80px;
            background: linear-gradient(135deg, var(--bg), var(--card-bg));
        }
        .shop-header {
            margin-bottom: 50px;
            text-align: center;
        }
        .shop-title {
            font-size: 3rem;
            font-weight: 800;
            background: linear-gradient(45deg, var(--accent), var(--secondary));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            margin-bottom: 20px;
        }
        .filters {
            display: flex;
            justify-content: center;
            gap: 15px;
            flex-wrap: wrap;
            margin-bottom: 30px;
        }
        .filter-select, .search-bar {
            padding: 12px 20px;
            background: var(--card-bg);
            border: 1px solid var(--accent);
            border-radius: 25px;
            color: var(--text);
            font-size: 1rem;
            cursor: pointer;
            transition: var(--transition);
            width: 200px;
        }
        .search-bar {
            width: 300px;
            outline: none;
        }
        .filter-select:hover, .search-bar:hover {
            border-color: var(--secondary);
            box-shadow: 0 0 10px var(--shadow);
        }
        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 40px;
        }
        .product-card {
            background: var(--card-bg);
            border-radius: 20px;
            overflow: hidden;
            transition: var(--transition);
            box-shadow: 0 5px 15px var(--shadow);
            position: relative;
        }
        .product-card:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 30px var(--shadow);
        }
        .product-image img {
            width: 100%;
            height: 320px;
            object-fit: cover;
            transition: var(--transition);
        }
        .product-card:hover .product-image img {
            transform: scale(1.1);
        }
        .product-info {
            padding: 25px;
            text-align: center;
        }
        .product-title {
            font-size: 1.4rem;
            margin-bottom: 10px;
            color: var(--accent);
            font-weight: 600;
        }
        .product-price {
            font-size: 1.3rem;
            color: var(--text);
            font-weight: 500;
            margin-bottom: 15px;
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
        .pagination {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 50px;
        }
        .page-btn {
            padding: 12px 20px;
            background: var(--card-bg);
            color: var(--text);
            border: 1px solid var(--accent);
            border-radius: 25px;
            text-decoration: none;
            transition: var(--transition);
            font-weight: 500;
        }
        .page-btn:hover,
        .page-btn.active {
            background: var(--accent);
            color: var(--bg);
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
        @media (max-width: 1024px) {
            .shop-title {
                font-size: 2.5rem;
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
            .filters {
                flex-direction: column;
                align-items: center;
            }
            .search-bar, .filter-select {
                width: 100%;
                max-width: 300px;
            }
        }
        @media (max-width: 480px) {
            .shop-title {
                font-size: 2rem;
            }
            .products-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <?php
    // Database Connection
    $conn = mysqli_connect("localhost", "root", "", "chronoelite");
    if (!$conn) {
        die("Connection failed: " . mysqli_error($conn));
    }
    mysqli_select_db($conn, "chronoelite");

    // Handle Add to Cart
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_to_cart'])) {
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
            if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
                $user_id = mysqli_real_escape_string($conn, $_SESSION['user_id']);
                $product_id = mysqli_real_escape_string($conn, $_POST['product_id']);
                $query = "INSERT INTO cart (user_id, product_id) VALUES ('$user_id', '$product_id')";
                if (mysqli_query($conn, $query)) {
                    $cart_message = "Product added to cart!";
                } else {
                    $cart_message = "Error adding to cart: " . mysqli_error($conn);
                }
            } else {
                $cart_message = "User session error. Please log in again.";
                header("Location: login.php");
                exit;
            }
        } else {
            header("Location: login.php");
            exit;
        }
    }

    // Pagination and Filtering
    $itemsPerPage = 6;
    $currentPage = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
    $category = isset($_GET['category']) ? mysqli_real_escape_string($conn, $_GET['category']) : '';
    $sort = isset($_GET['sort']) ? $_GET['sort'] : '';
    $search = isset($_GET['search']) ? mysqli_real_escape_string($conn, strtolower(trim($_GET['search']))) : '';

    // Build SQL Query
    $query = "SELECT * FROM products WHERE 1=1";
    if ($search) {
        $query .= " AND LOWER(name) LIKE '%$search%'";
    }
    if ($category) {
        $query .= " AND category='$category'";
    }
    if ($sort === 'low-high') {
        $query .= " ORDER BY price ASC";
    } elseif ($sort === 'high-low') {
        $query .= " ORDER BY price DESC";
    }

    // Get total items for pagination
    $result = mysqli_query($conn, $query);
    $totalFilteredItems = mysqli_num_rows($result);
    $totalFilteredPages = ceil($totalFilteredItems / $itemsPerPage);
    $currentPage = min($currentPage, max(1, $totalFilteredPages));

    // Add pagination to query
    $startIndex = ($currentPage - 1) * $itemsPerPage;
    $query .= " LIMIT $startIndex, $itemsPerPage";
    $result = mysqli_query($conn, $query);
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
                        <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true): ?>
                            <li><a href="cart.php">Cart</a></li>
                            <li><a href="logout.php">Logout</a></li>
                        <?php else: ?>
                            <li><a href="login.php">Login</a></li>
                            <li><a href="signup.php">Signup</a></li>
                        <?php endif; ?>
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

    <section class="shop">
        <div class="container">
            <div class="shop-header">
                <h1 class="shop-title">Explore Our Watches</h1>
                <div class="filters">
                    <input type="text" class="search-bar" placeholder="Search watches..." value="<?php echo htmlspecialchars($search); ?>">
                    <select class="filter-select sort-filter">
                        <option value="">Sort by Price</option>
                        <option value="low-high" <?php echo $sort === 'low-high' ? 'selected' : ''; ?>>Low to High</option>
                        <option value="high-low" <?php echo $sort === 'high-low' ? 'selected' : ''; ?>>High to Low</option>
                    </select>
                    <select class="filter-select category-filter">
                        <option value="">All Categories</option>
                        <option value="men" <?php echo $category === 'men' ? 'selected' : ''; ?>>Men</option>
                        <option value="women" <?php echo $category === 'women' ? 'selected' : ''; ?>>Women</option>
                        <option value="smartwatches" <?php echo $category === 'smartwatches' ? 'selected' : ''; ?>>Smartwatches</option>
                    </select>
                </div>
            </div>

            <?php if (isset($cart_message)) echo "<p style='text-align: center; color: var(--accent);'>$cart_message</p>"; ?>
            <div class="products-grid">
                <?php
                if (mysqli_num_rows($result) > 0) {
                    while ($product = mysqli_fetch_array($result)) {
                        echo "
                            <div class='product-card' data-category='{$product['category']}'>
                                <div class='product-image'>
                                    <img src='{$product['image']}' alt='{$product['name']}'>
                                </div>
                                <div class='product-info'>
                                    <h3 class='product-title'>{$product['name']}</h3>
                                    <p class='product-price'>₹" . number_format($product['price'], 2) . "</p>
                                    <form method='POST' style='display: inline;'>
                                        <input type='hidden' name='product_id' value='{$product['id']}'>
                                        <button type='submit' name='add_to_cart' class='btn'>Add to Cart</button>
                                    </form>
                                </div>
                            </div>
                        ";
                    }
                } else {
                    echo "<p style='text-align: center; font-size: 1.2rem;'>No products found matching your criteria.</p>";
                }
                ?>
            </div>

            <?php if ($totalFilteredPages > 1): ?>
            <div class="pagination">
                <?php if ($currentPage > 1): ?>
                    <a href="?page=<?php echo $currentPage - 1; ?>&sort=<?php echo $sort; ?>&category=<?php echo $category; ?>&search=<?php echo $search; ?>" class="page-btn">Previous</a>
                <?php endif; ?>
                <?php for ($i = 1; $i <= $totalFilteredPages; $i++): ?>
                    <a href="?page=<?php echo $i; ?>&sort=<?php echo $sort; ?>&category=<?php echo $category; ?>&search=<?php echo $search; ?>" class="page-btn <?php echo $i === $currentPage ? 'active' : ''; ?>"><?php echo $i; ?></a>
                <?php endfor; ?>
                <?php if ($currentPage < $totalFilteredPages): ?>
                    <a href="?page=<?php echo $currentPage + 1; ?>&sort=<?php echo $sort; ?>&category=<?php echo $category; ?>&search=<?php echo $search; ?>" class="page-btn">Next</a>
                <?php endif; ?>
            </div>
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
        header("Location: shop.php" . (isset($_SERVER['QUERY_STRING']) ? "?" . $_SERVER['QUERY_STRING'] : ""));
        exit;
    }
    mysqli_close($conn);
    ?>

    <script>
        const menuToggle = document.querySelector('.menu-toggle');
        const navMenu = document.querySelector('.nav-menu');
        const sortFilter = document.querySelector('.sort-filter');
        const categoryFilter = document.querySelector('.category-filter');
        const searchBar = document.querySelector('.search-bar');

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

        function updateURL() {
            const url = new URL(window.location);
            url.searchParams.set('sort', sortFilter.value);
            url.searchParams.set('category', categoryFilter.value);
            url.searchParams.set('search', searchBar.value);
            url.searchParams.set('page', 1);
            window.location = url;
        }

        sortFilter.addEventListener('change', updateURL);
        categoryFilter.addEventListener('change', updateURL);
        searchBar.addEventListener('keypress', (e) => {
            if (e.key === 'Enter') updateURL();
        });
    </script>
</body>
</html>