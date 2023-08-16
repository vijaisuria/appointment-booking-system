<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student/Staff MIT-HC</title>
    <link rel="stylesheet" href="./css/user.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</head>
<body>
  <section>

    <div class="container">
        <div
            class="toast align-items-center text-bg-success border-0"
            style="
            display: block !important;
            position: absolute;
            top: 2px;
            right: 2px;
        "
        role="alert"
        >
                <div class="d-flex">
                    <div class="toast-body">Hello, world! This is a toast message.</div>
                    <button
                    type="button"
                    class="btn-close btn-close-white me-2 m-auto"
                    data-bs-dismiss="toast"
                    aria-label="Close"
                    ></button>
                </div>
        </div>
      <div class="user signinBx">
        <div class="imgBx"><img src="./images/mit-hc-logo-1.jpg" alt="" /></div>
        <div class="formBx">
          <form action="#" method="POST" onsubmit="login(event);">
            <h2>Sign In</h2>
            <input type="text" name="username" placeholder="Username" required />
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
        
        alert(data.message);
      } else {
        
        alert(data.error);
      }
    };

    const signup = async (event) => {
      event.preventDefault();
      const form = event.target;
      const formData = new FormData(form);

      try {
        const response = await fetch('http://localhost:5000/api/students', {
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
      const formData = new FormData(form);

      try {
        const response = await fetch('http://localhost:5000/api/students/login', {
          method: 'POST',
          body: formData,
        });
        await handleResponse(response);
      } catch (error) {
        alert("Try again later!");
        console.error('Error:', error);
      }
    };
  </script>
</body>
</html>
