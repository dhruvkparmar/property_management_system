<?php
require_once '../models/Document.php';

class DocumentController {
    public function upload() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $property_id = $_POST['property_id'];
            $file = $_FILES['file'];

            $document = new Document();
            $document->upload($property_id, $file);
            header("Location: ../views/property/detail.php?id=$property_id"); // Redirect back to property detail
        }
    }

    public function getByProperty($property_id) {
        $document = new Document();
        return $document->getByProperty($property_id);
    }
}
?>
