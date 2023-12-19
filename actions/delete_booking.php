<?php
// Perform necessary database connection here
include_once '../config/dbconnection.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['bookingId'])) {
    $bookingId = $_POST['bookingId'];
    echo $bookingId;
    // Delete the booking with the given ID from the database
    $deleteQuery = "DELETE FROM Appointment WHERE id = '$bookingId'";
    if ($conn->query($deleteQuery) === TRUE) {
        // Deletion successful
        http_response_code(200); // Send success response
    } else {
        // Deletion failed
        http_response_code(500); // Send failure response
    }
} else {
    http_response_code(400); // Invalid request
}
?>