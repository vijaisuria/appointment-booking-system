<script>
  const username = sessionStorage.getItem("registerNumber");
  if (!username) {
    alert("Please login to continue..")
    window.location.href = "./";
  }
</script>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Past Bookings</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
    crossorigin="anonymous"></script>
  <style>
    #css3-spinner-svg-pulse-wrapper {
      display: block;
      position: absolute;
      overflow: hidden;
      width: 260px;
      height: 210px;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      background-color: transparent;
      animation: none;
      -webkit-animation: none;
    }

    #css3-spinner-svg-pulse {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
    }

    #css3-spinner-pulse {
      stroke-dasharray: 281;
      -webkit-animation: dash 5s infinite linear forwards;
    }

    @-webkit-keyframes dash {
      from {
        stroke-dashoffset: 814;
      }

      to {
        stroke-dashoffset: -814;
      }
    }

    @keyframes dash {
      from {
        stroke-dashoffset: 814;
      }

      to {
        stroke-dashoffset: -814;
      }
    }

    #spinner-container {
      background-color: rgba(0, 0, 0, 0.5);
      position: fixed;
      z-index: 1000;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
    }

    #blur-container {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      filter: blur(5px);
      display: block;
      z-index: 999;
    }
  </style>
</head>

<body>
  <?php
  include 'includes/navbar.php';
  ?>

  <div id="blur-container"></div>

  <div id="spinner-container">
    <div id='css3-spinner-svg-pulse-wrapper'>
      <svg id='css3-spinner-svg-pulse' version='1.2' height='210' width='550' xmlns='http://www.w3.org/2000/svg'
        viewport='0 0 60 60' xmlns:xlink='http://www.w3.org/1999/xlink'>
        <path id='css3-spinner-pulse' stroke='#DE6262' fill='none' stroke-width='2' stroke-linejoin='round'
          d='M0,90L250,90Q257,60 262,87T267,95 270,88 273,92t6,35 7,-60T290,127 297,107s2,-11 10,-10 1,1 8,-10T319,95c6,4 8,-6 10,-17s2,10 9,11h210' />
      </svg>
    </div>
  </div>

  <div class="container mt-5">
    <h2>Past Bookings</h2>
    <table class="table table-bordered responsive table-striped">
      <thead>
        <tr>
          <th>Username</th>
          <th>Email</th>
          <th>Date</th>
          <th>Speciality</th>
          <th>Time Slot</th>
          <th>Start Time</th>
          <th>End Time</th>
          <th>Reason</th>
          <th>Links</th>
        </tr>
      </thead>
      <tbody id="bookings-table-body">
        <!-- Table rows will be dynamically inserted here -->
      </tbody>
    </table>
  </div>
  <script>
    async function fetchAndDisplayBookings() {
      const response = await fetch(
        `https://helth-center-api.onrender.com/api/appointment/user/${username}`
      );
      const data = await response.json();
      const loadingSpinner = document.getElementById('css3-spinner-svg-pulse-wrapper');
      const blurContainer = document.getElementById('blur-container');

      loadingSpinner.style.display = 'none';
      blurContainer.style.display = 'none';
      const bookingsTableBody = document.getElementById(
        "bookings-table-body"
      );

      data.forEach((booking) => {
        const row = document.createElement("tr");
        row.innerHTML = `
    <td>${booking.username}</td>
    <td>${booking.email}</td>
    <td>${getIndianTime(booking.date)}</td>
    <td>${booking.speciality}</td>
    <td>${booking.timeSlot}</td>
    <td>${booking.startTime}</td>
    <td>${booking.endTime}</td>
    <td>${booking.reason}</td>
    <td><button class="btn btn-danger" onclick="deleteBooking('${booking._id}')">Delete</button></td>
  `;

        bookingsTableBody.appendChild(row);
      });

      if (data.length === 0) {
        bookingsTableBody.innerHTML = `
    <tr>
      <td colspan='9' class='text-danger text-center'>
        <img src='https://cdni.iconscout.com/illustration/premium/thumb/schedule-appointment-4488748-3757143.png' alt='No Bookings' width='150'>
        <p>No bookings found.</p>
        <a href='./schedule.php' class='btn btn-primary'>Book Now</a>
      </td>
    </tr>
  `;
      }

    }

    const getIndianTime = (date) => {
      const utcDate = new Date(date);
      if (isNaN(utcDate)) return "";
      const utcOffset = 5.5; // India's UTC offset is 5 hours and 30 minutes ahead of UTC.
      const indianTime = new Date(utcDate.getTime() + utcOffset * 60 * 60 * 1000);
      return indianTime.toISOString().slice(0, 10) + " " + indianTime.toLocaleTimeString();
    };

    async function deleteBooking(bookingId) {
      try {
        const response = await fetch(
          `https://helth-center-api.onrender.com/api/appointment/${bookingId}`,
          {
            method: "DELETE",
          }
        );
        if (response.ok) {
          const bookingsTableBody = document.getElementById(
            "bookings-table-body"
          );
          bookingsTableBody.innerHTML = "";
          fetchAndDisplayBookings();
        } else {
          console.error("Failed to delete booking");
        }
      } catch (error) {
        console.error("Error:", error);
      }
    }

    document.addEventListener("DOMContentLoaded", () => {
      fetchAndDisplayBookings();
    });
  </script>
</body>

</html>