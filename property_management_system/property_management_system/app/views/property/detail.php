<?php
require_once('../controllers/PropertyController.php');
$propertyController = new PropertyController();
$property = $propertyController->getById($_GET['id']);
include('../layouts/header.php'); 
?>

<div class="container mt-5">
    <h2><?php echo htmlspecialchars($property['title']); ?></h2>
    <p><?php echo htmlspecialchars($property['description']); ?></p>
    <p><strong>Price:</strong> $<?php echo htmlspecialchars($property['price']); ?></p>
    <p><strong>Location:</strong> <?php echo htmlspecialchars($property['location']); ?></p>
    
    <h5>Images:</h5>
    <div class="row">
        <?php
        // Fetch property images
        $images = $propertyController->getImagesByProperty($property['id']);
        foreach ($images as $image): ?>
            <div class="col-md-4">
                <img src="<?php echo htmlspecialchars($image['image_path']); ?>" class="img-fluid mb-2" alt="Property Image">
            </div>
        <?php endforeach; ?>
        <h5>Inquiries:</h5>
<div>
    <?php $inquiryController = new InquiryController(); 
    $inquiries = $inquiryController->getByProperty($property['id']); ?>
    <?php foreach ($inquiries as $inquiry): ?>
        <div>
            <strong><?php echo htmlspecialchars($inquiry['username']); ?>:</strong>
            <p><?php echo htmlspecialchars($inquiry['message']); ?></p>
            <small><?php echo $inquiry['created_at']; ?></small>
        </div>
    <?php endforeach; ?>
</div>

<h5>Submit an Inquiry:</h5>
<form action="../controllers/InquiryController.php" method="POST">
    <input type="hidden" name="property_id" value="<?php echo $property['id']; ?>">
    <textarea name="message" class="form-control" required></textarea>
    <button type="submit" class="btn btn-primary mt-2">Submit Inquiry</button>
</form>
<h5>Upload Document:</h5>
<form action="../controllers/DocumentController.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="property_id" value="<?php echo $property['id']; ?>">
    <input type="file" name="file" class="form-control" required>
    <button type="submit" class="btn btn-primary mt-2">Upload Document</button>
</form>

<h5>Uploaded Documents:</h5>
<div>
    <?php $documentController = new DocumentController(); 
    $documents = $documentController->getByProperty($property['id']); ?>
    <?php foreach ($documents as $document): ?>
        <div>
            <a href="<?php echo htmlspecialchars($document['file_path']); ?>" target="_blank"><?php echo basename($document['file_path']); ?></a>
            <small><?php echo $document['created_at']; ?></small>
        </div>
    <?php endforeach; ?>
</div>

    </div>
    
    <a href="list.php" class="btn btn-secondary">Back to Listings</a>
</div>

<?php include('../layouts/footer.php'); ?>
