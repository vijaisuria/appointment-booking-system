<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home | MIT-HC</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9"
      crossorigin="anonymous"
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
    
    <div class="container mt-5 mb-5">
      <div class="d-flex justify-content-between mb-3">
        <span>MIT Campus - Specialist Doctors</span>
        <button class="btn btn-info add" id="past">Past Bookings</button>
      </div>
      <div class="row g-2" id="doctors-list">
        <!-- Doctor cards will be dynamically inserted here -->
      </div>
    </div>
    <script>
      const pastButton = document.getElementById('past');
      pastButton.addEventListener('click', () => {
        if (sessionStorage.getItem('registerNumber')) {
          window.location.href = './bookings.php';
        } else {
          alert('Please login to see past records');
          window.location.href = './user.php';
        }
      });

      // Fetch data from API and populate the doctor cards
      async function fetchAndPopulateDoctors() {
        const response = await fetch("https://helth-center-api.onrender.com/api/schedule");
            const data = await response.json();
            const doctorsList = document.getElementById("doctors-list");
            const loadingContainer = document.querySelector(".loading-container");

            loadingContainer.style.display = "none"; // Hide the loading spinner


        data.forEach((doctor) => {
          const doctorCard = `
          <div class="col-md-3">
            <div class="card p-2 py-3 text-center">
              <div class="img mb-2">
                <img src="https://img.freepik.com/premium-vector/doctor-profile-with-medical-service-icon_617655-48.jpg?w=2000" width="70" class="rounded-circle">
              </div>

              <h5 class="mb-0">${doctor.specialty}</h5>
             

              <div class="duration-day mt-2">
                <p>
                    <strong>Duration:</strong> ${doctor.startTime} - ${doctor.endTime}
                    <br />
                    <strong>Day:</strong> ${doctor.day}
                </p>
              </div>

              <div class="mt-4 apointment">
                <button class="btn btn-success text-uppercase">Book Appointment</button>
              </div>
            </div>
          </div>
        `;

          doctorsList.innerHTML += doctorCard;
        });
      }

      document.addEventListener("DOMContentLoaded", () => {
            fetchAndPopulateDoctors();
        });
    </script>
  </body>
</html>
