<?php include('../layouts/header.php'); ?>

<div class="container mt-5">
    <h2>Submit a New Property</h2>
    <form action="../controllers/PropertyController.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" id="title" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" name="description" id="description" required></textarea>
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" class="form-control" name="price" id="price" required>
        </div>
        <div class="form-group">
            <label for="location">Location</label>
            <input type="text" class="form-control" name="location" id="location" required>
        </div>
        <div class="form-group">
            <label for="images">Upload Images</label>
            <input type="file" class="form-control" name="images[]" id="images" multiple required>
        </div>
        <button type="submit" class="btn btn-primary">Submit Property</button>
    </form>
</div>

<?php include('../layouts/footer.php'); ?>
