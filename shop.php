<!-- shop.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Shop smartwatches watches at ChronoElite">
    <meta name="keywords" content="smartwatches watches, timepieces, shop watches">
    <title>ChronoElite - Shop</title>
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
            border: 1px solid transparent;
            border-radius: 50%;
            cursor: pointer;
            font-size: 1.2rem;
            color: var(--accent);
            /* padding: 8px; */
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

        /* Shop Section */
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
            color: var(--accent);
            box-shadow: 0px 0px 100px #000;
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

        .product-image {
            position: relative;
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

        /* Pagination */
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
        a{
            text-decoration: none;
            color: transparent;
        }
        /* Responsive Design */
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
    // Sample product data
    $allProducts = [
        ['name' => 'Timex Q 1975', 'price' => 1999.99, 'image' => 'https://www.watches.com/cdn/shop/files/timex-q-1975-enigma-reissue-37mm-blue-ss-tw2w59800vq-261651_1800x1800.jpg?v=1729815879', 'category' => 'men'],
        ['name' => 'Fastrack Automatic Gold Dial', 'price' => 11295.99, 'image' => 'Assets/women1.webp', 'category' => 'women'],
        ['name' => 'Fastrack Radiant FX4 Premium', 'price' => 2799.99, 'image' => 'Assets/smart2.png', 'category' => 'smartwatches'],
        ['name' => 'Sonata Wedding Edit Quartz', 'price' => 39445.00, 'image' => 'https://www.sonatawatches.in/dw/image/v2/BKDD_PRD/on/demandware.static/-/Sites-titan-master-catalog/default/dw8e41a7ea/images/Sonata/Catalog/77146WL01_1.jpg?sw=360&sh=360', 'category' => 'men'],
        ['name' => 'Galaxy watch 7', 'price' => 40649.99, 'image' => 'Assets/samsung.avif', 'category' => 'smartwatches'],
        ['name' => 'Rolex Lady-datejust', 'price' => 50399.99, 'image' => 'https://media.rolex.com/image/upload/q_auto:eco/f_auto/t_v7-grid/c_limit,w_320/v1/catalogue/2024/upright-bba-with-shadow/m279384rbr-0011', 'category' => 'women'],
        ['name' => 'Maxima Pro Regal', 'price' => 2199.99, 'image' => 'Assets/smart3.webp', 'category' => 'smartwatches'],
        ['name' => 'Fastrack FX1 pro', 'price' => 3529.99, 'image' => 'https://www.titan.co.in/dw/image/v2/BKDD_PRD/on/demandware.static/-/Sites-titan-master-catalog/default/dw1790eb4d/images/Fastrack/Catalog/38142NM01_1.jpg?sw=360&sh=360', 'category' => 'men'],
        ['name' => 'Fastrack Vyb Ecilipse', 'price' => 9479.99, 'image' => 'https://www.titan.co.in/dw/image/v2/BKDD_PRD/on/demandware.static/-/Sites-titan-master-catalog/default/dw5ea8bb8d/images/Fastrack/Catalog/FV60072WM01_1.jpg?sw=360&sh=360', 'category' => 'women'],
        ['name' => 'Apple Jet Black', 'price' => 22599.99, 'image' => 'https://store.storeimages.cdn-apple.com/4668/as-images.apple.com/is/MXM23ref_FV99_VW_34FR+watch-case-46-aluminum-jetblack-nc-s10_VW_34FR+watch-face-46-aluminum-jetblack-s10_VW_34FR?wid=750&hei=712&trim=1%2C0&fmt=p-jpg&qlt=95&.v=1725645481882', 'category' => 'smartwatches']
    ];

  
    $itemsPerPage = 6;
    $totalItems = count($allProducts);
    $totalPages = ceil($totalItems / $itemsPerPage);
    $currentPage = isset($_GET['page']) ? max(1, min($totalPages, (int)$_GET['page'])) : 1;

    
    $category = isset($_GET['category']) ? $_GET['category'] : '';
    $sort = isset($_GET['sort']) ? $_GET['sort'] : '';
    $search = isset($_GET['search']) ? strtolower(trim($_GET['search'])) : '';

    $filteredProducts = $allProducts;

    
    if ($search) {
        $filteredProducts = array_filter($filteredProducts, function($product) use ($search) {
            return strpos(strtolower($product['name']), $search) !== false;
        });
    }

    
    if ($category) {
        $filteredProducts = array_filter($filteredProducts, function($product) use ($category) {
            return $product['category'] === $category;
        });
    }

    
    if ($sort === 'low-high') {
        usort($filteredProducts, function($a, $b) {
            return $a['price'] <=> $b['price'];
        });
    } elseif ($sort === 'high-low') {
        usort($filteredProducts, function($a, $b) {
            return $b['price'] <=> $a['price'];
        });
    }

    
    $startIndex = ($currentPage - 1) * $itemsPerPage;
    $paginatedProducts = array_slice($filteredProducts, $startIndex, $itemsPerPage);
    $totalFilteredItems = count($filteredProducts);
    $totalFilteredPages = ceil($totalFilteredItems / $itemsPerPage);
    ?>

    <header class="header">
        <div class="container">
        <div class="logo"><a href="#">ChronoElite</a></div>
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
                        <option value="smartwatches" <?php echo $category === 'smartwatches' ? 'selected' : ''; ?>>SmartWatches</option>
                    </select>
                </div>
            </div>

            <div class="products-grid">
                <?php
                if (empty($paginatedProducts)) {
                    echo "<p style='text-align: center; font-size: 1.2rem;'>No products found matching your criteria.</p>";
                } else {
                    foreach ($paginatedProducts as $product) {
                        echo "
                            <div class='product-card' data-category='{$product['category']}'>
                                <div class='product-image'>
                                    <img src='{$product['image']}' alt='{$product['name']}'>
                                </div>
                                <div class='product-info'>
                                    <h3 class='product-title'>{$product['name']}</h3>
                                    <p class='product-price'>₹" . number_format($product['price'], 2) . "</p>
                                    <a href='#' class='btn'>Add to Cart</a>
                                </div>
                            </div>
                        ";
                    }
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

        // Filter and Sort Functionality
        const sortFilter = document.querySelector('.sort-filter');
        const categoryFilter = document.querySelector('.category-filter');
        const searchBar = document.querySelector('.search-bar');
        const form = document.createElement('form');
        form.method = 'GET';
        form.style.display = 'none';

        function updateURL() {
            const url = new URL(window.location);
            url.searchParams.set('sort', sortFilter.value);
            url.searchParams.set('category', categoryFilter.value);
            url.searchParams.set('search', searchBar.value);
            url.searchParams.set('page', 1); // Reset to page 1 on filter change
            window.location = url;
        }

        sortFilter.addEventListener('change', updateURL);
        categoryFilter.addEventListener('change', updateURL);
        searchBar.addEventListener('keypress', (e) => {
            if (e.key === 'Enter') {
                updateURL();
            }
        });
    </script>
</body>
</html>