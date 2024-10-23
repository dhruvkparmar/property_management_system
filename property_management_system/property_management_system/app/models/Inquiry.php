<?php
require_once '../config/config.php';

class Inquiry {
    public function create($property_id, $user_id, $message) {
        global $pdo;
        $stmt = $pdo->prepare("INSERT INTO inquiries (property_id, user_id, message, created_at) VALUES (?, ?, ?, NOW())");
        $stmt->execute([$property_id, $user_id, $message]);
    }

    public function getByProperty($property_id) {
        global $pdo;
        $stmt = $pdo->prepare("SELECT inquiries.*, users.username FROM inquiries JOIN users ON inquiries.user_id = users.id WHERE property_id = ?");
        $stmt->execute([$property_id]);
        return $stmt->fetchAll();
    }

    public function getAll() {
        global $pdo;
        $stmt = $pdo->prepare("SELECT inquiries.*, properties.title AS property_title, users.username FROM inquiries JOIN properties ON inquiries.property_id = properties.id JOIN users ON inquiries.user_id = users.id");
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
?>
