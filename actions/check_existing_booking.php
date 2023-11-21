<?php
include_once '../config/dbconnection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['registerNumber']) && isset($_POST['selectedDate'])) {
    $registerNumber = $_POST['registerNumber'];
    $selectedDate = $_POST['selectedDate'];

    // Query to check for an existing booking for the user on the selected date
    $query = "SELECT * FROM appointment WHERE registerNumber = '$registerNumber' AND appointment_date = '$selectedDate'";

    // Execute the query
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        echo 'exists'; // Return exists if a booking is found
    } else {
        echo 'not_exists'; // Return not_exists if no booking is found
    }
} else {
    echo 'invalid_request';
}
?>