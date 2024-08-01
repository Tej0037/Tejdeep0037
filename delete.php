<?php
include 'functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];

    if (deleteCrop($id)) {
        header("Location: main.php");
        exit();
    } else {
        echo "Error deleting crop.";
    }
} else {
    header("Location: main.php");
    exit();
}
?>
