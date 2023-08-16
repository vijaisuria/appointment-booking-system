<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>User Profile</title>
    <link rel="stylesheet" href="./css/profile.css" />
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
        font-size: 50px;
      }

      @keyframes heartbeat {
        0%,
        100% {
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

    <div class="container" id="profileContent">
      <div class="main-body">
        <div class="row gutters-sm">
          <div class="col-md-4 mb-3">
            <div class="card">
              <div class="card-body">
                <div class="d-flex flex-column align-items-center text-center">
                  <img
                    src="https://bootdey.com/img/Content/avatar/avatar7.png"
                    alt="Admin"
                    class="rounded-circle"
                    width="150"
                  />
                  <div class="mt-3">
                    <h4>John Doe</h4>
                    <p class="text-secondary mb-1">Full Stack Developer</p>
                    <p class="text-muted font-size-sm">
                      Bay Area, San Francisco, CA
                    </p>
                    <button class="btn btn-primary">Follow</button>
                    <button class="btn btn-outline-primary">Message</button>
                  </div>
                </div>
              </div>
            </div>

            <div class="card h-50 my-3">
              <div class="card-body">
                <div class="row">
                  <div
                    class="alert alert-info alert-dismissible fade show"
                    role="alert"
                  >
                    First time your password will be your DOB (ddmmyyy)
                    <button
                      type="button"
                      class="btn-close"
                      data-bs-dismiss="alert"
                      aria-label="Close"
                    ></button>
                  </div>
                </div>
                <form>
                  <div class="row">
                    <div class="form-group">
                      <label for="password">Password</label>
                      <input
                        type="password"
                        class="form-control"
                        id="password"
                        placeholder="Enter password"
                      />
                      <small
                        id="passworderror"
                        class="form-text text-muted"
                      ></small>
                    </div>
                  </div>

                  <div class="row mt-2">
                    <div class="form-group">
                      <label for="condirmPassword">Confirm Password</label>
                      <input
                        type="text"
                        class="form-control"
                        id="condirmPassword"
                        placeholder="Retype Password"
                      />
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
                    <div class="col-sm-9 text-secondary" id="name"></div>
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
                      <h6 class="mb-0">Date of Birth</h6>
                    </div>
                    <div class="col-sm-9 text-secondary" id="dob"></div>
                  </div>
                  <hr />
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Reesidence</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      Hosteller / Dayscholar
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
      const username = sessionStorage.getItem("registerNumber");
      const profileContent = document.getElementById("profileContent");

      profileContent.style.display = "none";

      const getIndianTime = (date) => {
        const utcDate = new Date(date);
        if (isNaN(utcDate)) return "";
        const utcOffset = 5.5; // India's UTC offset is 5 hours and 30 minutes ahead of UTC.
        const indianTime = new Date(
          utcDate.getTime() + utcOffset * 60 * 60 * 1000
        );
        return (
          indianTime.toISOString().slice(0, 10) +
          " " +
          indianTime.toLocaleTimeString()
        );
      };

      if (username) {
        const apiUrl = `http://localhost:5000/api/students/reg/${username}`;

        fetch(apiUrl)
          .then((response) => response.json())
          .then((data) => {
            console.log("Success:", data);
            const loadingContainer =
              document.querySelector(".loading-container");
            loadingContainer.style.display = "none";
            profileContent.style.display = "block";

            const fullName = data.name; 
            const dateOfBirth = data.dob; 
            // const residence = data.residence; 
            const department = data.department;


            const fullNameElement = document.getElementById("name");
            const dateOfBirthElement = document.getElementById("dob");
            // const residenceElement = document.getElementById('name');
            const departmentElement = document.getElementById("dept");
            const usernameElement = document.getElementById("username");

            fullNameElement.textContent = fullName || "N/A";
            dateOfBirthElement.textContent = dateOfBirth || "N/A";
            // residenceElement.textContent = residence || 'N/A';
            departmentElement.textContent = department || "N/A";
            usernameElement.textContent = username || "N/A";
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
