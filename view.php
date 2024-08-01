<?php
include 'functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $crop = getCrop($_GET['id']);
} else {
    header("Location: main.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Crop</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>View Crop</h1>

        <?php if ($crop): ?>
            <div>
                <h2><?php echo htmlspecialchars($crop['crop']); ?></h2>
                <p><strong>Information Needed:</strong> <?php echo htmlspecialchars($crop['info_needed']); ?></p>
                <p><strong>Topic:</strong> <?php echo htmlspecialchars($crop['topic']); ?></p>
                <p><strong>Experience:</strong> <?php echo $crop['experience'] ? 'Yes' : 'No'; ?></p>
                <p><strong>Additional Info:</strong> <?php echo htmlspecialchars($crop['additional_info']); ?></p>
            </div>

            <a href="main.php" class="button back-button">Back to Listings</a>
        <?php else: ?>
            <p>Crop not found.</p>
        <?php endif; ?>
    </div>
</body>
</html>
