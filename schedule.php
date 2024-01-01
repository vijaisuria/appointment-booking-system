<?php
require_once('./config/dbconnection.php');
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
  <title>Specialty Schedule</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
    crossorigin="anonymous"></script>
</head>

<body>
  <?php
  include 'includes/navbar.php';
  ?>


  <div class="container " style="margin-top: 50px">
    <div class="table-responsive">
      <table class="table align-middle table-striped table-hover">
        <caption>List of Specialist @MIT Health Centre</caption>
        <thead class="bg-light">
          <tr>
            <th>Name</th>
            <th>Day</th>
            <th>Specialty</th>
            <th>Time</th>
            <th>Availability</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody id="doctors-list">
          <?php
          $query = "SELECT doctor_name, speciality, day, visit_start_time, visit_end_time FROM doctor_visits ORDER BY day, doctor_name";
          $result = $conn->query($query);

          if ($result->num_rows > 0) {
            // Outputting the fetched data in the specified format
            while ($row = $result->fetch_assoc()) {
              echo '<tr>
            <td>
                <div class="d-flex align-items-center">
                    <img src="https://img.freepik.com/premium-vector/doctor-profile-with-medical-service-icon_617655-48.jpg?w=2000" alt="" style="width: 45px; height: 45px" class="rounded-circle" />
                    <div class="ms-3">
                        <p class="fw-bold mb-1">' . $row['doctor_name'] . '</p>
                    </div>
                </div>
            </td> <td>
                <p class="mb-0 text-primary"><strong>' . $row['day'] . '</strong></p>
            </td>
            <td>
                <p class="fw-normal mb-1">' . $row['speciality'] . '</p>
            </td>
            <td style="min-width: 7rem">
                <span>' . $row['visit_start_time'] . ' - ' . $row['visit_end_time'] . '</span>
            </td>
            <td>
                <button class="btn btn-info" type="button" id="checkButton">Check</button>
            </td>
            <td>
                <button type="button" id="bookButton" class="btn btn-success">
                    Book
                </button>
            </td>
        </tr>';
            }
          } else {
            echo "No records found";
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
  <script>
    document.getElementById('bookButton').addEventListener('click', function () {
      window.location.href = 'book.php';
    });
    document.getElementById('checkButton').addEventListener('click', function () {
      window.location.href = 'check.php';
    });
  </script>
</body>

</html>