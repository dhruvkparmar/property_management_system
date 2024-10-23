<?php
require_once '../config/config.php';

class Document {
    public function upload($property_id, $file) {
        $targetDir = '../storage/uploads/documents/';
        $targetFile = $targetDir . basename($file['name']);
        move_uploaded_file($file['tmp_name'], $targetFile);

        global $pdo;
        $stmt = $pdo->prepare("INSERT INTO documents (property_id, file_path, created_at) VALUES (?, ?, NOW())");
        $stmt->execute([$property_id, $targetFile]);
    }

    public function getByProperty($property_id) {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM documents WHERE property_id = ?");
        $stmt->execute([$property_id]);
        return $stmt->fetchAll();
    }
}
?>
