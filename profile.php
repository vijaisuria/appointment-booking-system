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
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>User Profile</title>
  <link rel="stylesheet" href="assets/css/profile.css" />
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
              <form id="passwordForm">
                <div class="row">
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Enter password" />
                    <small id="passworderror" class="form-text text-muted"></small>
                  </div>
                </div>

                <div class="row mt-2">
                  <div class="form-group">
                    <label for="confirmPassword">Confirm Password</label>
                    <input type="password" class="form-control" id="confirmPassword" placeholder="Retype Password" />
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
    document.getElementById('passwordForm').addEventListener('submit', function (event) {
      event.preventDefault();

      let password = document.getElementById('password').value;
      let confirmPassword = document.getElementById('confirmPassword').value;

      // Password validation
      if (password !== confirmPassword) {
        document.getElementById('passworderror').innerText = "Passwords do not match.";
        return;
      }

      // If passwords match, proceed with updating the password
      let registerNumber = "<?php echo $_SESSION['registerNumber']; ?>";

      fetch('actions/update_password.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `registerNumber=${registerNumber}&password=${password}`,
      })
        .then(response => {
          if (response.ok) {
            // Password updated successfully
            alert('Password updated successfully!');
            // You might want to redirect or perform additional actions here
          } else {
            // Handle update failure
            alert('Failed to update password.');
          }
        })
        .catch(error => {
          console.error('Error:', error);
        });
    });

  </script>
</body>

</html>