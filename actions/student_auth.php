<?php
include '../config/dbconnection.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $registerNumber = $_POST['registerNumber'];
    $password = $_POST['password'];
    $loginType = $_POST['loginType']; // UG, PG, PHD

    $table = "";
    switch ($loginType) {
        case 'UG':
            $table = 'ug_student';
            break;
        case 'PG':
            $table = 'pg_student';
            break;
        case 'PHD':
            $table = 'phd_student';
            break;
        default:
            echo "Invalid login type!";
            exit; // Stop script execution
    }

    $sql = "SELECT * FROM $table WHERE registerNumber = '$registerNumber'";
    $result = $conn->query($sql);


    if ($result->num_rows > 0) {
        if ($row = $result->fetch_assoc()) {
            if ($row['password'] == $password) {
                echo "Student authentication successful!";
                $_SESSION['registerNumber'] = $registerNumber;
                $_SESSION['user'] = "student";
                header("Location: ../home.php");
            } else {
                $_SESSION['alert'] = '2';
                header("Location: ../index.php");
            }
        }
    } else {
        $_SESSION['alert'] = '1';
        header("Location: ../index.php");
    }
}

$conn->close();
?>