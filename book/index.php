<!DOCTYPE html>
<html lang="en">

<head>
  <title>MIT-HC</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css" />
  <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css" />
  <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css" />
  <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css" />
  <link rel="stylesheet" type="text/css" href="vendor/countdowntime/flipclock.css" />
  <link rel="stylesheet" type="text/css" href="css/util.css" />
  <link rel="stylesheet" type="text/css" href="css/main.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
    crossorigin="anonymous"></script>

</head>

<body>
  <nav class="navbar navbar-expand-lg bg-primary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <img src="./images/mit-hc-logo.png" alt="Logo" width="40" height="40" class="d-inline-block align-top">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav me-auto">
          <li class="nav-item ">
            <a class="nav-link text-light" href="../home.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="../bookings.php">Appointments</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="#">Book</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="#" id="prescription">Prescriptions</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="../profile.php">Profile</a>
          </li>
        </ul>
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link text-light" id="loginLink" href="../">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" id="logoutLink" href="#">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="bg-img1 size1 overlay1 p-t-24" style="background-image: url('images/bg01.jpg')">
    <div class="flex-w flex-sb-m p-l-80 p-r-74 p-b-175 respon5">
      <div class="wrappic1 m-r-30 m-t-10 m-b-10">

      </div>

      <div class="flex-w m-t-10 m-b-10">

      </div>
    </div>

    <div class="flex-w flex-sa p-r-200 respon1">
      <div class="bg0 wsize1 bor1 p-l-45 p-r-45 p-t-50 p-b-18 p-lr-15-sm">
        <h3 class="l1-txt3 txt-center p-b-43">APPOINTMENT FORM</h3>

        <form class="w-full validate-form" id="appointmentForm">
          <div class="wrap-input100 validate-input m-b-10" data-validate="Name is required">
            <input class="input100 placeholder0 s1-txt1" type="text" name="username" value="" disabled />
            <span class="focus-input100"></span>
          </div>

          <div class="wrap-input100 validate-input m-b-10" data-validate="Name is required">
            <input class="input100 placeholder0 s1-txt1" type="text" name="name" placeholder="Name" />
            <span class="focus-input100"></span>
          </div>

          <div class="wrap-input100 validate-input m-b-20" data-validate="Valid email is required: ex@abc.xyz">
            <input class="input100 placeholder0 s1-txt1" type="text" name="email" placeholder="Email" />
            <span class="focus-input100"></span>
          </div>

          <button type="submit" class="flex-c-m size2 s1-txt2 how-btn1 trans-04">
            BOOK NOW!
          </button>
        </form>


        <p class="s1-txt3 txt-center p-l-15 p-r-15 p-t-25">
          And don’t worry, we hate spam too! You can unsubcribe at anytime.
        </p>
      </div>
      <div class="p-t-34 p-b-60 respon3">
        <p class="l1-txt1 p-b-10 respon2">Our website is</p>

        <h3 class="l1-txt2 p-b-45 respon2 respon4">Coming Soon</h3>

        <div class="cd100"></div>
      </div>


    </div>
  </div>

  <script>
    const loginLink = document.getElementById('loginLink');
    const logoutLink = document.getElementById('logoutLink');
    const prescriptionLink = document.getElementById('prescription');

    const registerNumber = sessionStorage.getItem('registerNumber');


    logoutLink.addEventListener('click', () => {
      sessionStorage.removeItem('registerNumber');
      window.location.href = '../';
    });

    prescriptionLink.addEventListener('click', () => {
      const registerNumber = sessionStorage.getItem('registerNumber');
      window.location.href = `https://health-center.vercel.app/user/prescriptions/${registerNumber}`;
    });
  </script>

  <script src="vendor/jquery/jquery-3.2.1.min.js"></script>

  <script src="vendor/bootstrap/js/popper.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

  <script src="vendor/select2/select2.min.js"></script>

  <script src="vendor/countdowntime/flipclock.min.js"></script>
  <script src="vendor/countdowntime/moment.min.js"></script>
  <script src="vendor/countdowntime/moment-timezone.min.js"></script>
  <script src="vendor/countdowntime/moment-timezone-with-data.min.js"></script>
  <script src="vendor/countdowntime/countdowntime.js"></script>
  <script>
    $(".cd100").countdown100({
      endtimeYear: 2023,
      endtimeMonth: 9,
      endtimeDate: 29,
      endtimeHours: 10,
      endtimeMinutes: 0,
      endtimeSeconds: 0,
      timeZone: "",
    });
  </script>

  <script src="vendor/tilt/tilt.jquery.min.js"></script>
  <script>
    $(".js-tilt").tilt({
      scale: 1.1,
    });
  </script>
  <script>
    const appointmentForm = document.getElementById('appointmentForm');

    const username = sessionStorage.getItem('registerNumber');
    const usernameInput = appointmentForm.querySelector('input[name="username"]');
    usernameInput.value = username;

    appointmentForm.addEventListener('submit', async (event) => {
      event.preventDefault();

      const formData = new FormData(appointmentForm);
      const appointmentData = Object.fromEntries(formData.entries());

      try {
        const response = await fetch('http://localhost:5000/api/appointments', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json'
          },
          body: JSON.stringify(appointmentData)
        });

        if (response.ok) {
          alert('Appointment booked successfully!');
        } else {
          const data = await response.json();
          alert(data.error);
        }
      } catch (error) {
        console.error('Error:', error);
      }
    });
  </script>


  <script src="js/main.js"></script>
</body>

</html>