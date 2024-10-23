<?php
require_once '../models/Property.php';

class PropertyController {
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = $_POST['title'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $location = $_POST['location'];
            $user_id = $_SESSION['user_id'];
            $images = $_FILES['images']; // Expecting multiple images
            
            $property = new Property();
            $property->create($title, $description, $price, $location, $images['name']);
            header('Location: ../views/property/list.php'); // Redirect to property list after creation
        }
    }

    public function list() {
        $property = new Property();
        return $property->getAll();
    }

    public function search() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $keyword = $_POST['keyword'];
            $property = new Property();
            return $property->search($keyword);
        }
    }
}
?>
