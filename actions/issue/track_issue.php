<?php
include_once '../../config/dbconnection.php';

if (isset($_POST['issue_id'])) {
    $issue_id = $_POST['issue_id'];
    $issue_status = $_POST['issue_status'];
    $issue_remarks = $_POST['issue_remarks'];
    $issue_remarks = mysqli_real_escape_string($conn, $issue_remarks);
    $issue_remarks = htmlspecialchars($issue_remarks);
    $issue_remarks = trim($issue_remarks);

    $sql = "UPDATE issue SET issue_status = '$issue_status', issue_remarks = '$issue_remarks' WHERE issue_id = '$issue_id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "success";
    } else {
        echo "error";
    }
}
?>