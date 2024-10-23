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
<?php include '../layouts/header.php'; ?>

<div class="container mt-5">
    <h2 class="text-center">Submit a Property</h2>
    <form action="index.php?action=submit_property" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="propertyTitle">Property Title</label>
            <input type="text" class="form-control" id="propertyTitle" name="title" required>
        </div>
        <div class="form-group">
            <label for="propertyDescription">Description</label>
            <textarea class="form-control" id="propertyDescription" name="description" rows="4" required></textarea>
        </div>
        <div class="form-group">
            <label for="propertyPrice">Price</label>
            <input type="number" class="form-control" id="propertyPrice" name="price" required>
        </div>
        <div class="form-group">
            <label for="propertyType">Type</label>
            <select class="form-control" id="propertyType" name="type" required>
                <option value="">Select Property Type</option>
                <option value="House">House</option>
                <option value="Apartment">Apartment</option>
                <option value="Commercial">Commercial</option>
                <option value="Land">Land</option>
            </select>
        </div>
        <div class="form-group">
            <label for="propertyImages">Upload Images</label>
            <input type="file" class="form-control-file" id="propertyImages" name="images[]" multiple required>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Submit Property</button>
    </form>
</div>

<?php include '../layouts/footer.php'; ?>
</body>
</html>