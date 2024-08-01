<?php
include 'config.php';

// Add Crop Function
function addCrop($crop, $info_needed, $topic, $experience, $additional_info) {
    $conn = new mysqli('localhost', 'root', '', 'agriculture');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("INSERT INTO crops (crop, info_needed, topic, experience, additional_info) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssii", $crop, $info_needed, $topic, $experience, $additional_info);

    if ($stmt->execute()) {
        echo "New crop added successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}

// Update Crop Function
function updateCrop($id, $crop, $info_needed, $topic, $experience, $additional_info) {
    $conn = new mysqli('localhost', 'root', '', 'agriculture');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("UPDATE crops SET crop = ?, info_needed = ?, topic = ?, experience = ?, additional_info = ? WHERE id = ?");
    $stmt->bind_param("sssisi", $crop, $info_needed, $topic, $experience, $additional_info, $id);

    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}

// Delete Crop Function
function deleteCrop($id) {
    $conn = new mysqli('localhost', 'root', '', 'agriculture');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("DELETE FROM crops WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}

// Get Crop Function
function getCrop($id) {
    $conn = new mysqli('localhost', 'root', '', 'agriculture');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("SELECT * FROM crops WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}

// Get All Crops Function
function getAllCrops() {
    $conn = new mysqli('localhost', 'root', '', 'agriculture');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $result = $conn->query("SELECT * FROM crops");
    return $result->fetch_all(MYSQLI_ASSOC);
}
?>
