<?php
include_once '../config/dbconnection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['registerNumber']) && isset($_POST['password'])) {
    $registerNumber = $_POST['registerNumber'];
    $password = $_POST['password']; // Hash the password

    session_start();
    $tableName = $_SESSION['user'];

    $updateQuery = "UPDATE $tableName SET password = ? WHERE registerNumber = ?";
    $stmt = $conn->prepare($updateQuery);
    $stmt->bind_param("ss", $password, $registerNumber);

    if ($stmt->execute()) {
        // Password update successful
        http_response_code(200); // Send success response
    } else {
        // Password update failed
        http_response_code(500); // Send failure response
    }

} else {
    http_response_code(400); // Invalid request
}
?>