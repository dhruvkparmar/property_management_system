<?php include('../layouts/header.php'); ?>

<div class="container mt-5">
    <h2>Login</h2>
    <form action="../controllers/UserController.php" method="POST">
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" id="email" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" id="password" required>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
    <p class="mt-3">Don't have an account? <a href="register.php">Register here</a></p>
</div>

<?php include('../layouts/footer.php'); ?>
