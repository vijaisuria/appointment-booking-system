<?php
session_start();
if (!isset($_SESSION['registerNumber'])) {
    $_SESSION['redirectAlert'] = true;
    header("Location: index.php");
    exit();
}
?>

<?php
include_once '../config/dbconnection.php'; // Include your database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $registerNumber = $_POST['registerNumber'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $appointmentDate = $_POST['appointmentDate'];
    $speciality = $_POST['speciality'];
    $appointmentTimeSlot = $_POST['appointmentTime'];
    $issueType = $_POST['issueType'];
    $details = $_POST['details'];

    $category = $_SESSION['user']; // [ug_student, pg_student, phd_student]


    // Check if any value is empty or null
    if (empty($registerNumber) || empty($name) || empty($email) || empty($appointmentDate) || empty($speciality) || empty($appointmentTimeSlot) || empty($issueType)) {
        echo "<script>alert('Error: Please fill in all the fields.'); window.location.href = 'book.php';</script>";
        exit;
    }

    // Insert the appointment data into the appointment table
    $insertQuery = "INSERT INTO appointment (registerNumber, speciality, appointment_date, appointment_time_slot, issue, name, email, details, category)
                    VALUES ('$registerNumber', '$speciality', '$appointmentDate', '$appointmentTimeSlot', '$issueType', '$name', '$email', '$details', '$category')";

    // After successful insertion
    if ($conn->query($insertQuery) === TRUE) {
        $appointmentId = $conn->insert_id;

        // Redirect to acknowledgement.php with the appointment ID as a query parameter
        header("Location: generate_acknowledgement.php?appointmentId=$appointmentId");
        exit;
    } else {
        echo "<script>alert('Error: Appointment booking failed.'); window.location.href = 'book.php';</script>";
        exit;
    }


} else {
    echo "Invalid request";
}
?>