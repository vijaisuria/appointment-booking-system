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
  <title>User Profile</title>
  <link rel="stylesheet" href="./css/profile.css" />
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

  <div class="container" id="profileContent">
    <div class="main-body">
      <div class="row gutters-sm">
        <div class="col-md-4 mb-3">
          <div class="card">
            <div class="card-body">
              <div class="d-flex flex-column align-items-center text-center">
                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle"
                  width="150" />
                <div class="mt-3">
                  <h4 class="name"></h4>
                  <p class="text-secondary mb-1" id="userType">Student</p>
                  <p class="text-muted font-size-sm">
                    MIT Campus, Anna University
                  </p>
                  <button class="btn btn-primary">Edit</button>
                </div>
              </div>
            </div>
          </div>

          <div class="card h-50 my-3">
            <div class="card-body">
              <div class="row">
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                  First time your password will be your DOB (ddmmyyy)
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              </div>
              <form>
                <div class="row">
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Enter password" />
                    <small id="passworderror" class="form-text text-muted"></small>
                  </div>
                </div>

                <div class="row mt-2">
                  <div class="form-group">
                    <label for="condirmPassword">Confirm Password</label>
                    <input type="text" class="form-control" id="condirmPassword" placeholder="Retype Password" />
                  </div>
                </div>

                <button type="submit" class="btn btn-primary mt-3">
                  Submit
                </button>
              </form>
            </div>
          </div>
        </div>
        <div class="col-md-8">
          <div class="card mb-3">
            <div class="card-body">
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Full Name</h6>
                </div>
                <div class="col-sm-9 text-secondary name"></div>
              </div>
              <hr />
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Username</h6>
                </div>
                <div class="col-sm-9 text-secondary" id="username"></div>
              </div>
              <hr />
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">DOB (YYYY-MM-DD)</h6>
                </div>
                <div class="col-sm-9 text-secondary" id="dob"></div>
              </div>
              <hr />
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Gender</h6>
                </div>
                <div class="col-sm-9 text-secondary" id="gender"></div>
              </div>
              <hr />
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Residence</h6>
                </div>
                <div class="col-sm-9 text-secondary" id="residence">
                </div>
              </div>
              <hr />
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">Department</h6>
                </div>
                <div class="col-sm-9 text-secondary" id="dept"></div>
              </div>
              <hr />
              <div class="row">
                <div class="col-sm-3">
                  <h6 class="mb-0">College</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  Madras Institute of Technology, Anna University, Chennai
                </div>
              </div>

            </div>
          </div>
          <div class="row gutters-sm">
            <div class="col mb-3">
              <div class="card h-100">
                <div class="card-body">
                  <h6 class="d-flex align-items-center mb-3">
                    <i class="material-icons text-info mx-2">Patient </i> Health Status
                  </h6>
                  <small>Heart Rate</small>
                  <div class="progress mb-3" style="height: 5px">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80"
                      aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <small>Blood Pressure</small>

                  <div class="progress mb-3" style="height: 5px">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: 89%" aria-valuenow="89"
                      aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <small>Oxygen level</small>
                  <div class="progress mb-3" style="height: 5px">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: 55%" aria-valuenow="55"
                      aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <small>Sugar level</small>
                  <div class="progress mb-3" style="height: 5px">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: 66%" aria-valuenow="66"
                      aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--
          <div class="row gutters-sm">
            <div class="col-sm-6 mb-3">
              <div class="card h-100">
                <div class="card-body">
                  <h6 class="d-flex align-items-center mb-3">
                    <i class="material-icons text-info mr-2">assignment</i
                    >Project Status
                  </h6>
                  <small>Web Design</small>
                  <div class="progress mb-3" style="height: 5px">
                    <div
                      class="progress-bar bg-primary"
                      role="progressbar"
                      style="width: 80%"
                      aria-valuenow="80"
                      aria-valuemin="0"
                      aria-valuemax="100"
                    ></div>
                  </div>
                  <small>Website Markup</small>

                  <div class="progress mb-3" style="height: 5px">
                    <div
                      class="progress-bar bg-primary"
                      role="progressbar"
                      style="width: 89%"
                      aria-valuenow="89"
                      aria-valuemin="0"
                      aria-valuemax="100"
                    ></div>
                  </div>
                  <small>Mobile Template</small>
                  <div class="progress mb-3" style="height: 5px">
                    <div
                      class="progress-bar bg-primary"
                      role="progressbar"
                      style="width: 55%"
                      aria-valuenow="55"
                      aria-valuemin="0"
                      aria-valuemax="100"
                    ></div>
                  </div>
                  <small>Backend API</small>
                  <div class="progress mb-3" style="height: 5px">
                    <div
                      class="progress-bar bg-primary"
                      role="progressbar"
                      style="width: 66%"
                      aria-valuenow="66"
                      aria-valuemin="0"
                      aria-valuemax="100"
                    ></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6 mb-3">
              <div class="card h-100">
                <div class="card-body">
                  <h6 class="d-flex align-items-center mb-3">
                    <i class="material-icons text-info mr-2">assignment</i
                    >Project Status
                  </h6>
                  <small>Web Design</small>
                  <div class="progress mb-3" style="height: 5px">
                    <div
                      class="progress-bar bg-primary"
                      role="progressbar"
                      style="width: 80%"
                      aria-valuenow="80"
                      aria-valuemin="0"
                      aria-valuemax="100"
                    ></div>
                  </div>
                  <small>Website Markup</small>
                  <div class="progress mb-3" style="height: 5px">
                    <div
                      class="progress-bar bg-primary"
                      role="progressbar"
                      style="width: 72%"
                      aria-valuenow="72"
                      aria-valuemin="0"
                      aria-valuemax="100"
                    ></div>
                  </div>
                  <small>One Page</small>
                  <div class="progress mb-3" style="height: 5px">
                    <div
                      class="progress-bar bg-primary"
                      role="progressbar"
                      style="width: 89%"
                      aria-valuenow="89"
                      aria-valuemin="0"
                      aria-valuemax="100"
                    ></div>
                  </div>
                  <small>Mobile Template</small>
                  <div class="progress mb-3" style="height: 5px">
                    <div
                      class="progress-bar bg-primary"
                      role="progressbar"
                      style="width: 55%"
                      aria-valuenow="55"
                      aria-valuemin="0"
                      aria-valuemax="100"
                    ></div>
                  </div>
                  <small>Backend API</small>
                  <div class="progress mb-3" style="height: 5px">
                    <div
                      class="progress-bar bg-primary"
                      role="progressbar"
                      style="width: 66%"
                      aria-valuenow="66"
                      aria-valuemin="0"
                      aria-valuemax="100"
                    ></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          -->
      </div>
    </div>
  </div>

  <script>
    const profileContent = document.getElementById("profileContent");
    const userType = sessionStorage.getItem("loginType");
    profileContent.style.display = "none";

    const getIndianTime = (date) => {
      const utcDate = new Date(date);
      if (isNaN(utcDate)) return "";
      const utcOffset = 5.5; // India's UTC offset is 5 hours and 30 minutes ahead of UTC.
      const indianTime = new Date(
        utcDate.getTime() + utcOffset * 60 * 60 * 1000
      );
      return (
        indianTime.toISOString().slice(0, 10)
      );
    };

    if (username) {
      const apiUrl = `https://helth-center-api.onrender.com/api/students/reg/${username}`;

      fetch(apiUrl)
        .then((response) => response.json())
        .then((data) => {
          console.log("Success:", data);
          const loadingSpinner = document.getElementById('css3-spinner-svg-pulse-wrapper');
          const blurContainer = document.getElementById('blur-container');

          loadingSpinner.style.display = 'none';
          blurContainer.style.display = 'none';
          profileContent.style.display = "block";

          const fullName = data.name;
          const dateOfBirth = data.dob;
          const residence = data.residence;
          const department = data.department;
          const gender = data.gender;


          const fullNameElement = document.getElementsByClassName("name");
          const dateOfBirthElement = document.getElementById("dob");
          const genderElement = document.getElementById("gender");
          const residenceElement = document.getElementById('residence');
          const departmentElement = document.getElementById("dept");
          const usernameElement = document.getElementById("username");
          const userTypeElement = document.getElementById("userType");

          fullNameElement[0].textContent = fullName || "N/A";
          fullNameElement[1].textContent = fullName || "N/A";
          dateOfBirthElement.textContent = getIndianTime(dateOfBirth) || "N/A";
          residenceElement.textContent = residence || 'N/A';
          genderElement.textContent = gender || "N/A";
          departmentElement.textContent = department || "N/A";
          usernameElement.textContent = username || "N/A";
          userTypeElement.textContent = userType || "N/A";
        })
        .catch((error) => {
          console.error("Error:", error);
        });
    } else {
      console.error("Username not found in session storage");
    }
  </script>
</body>

</html>