<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Placeholder signup logic (replace with database insertion)
    $username = $_POST['username'];
    $password = $_POST['password'];
    $_SESSION['logged_in'] = true; // Simulate successful signup
    header("Location: index.php");
    exit;
}
$theme = isset($_SESSION['theme']) ? $_SESSION['theme'] : 'dark';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Sign up for ChronoElite">
    <meta name="keywords" content="signup, ChronoElite, watches">
    <title>Signup - ChronoElite</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700;800&display=swap" rel="stylesheet">
    <style>
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
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .signup-container {
            background: var(--card-bg);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 5px 15px var(--shadow);
            width: 100%;
            max-width: 400px;
            text-align: center;
            animation: fadeIn 1s ease;
        }
        .signup-container h1 {
            font-size: 2.5rem;
            font-weight: 700;
            background: linear-gradient(45deg, var(--accent), var(--secondary));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            margin-bottom: 20px;
        }
        .signup-container form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }
        .signup-container input {
            padding: 12px 20px;
            background: var(--bg);
            border: 1px solid var(--accent);
            border-radius: 25px;
            color: var(--text);
            font-size: 1rem;
            outline: none;
            transition: var(--transition);
        }
        .signup-container input:focus {
            border-color: var(--secondary);
            box-shadow: 0 0 10px var(--shadow);
        }
        .signup-container button {
            padding: 12px 20px;
            background: var(--accent);
            color: var(--bg);
            border: none;
            border-radius: 25px;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            position: relative;
            overflow: hidden;
        }
        .signup-container button::before {
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
        .signup-container button:hover::before {
            left: 0;
        }
        .signup-container button:hover {
            box-shadow: 0 5px 15px var(--shadow);
        }
        .signup-container .link {
            margin-top: 20px;
            font-size: 1rem;
        }
        .signup-container .link a {
            color: var(--accent);
            text-decoration: none;
            transition: var(--transition);
        }
        .signup-container .link a:hover {
            color: var(--secondary);
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @media (max-width: 480px) {
            .signup-container {
                padding: 20px;
            }
            .signup-container h1 {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    <div class="signup-container">
        <h1>Signup</h1>
        <form method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Signup</button>
        </form>
        <div class="link">
            <p>Already have an account? <a href="login.php">Login here</a></p>
        </div>
    </div>
</body>
</html>