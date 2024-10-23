<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Property Management System</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Property Management</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="../app/views/property/list.php">Property Listings</a>
                </li>
                <?php if (isset($_SESSION['user'])): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="../app/views/user/profile.php">My Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../app/views/user/logout.php">Logout</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="../app/views/user/login.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../app/views/user/register.php">Register</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        <h1>Welcome to the Property Management System</h1>
        <?php if (isset($_SESSION['user'])): ?>
            <p>Hello, <?php echo htmlspecialchars($_SESSION['user']['username']); ?>! Explore your options.</p>
        <?php else: ?>
            <p>Please <a href="../app/views/user/login.php">login</a> or <a href="../app/views/user/register.php">register</a> to get started.</p>
        <?php endif; ?>
    </div>

    <footer class="footer bg-light mt-5">
        <div class="container text-center">
            <span class="text-muted">&copy; <?php echo date("Y"); ?> Property Management System. All rights reserved.</span>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
