<?php
include 'functions.php';
$crops = getAllCrops();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Crops Listing Management</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Crops Listings Management</h1>
        <a href="add.php" class="button">Add New Crop</a>

        <?php if (!empty($crops)): ?>
            <table>
                <thead>
                    <tr>
                        <th>Crop</th>
                        <th>Information Needed</th>
                        <th>Topic</th>
                        <th>Experience</th>
                        <th>Additional Info</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($crops as $crop): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($crop['crop']); ?></td>
                            <td><?php echo htmlspecialchars($crop['info_needed']); ?></td>
                            <td><?php echo htmlspecialchars($crop['topic']); ?></td>
                            <td><?php echo $crop['experience'] ? 'Yes' : 'No'; ?></td>
                            <td><?php echo htmlspecialchars($crop['additional_info']); ?></td>
                            <td>
                                <a href="update.php?id=<?php echo $crop['id']; ?>" class="button">Edit</a>
                                <a href="delete.php?id=<?php echo $crop['id']; ?>" class="button">Delete</a>
                                <a href="view.php?id=<?php echo $crop['id']; ?>" class="button">View</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No crops found.</p>
        <?php endif; ?>

    </div>
</body>
</html>
