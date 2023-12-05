<?php
session_start();

if (!isset($_SESSION['LOGGED_IN'])) {
    header('Location: ../login.php');
    exit();
}

// Check if the sno parameter is set in the URL
if (isset($_GET['sno'])) {
    require_once '../Controller/DbController.php';
    require_once '../Controller/UserController.php';

    $database = new DbController();
    $db = $database->getConnection();

    $user = new UserController($db);

    $sno = $_GET['sno'];

    // Perform the deletion based on the sno
    if ($user->deleteUser($sno)) {
        // Redirect to user list page after successful deletion
        header('Location: list-certificate.php');
        exit();
    } else {
        echo "Failed to delete user.";
    }
} else {
    echo "Invalid request.";
}
?>