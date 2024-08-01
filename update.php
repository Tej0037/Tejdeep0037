<?php
include 'functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $crop = getCrop($_GET['id']);
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $crop = $_POST['crop'];
    $info_needed = $_POST['info_needed'];
    $topic = $_POST['topic'];
    $experience = isset($_POST['experience']) ? 1 : 0;
    $additional_info = $_POST['additional_info'];

    updateCrop($id, $crop, $info_needed, $topic, $experience, $additional_info);
    header("Location:main.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Crop</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Update Crop</h1>

        <form method="POST" action="">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($crop['id']); ?>">
            <input type="text" name="crop" value="<?php echo htmlspecialchars($crop['crop']); ?>" required>
            <textarea name="info_needed" required><?php echo htmlspecialchars($crop['info_needed']); ?></textarea>

            <fieldset>
                <legend>Topic</legend>

                <label for="topic">Select Topic:</label>
                <select name="topic" required>
                    <option value="">Select...</option>
                    <option value="Soil" <?php if ($crop['topic'] === 'Soil') echo 'selected'; ?>>Soil</option>
                    <option value="Irrigation" <?php if ($crop['topic'] === 'Irrigation') echo 'selected'; ?>>Irrigation</option>
                    <option value="Weather" <?php if ($crop['topic'] === 'Weather') echo 'selected'; ?>>Weather</option>
                    <option value="Method" <?php if ($crop['topic'] === 'Method') echo 'selected'; ?>>Method</option>
                    <option value="Tools" <?php if ($crop['topic'] === 'Tools') echo 'selected'; ?>>Tools</option>
                </select>
            </fieldset>

            <div class="checkbox">
                <label for="experience">Experience:</label>
                <input type="checkbox" name="experience" <?php if ($crop['experience']) echo 'checked'; ?>>
            </div>

            <textarea name="additional_info" placeholder="Additional Information"><?php echo htmlspecialchars($crop['additional_info']); ?></textarea>
            <button type="submit">Update Crop</button>
        </form>

        <a href="main.php" class="button back-button">Back to Listings</a>
    </div>
</body>
</html>
