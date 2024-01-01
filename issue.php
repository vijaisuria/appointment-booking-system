<?php
session_start();
if (!isset($_SESSION['registerNumber'])) {
  $_SESSION['redirectAlert'] = true;
  header("Location: index.php");
  exit();
}
$registerNumber = $_SESSION['registerNumber'];
$user = $_SESSION['user'];
?>
<?php
if (isset($_GET['error']) == 'fk_error') {
  // Display the alert if the redirectAlert session variable is set
  echo '
            <div class="alert alert-danger alert-dismissible fade show w-lg-25 float-end"
            style="z-index: 999; position: fixed; top: 10px !important; right: 10px !important;">
                <strong>Error!</strong> Invalid past reference id
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        ';
  echo '<script>console.log(' . $_GET['msg'] . ');</script>';
} else if (isset($_GET['error']) == 'error') {
  // Display the alert if the redirectAlert session variable is set
  echo '
            <div class="alert alert-danger alert-dismissible fade show w-lg-25 float-end"
            style="z-index: 999; position: fixed; top: 10px !important; right: 10px !important;">
                <strong>Error!</strong> Something went wrong
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        ';
}
?>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ISSUE FORM | MIT-HC</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
    @import url("https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap");

    * {
      padding: 0px;
      margin: 0px;
      font-family: "Montserrat", sans-serif;
    }

    body {
      background-image: url("assets/images/fb-bg.png");
      background-size: cover;
      text-align: center;
      color: black;
      background-repeat: no-repeat;
    }

    .contact-form {
      margin-top: 50px;
      color: #ff5722;
      transition: all 4s ease-in-out;
    }

    .contact-form h1 {
      font-size: 32px;
      color: #ff0000;
    }

    .contact-form h5 {
      color: goldenrod;
      font-weight: bolder;
    }

    form {
      transition: all 4s ease-in-out;
      width: 400px;
    }

    .form-control {
      width: 100%;
      background: transparent;
      border: none;
      outline: none;
      border-bottom: 1px solid gray;
      color: black;
      font-size: 18px;
      margin-bottom: 18px;
    }

    .form-select {
      background-color: #bddae0;
      border: none;
      outline: none;
      border-bottom: 1px solid gray;
      color: black;
      font-size: 18px;
      margin-bottom: 18px;
    }

    .contact-us {
      display: flex;
      justify-content: center;
      align-items: center;
      place-items: center;
      flex-direction: column;
    }

    @media screen and (max-width: 600px) {
      .contact-us {}

      form {
        width: 90%;
      }
    }

    input {
      height: 45px;
    }

    form .submit {
      background: #ff5722;
      border: transparent;
      color: white;
      font-size: 20px;
      font-weight: bold;
      letter-spacing: 2px;
      height: 50px;
      margin-top: 20px;
    }

    form .submit:hover {
      background: #ff0000;
      cursor: pointer;
    }
  </style>
</head>

<body>
  <?php
  include_once 'includes/navbar.php';
  ?>
  <div class="contact-form">
    <h1>ISSUE MANAGEMENT PORTAL</h1>
    <h3>HEALTHCARE AUTOMATION SOFTWARE</h3>
    <h5>Health centre, MIT campus, Anna University</h5>
  </div>
  <div class="container contact-us">
    <p>
      We are here to help and answer any question you might have. We look
      forward to hearing from you 🙂 <br />
      Welcome to MIT-HC Support, if you had already raised an issue, <br>
      you can check the status of your issue in the <a href="track-issue">status page</a>.
    </p>
    <form action="actions/issue/raise_issue.php" method="post">
      <input type="text" id="registerNumber" name="registerNumber" class="form-control" required
        placeholder="Enter Your Register Number" readonly value=<?php echo $registerNumber ?>>
      <br>
      <input type="hidden" id="user" name="user" class="form-control" required placeholder="Enter Your Register Number"
        readonly value=<?php echo $user ?>>
      <input type="email" name="email" class="form-control" required placeholder="Enter Email"> <br>
      <input type="text" name="mobile" class="form-control" required placeholder="Enter Mobile Number"> <br>
      <select name="category" class="form-select" id="category">
        <option value="1">General</option>
        <option value="2">Technical</option>
        <option value="3">Others</option>
      </select> <br>
      <input type="text" name="query" id="query" class="form-control" required placeholder="Enter Your Query">
      <br>
      <div class="form-check">
        <label for="old_issue" class="form-check-label">Continuation of Previous Issue</label>
        <input type="checkbox" class="form-check-input" id="old_issue" name="old_issue">
      </div>
      <br>
      <div id="previous_issue_status" style="display:none;">
        <input type="text" name="previous_status" id="previous_status" class="form-control"
          placeholder="Enter Previous Issue Status">
      </div>
      <br>
      <input type="submit" name="submit" class="form-control submit" value="Submit">
      <p>Already raised a issue? Goto <a href="">status page</a></p>
    </form>
  </div>
  <?php
  include_once 'includes/footer.php';
  ?>
  <script>
    document.getElementById('old_issue').addEventListener('change', function () {
      var statusDiv = document.getElementById('previous_issue_status');
      statusDiv.style.display = this.checked ? 'block' : 'none';
    });
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script>
</body >

</html >