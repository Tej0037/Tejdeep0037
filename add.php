<?php
include 'functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $crop = $_POST['crop'];
    $info_needed = $_POST['info_needed'];
    $topic = $_POST['topic'];
    $experience = isset($_POST['experience']) ? 1 : 0;
    $additional_info = $_POST['additional_info'];

    addCrop($crop, $info_needed, $topic, $experience, $additional_info);
    header("Location: main.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Crop</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Add New Crop</h1>

        <form method="POST" action="">
            <input type="text" name="crop" placeholder="Crop Name" required>
            <textarea name="info_needed" placeholder="Information Needed" required></textarea>

            <fieldset>
                <legend>Topic</legend>

                <label for="topic">Select Topic:</label>
                <select name="topic" required>
                    <option value="">Select...</option>
                    <option value="Soil">Soil</option>
                    <option value="Irrigation">Irrigation</option>
                    <option value="Weather">Weather</option>
                    <option value="Method">Method</option>
                    <option value="Tools">Tools</option>
                </select>
            </fieldset>

            <div class="checkbox">
                <label for="experience">Experience:</label>
                <input type="checkbox" name="experience">
            </div>

            <textarea name="additional_info" placeholder="Additional Information"></textarea>
            <button type="submit">Add Crop</button>
        </form>

        <a href="main.php" class="button back-button">Back to Listings</a>
    </div>
</body>
</html>
