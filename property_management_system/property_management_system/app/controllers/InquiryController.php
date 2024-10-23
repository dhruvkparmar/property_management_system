<?php
require_once '../models/Inquiry.php';

class InquiryController {
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $property_id = $_POST['property_id'];
            $user_id = $_SESSION['user_id'];
            $message = $_POST['message'];

            $inquiry = new Inquiry();
            $inquiry->create($property_id, $user_id, $message);
            header("Location: ../views/property/detail.php?id=$property_id"); // Redirect back to property detail
        }
    }

    public function list() {
        $inquiry = new Inquiry();
        return $inquiry->getAll();
    }

    public function getByProperty($property_id) {
        $inquiry = new Inquiry();
        return $inquiry->getByProperty($property_id);
    }
}
?>
