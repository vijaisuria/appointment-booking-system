<?php
include_once '../../config/dbconnection.php';

if (isset($_POST["submit"])) {
  $user = $_POST['user'];
  $registerNumber = $_POST['registerNumber'];
  $email = $_POST['email'];
  $mobile = $_POST['mobile'];
  $category = $_POST['category'];
  $query = $_POST['query'];

  if (isset($_POST['old_issue'])) {
    $previousStatus = $_POST['previous_status'];
    $sql = "INSERT INTO issue (user, registerNumber, email, mobile, category, query, reference_id) VALUES ('$user', '$registerNumber', '$email', '$mobile', '$category', '$query', '$previousStatus')";
  } else {
    $sql = "INSERT INTO issue (user, registerNumber, email, mobile, category, query) VALUES ('$user', '$registerNumber', '$email', '$mobile', '$category', '$query')";
  }

  try {
    if ($conn->query($sql) === TRUE) {
      session_start();
      $id = $conn->insert_id;
      $_SESSION['issue_id'] = $id;
      header("Location: success.php");
      exit();
    } else {
      if ($conn->errno == 1452) { // Foreign key constraint violation error number
        header("Location: ../../issue.php?error=fk_error");
        exit();
      } else {
        header("Location: ../../issue.php?error=error");
        exit();
      }
    }
  } catch (mysqli_sql_exception $e) {
    header("Location: ../../issue.php?error=fk_error&msg=" . $e->getMessage());
    exit();
  }
}

$conn->close();
?>