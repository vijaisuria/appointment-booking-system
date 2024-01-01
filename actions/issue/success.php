<?php
session_start();
if (!isset($_SESSION['registerNumber'])) {
    $_SESSION['redirectAlert'] = true;
    header("Location: ../../index.php");
    exit();
}
if (!isset($_SESSION['issue_id'])) {
    echo "<script>alert('Invalid access!');</script>";
    header("Location: ../../issue.php");
    exit();
}
$id = $_SESSION['issue_id'];
unset($_SESSION['issue_id']);
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Add your custom styles here */
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="jumbotron">
            <h1 class="display-4">Issue Submitted Successfully!</h1>
            <?php
            echo "<p class='lead'>Your Issue ID is: <strong>$id</strong></p>";
            ?>
            <hr class="my-4">
            <p class="lead">
                Thank you for submitting your issue. Our team will look into it shortly.
            </p>
            <button class="btn btn-primary" onclick="window.print()">Print Issue Details</button>

            <a class="btn btn-primary" href="../../index.php" role="button">Go to Home Page</a>

            <a class="btn btn-primary" href="../../track-issue.php" role="button">Track issue</a>

            <a class="btn btn-primary" href="../../issue.php" role="button">Raise Another Issue</a>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>