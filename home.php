<?php
session_start();
if (!isset($_SESSION['registerNumber'])) {
  $_SESSION['redirectAlert'] = true;
  header("Location: index.php");
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
  <?php include './includes/navbar.php'; ?>

  <div class="container mt-5">
    <div class="row">
      <div class="col-md-3 mb-2">
        <div class="card bg-primary text-white">
          <div class="card-body">
            <h5 class="card-title"><i class="fas fa-user"></i> Profile</h5>
            <p class="card-text">View and update your profile information.</p>
            <a href="./profile.php" class="btn btn-light">Go to Profile</a>
          </div>
        </div>
      </div>
      <div class="col-md-3 mb-2">
        <div class="card bg-success text-white">
          <div class="card-body">
            <h5 class="card-title"><i class="fas fa-calendar-check"></i> Appointments</h5>
            <p class="card-text">Manage your appointments and view upcoming ones.</p>
            <a href="./bookings.php" class="btn btn-light">Go to Appointments</a>
          </div>
        </div>
      </div>
      <div class="col-md-3 mb-2">
        <div class="card bg-info text-white">
          <div class="card-body">
            <h5 class="card-title"><i class="fas fa-book"></i> Booking</h5>
            <p class="card-text">Book appointments with healthcare providers.</p>
            <a href="./schedule.php" class="btn btn-light">Go to Booking</a>
          </div>
        </div>
      </div>
      <div class="col-md-3 mb-2">
        <div class="card bg-warning text-white">
          <div class="card-body">
            <h5 class="card-title"><i class="fas fa-clock"></i> Schedule</h5>
            <p class="card-text">Give us Feedback and suggestion to grow more</p>
            <a href="./feedback.php" class="btn btn-light">Go to Contact</a>
          </div>
        </div>
      </div>
    </div>

    <div class="row mt-4">
      <div class="col-md-6 mb-2">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Latest News & Announcements</h5>
            <marquee behavior="scroll" id="marquee" direction="up" scrollamount="3" style="height: 200px;">
              <?php
              $eventData = file_get_contents('event.txt');
              echo nl2br($eventData);
              ?>
            </marquee>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Feedback Form</h5>
            <form>
              <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username">
              </div>
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email">
              </div>
              <div class="mb-3">
                <label for="subject" class="form-label">Subject</label>
                <input type="text" class="form-control" id="subject" name="subject">
              </div>
              <div class="mb-3">
                <label for="message" class="form-label">Message</label>
                <textarea class="form-control" id="message" name="message" rows="4"></textarea>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php
  include_once './includes/footer.php';
  ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
  <script>
    var marquee = document.getElementById('marquee');

    // Pause scrolling on hover
    marquee.addEventListener('mouseover', function () {
      this.stop();
    });

    // Resume scrolling when not hovering
    marquee.addEventListener('mouseout', function () {
      this.start();
    });
  </script>
  <script>
    document.getElementById('prescription').addEventListener('click', function (event) {
      event.preventDefault();
      <?php
      if (isset($_SESSION['registerNumber'])) {
        // If the user is logged in, redirect to the specific URL
        echo 'window.open("https://health-center.vercel.app/student/prescriptions/' . $_SESSION['registerNumber'] . '", "_blank");';
      } else {
        $_SESSION['redirectAlert'] = true;
        header("Location: ../index.php");
        exit();
      }
      ?>
    });
  </script>
</body>

</html>