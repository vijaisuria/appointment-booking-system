<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student/Staff MIT-HC</title>
    <link rel="stylesheet" href="./css/user.css">
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
</head>
<body>
  <?php
      include 'navbar.php';
  ?>
  <section>
    <div class="container">
      <div class="user signinBx">
        <div class="imgBx"><img src="./images/mit-hc-logo-1.jpg" alt="" /></div>
        <div class="formBx">
          <form action="#" method="POST" onsubmit="login(event);">
            <h2>Sign In</h2>
            <input type="text" name="registerNumber" placeholder="Username" required />
            <input type="password" name="password" placeholder="Password" required />
            <input type="submit" value="Login" />
            <p class="signup">
              Don't have an account?
              <a href="#" onclick="toggleForm();">Sign Up.</a>
            </p>
          </form>
        </div>
      </div>
      <div class="user signupBx">
        <div class="formBx">
          <form action="#" method="POST" onsubmit="signup(event);">
            <h2>Create an account</h2>
            <input type="text" name="username" placeholder="Username" required />
            <input type="email" name="email" placeholder="Email Address" required />
            <input type="password" name="password" placeholder="Create Password" required />
            <input type="password" name="confirm_password" placeholder="Confirm Password" required />
            <input type="submit" value="Sign Up" />
            <p class="signup">
              Already have an account?
              <a href="#" onclick="toggleForm();">Sign in.</a>
            </p>
          </form>
        </div>
        <div class="imgBx"><img src="http://www.health-centre.mitindia.edu/health_centre/hel15.jpg" alt="" /></div>
      </div>
    </div>
  </section>
  <script>
    const toggleForm = () => {
        const container = document.querySelector('.container');
        container.classList.toggle('active');
    };

    const handleResponse = async (response) => {
      const data = await response.json();
      if (response.ok) {
        sessionStorage.setItem('registerNumber', data.student.registerNumber);
        window.location.href = 'home.php';

        alert('logged in successfully!');
      } else {
        // Show error message
        alert(data.error);
      }
    };

    const signup = async (event) => {
      event.preventDefault();
      const form = event.target;
      const formData = new FormData(form);

      try {
        const response = await fetch('https://helth-center-api.onrender.com/api/students', {
          method: 'POST',
          body: formData,
        });
        await handleResponse(response);
      } catch (error) {
        console.error('Error:', error);
      }
    };

    const login = async (event) => {
      event.preventDefault();
      const form = event.target;

      const username = form.querySelector('input[name="registerNumber"]').value;
      const password = form.querySelector('input[name="password"]').value;

      const data = {
        registerNumber: username,
        password: password
      };

      try {
        const response = await fetch('https://helth-center-api.onrender.com/api/students/login', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json'
          },
          body: JSON.stringify(data)
        });
        console.log(response);
        await handleResponse(response);
      } catch (error) {
        console.error('Error:', error);
      }
    };
  </script>
</body>
</html>
