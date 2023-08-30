<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Home | MIT-HC</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
    crossorigin="anonymous"></script>
  <style>
    #css3-spinner-svg-pulse-wrapper {
      display: none;
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

    /*Animation*/
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
      position: absolute;
      z-index: 1000;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
    }
  </style>
</head>

<body>
  <?php
  include 'navbar.php';
  ?>
  <div id="spinner-container">
    <div id='css3-spinner-svg-pulse-wrapper'>
      <svg id='css3-spinner-svg-pulse' version='1.2' height='210' width='550' xmlns='http://www.w3.org/2000/svg'
        viewport='0 0 60 60' xmlns:xlink='http://www.w3.org/1999/xlink'>
        <path id='css3-spinner-pulse' stroke='#DE6262' fill='none' stroke-width='2' stroke-linejoin='round'
          d='M0,90L250,90Q257,60 262,87T267,95 270,88 273,92t6,35 7,-60T290,127 297,107s2,-11 10,-10 1,1 8,-10T319,95c6,4 8,-6 10,-17s2,10 9,11h210' />
      </svg>
    </div>
  </div>
  <div class="container mt-5 mb-5">
    <div class="d-flex justify-content-between mb-3">
      <h2>MIT Campus - Specialist Doctors</h2>
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
        window.location.href = './';
      }
    });

    // Fetch data from API and populate the doctor cards
    async function fetchAndPopulateDoctors() {
      const loadingSpinner = document.getElementById('css3-spinner-svg-pulse-wrapper');
      loadingSpinner.style.display = 'block';

      const response = await fetch("https://helth-center-api.onrender.com/api/schedule");
      const data = await response.json();
      const doctorsList = document.getElementById("doctors-list");

      //const blurContainer = document.getElementById('blur-container');
      //blurContainer.style.display = 'block';

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
      loadingSpinner.style.display = 'none';
    }

    document.addEventListener("DOMContentLoaded", () => {
      fetchAndPopulateDoctors();
    });
  </script>
</body>

</html>