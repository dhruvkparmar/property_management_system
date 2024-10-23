<?php
require_once('../controllers/PropertyController.php');
$propertyController = new PropertyController();
$properties = $propertyController->list();
include('../layouts/header.php'); 
?>

<div class="container mt-5">
    <h2>Property Listings</h2>
    <form action="../controllers/PropertyController.php" method="POST">
        <input type="text" name="keyword" placeholder="Search properties..." class="form-control mb-3">
        <button type="submit" class="btn btn-secondary">Search</button>
    </form>
    
    <div class="row">
        <?php foreach ($properties as $property): ?>
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($property['title']); ?></h5>
                        <p class="card-text"><?php echo htmlspecialchars($property['description']); ?></p>
                        <p class="card-text"><strong>Price:</strong> $<?php echo htmlspecialchars($property['price']); ?></p>
                        <a href="detail.php?id=<?php echo $property['id']; ?>" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php include('../layouts/footer.php'); ?>
