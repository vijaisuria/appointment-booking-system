<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Past Bookings</title>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css"
    />
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
      crossorigin="anonymous"
    ></script>
    <style>
        .loading-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .heartbeat-icon {
            animation: heartbeat 1s infinite;
            font-size: 100px;
        }

        @keyframes heartbeat {
            0%, 100% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.1);
            }
        }
    </style>
  </head>
  <body>
    <?php
      include 'navbar.php';
    ?>

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
        const username = sessionStorage.getItem("registerNumber"); // Get username from session
        const response = await fetch(
          `https://helth-center-api.onrender.com/api/appointment/user/${username}`
        );
        const data = await response.json();
        const bookingsTableBody = document.getElementById(
          "bookings-table-body"
        );

         const loadingContainer = document.querySelector(".loading-container");

        loadingContainer.style.display = "none";

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
