<?php
require_once '../config/config.php';

class Property {
    public function create($title, $description, $price, $location, $images, $user_id) {
        global $pdo;
        $stmt = $pdo->prepare("INSERT INTO properties (title, description, price, location, user_id, created_at) VALUES (?, ?, ?, ?, ?, NOW())");
        $stmt->execute([$title, $description, $price, $location, $user_id]);
        $property_id = $pdo->lastInsertId();
        
        // Save images
        foreach ($images as $image) {
            $this->uploadImage($image, $property_id);
        }
    }

    public function uploadImage($image, $property_id) {
        $targetDir = '../storage/uploads/';
        $targetFile = $targetDir . basename($image['name']);
        move_uploaded_file($image['tmp_name'], $targetFile);
        
        // Store the image path in the database
        global $pdo;
        $stmt = $pdo->prepare("INSERT INTO property_images (property_id, image_path) VALUES (?, ?)");
        $stmt->execute([$property_id, $targetFile]);
    }

    public function getAll() {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM properties");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getById($id) {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM properties WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function search($keyword) {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM properties WHERE title LIKE ? OR description LIKE ?");
        $stmt->execute(["%$keyword%", "%$keyword%"]);
        return $stmt->fetchAll();
    }
}
?>
