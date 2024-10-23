<?php
require_once('../controllers/InquiryController.php');
$inquiryController = new InquiryController();
$inquiries = $inquiryController->list($_GET['property_id']);
include('../layouts/header.php'); 
?>

<div class="container mt-5">
    <h2>Inquiries for Property ID: <?php echo htmlspecialchars($_GET['property_id']); ?></h2>
    <table class="table">
        <thead>
            <tr>
                <th>Sender</th>
                <th>Message</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($inquiries as $inquiry): ?>
                <tr>
                    <td><?php echo htmlspecialchars($inquiry['user_name']); ?></td>
                    <td><?php echo nl2br(htmlspecialchars($inquiry['message'])); ?></td>
                    <td><?php echo htmlspecialchars($inquiry['created_at']); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="../views/property/detail.php?id=<?php echo $_GET['property_id']; ?>" class="btn btn-secondary">Back to Property</a>
</div>

<?php include('../layouts/footer.php'); ?>
