<?php
require_once('../controllers/UserController.php');
$userController = new UserController();
$user = $userController->getProfile();
include('../layouts/header.php'); 
?>

<div class="container mt-5">
    <h2>Your Profile</h2>
    <ul class="list-group">
        <li class="list-group-item"><strong>Name:</strong> <?php echo htmlspecialchars($user['name']); ?></li>
        <li class="list-group-item"><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></li>
        <li class="list-group-item"><strong>Role:</strong> <?php echo htmlspecialchars($user['role']); ?></li>
    </ul>
    <a href="../controllers/UserController.php?action=logout" class="btn btn-danger mt-3">Logout</a>
</div>

<?php include('../layouts/footer.php'); ?>
