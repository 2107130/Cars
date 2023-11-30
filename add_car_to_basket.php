<?php
session_start();

if (isset($_POST['add_to_basket'])) {
    $vehicleId = $_POST['add_to_basket'];

    // Initialize basket array if not exists
    if (!isset($_SESSION['basket'])) {
        $_SESSION['basket'] = [];
    }

    // Add the vehicle to the basket array
    $_SESSION['basket'][] = $vehicleId;

    echo 'success'; // Response to the AJAX request
}
?>

