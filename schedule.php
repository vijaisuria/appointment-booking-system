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
  include 'navbar.php';
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
  <div class="container">
    <table class="table align-middle mb-0 bg-white">
      <thead class="bg-light">
        <tr>
          <th>Name</th>
          <th>Specialty</th>
          <th>Time</th>
          <th>Availability</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody id="doctors-list">
        <tr>
          <td>
            <div class="d-flex align-items-center">
              <img src="https://mdbootstrap.com/img/new/avatars/8.jpg" alt="" style="width: 45px; height: 45px"
                class="rounded-circle" />
              <div class="ms-3">
                <p class="fw-bold mb-1">John Doe</p>
                <p class="text-muted mb-0">john.doe@gmail.com</p>
              </div>
            </div>
          </td>
          <td>
            <p class="fw-normal mb-1">Software engineer</p>
            <p class="text-muted mb-0">IT department</p>
          </td>
          <td>
            <span>Active</span>
          </td>
          <td>Senior</td>
          <td>
            <button type="button" class="btn btn-link btn-sm btn-rounded">
              Edit
            </button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
  <script>

    async function fetchAndPopulateDoctors() {
      const response = await fetch("https://helth-center-api.onrender.com/api/schedule");
      const data = await response.json();
      const doctorsList = document.getElementById("doctors-list");

      const blurContainer = document.getElementById('blur-container');
      blurContainer.style.display = 'none';

      const loadingSpinner = document.getElementById('css3-spinner-svg-pulse-wrapper');
      loadingSpinner.style.display = 'none';

      data.forEach((doctor) => {
        const doctorCard = `
          <tr>
          <td>
            <div class="d-flex align-items-center">
              <img src="https://mdbootstrap.com/img/new/avatars/8.jpg" alt="" style="width: 45px; height: 45px"
                class="rounded-circle" />
              <div class="ms-3">
                <p class="fw-bold mb-1">John Doe</p>
                <p class="text-muted mb-0">john.doe@gmail.com</p>
              </div>
            </div>
          </td>
          <td>
            <p class="fw-normal mb-1">${doctor.specialty}</p>
            <p class="text-muted mb-0">${doctor.day}</p>
          </td>
          <td>
            <span class="badge badge-success rounded-pill d-inline">${doctor.startTime} - ${doctor.endTime}</span>
          </td>
          <td>Check</td>
          <td>
            <button type="button" class="btn btn-link btn-sm btn-rounded">
              Edit
            </button>
          </td>
        </tr>
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