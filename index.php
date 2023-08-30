<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student/Staff MIT-HC</title>
    <link rel="stylesheet" href="./css/user.css">
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
            position: relative;
            z-index: 1000;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .user {
            position: relative;
            z-index: 1;
        }

        section {
            background-image: url('./images/mit-hc.jpg');
            background-repeat: no-repeat;
            background-size: cover;
        }

        #blur-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            filter: blur(5px);
            display: none;
            z-index: 999;
        }
    </style>
</head>

<body>
    <?php
    include 'navbar.php';
    ?>
    <section>
        <div id="blur-container"></div>

        <div id="spinner-container">
            <div id='css3-spinner-svg-pulse-wrapper'>
                <svg id='css3-spinner-svg-pulse' version='1.2' height='210' width='550'
                    xmlns='http://www.w3.org/2000/svg' viewport='0 0 60 60' xmlns:xlink='http://www.w3.org/1999/xlink'>
                    <path id='css3-spinner-pulse' stroke='#DE6262' fill='none' stroke-width='2' stroke-linejoin='round'
                        d='M0,90L250,90Q257,60 262,87T267,95 270,88 273,92t6,35 7,-60T290,127 297,107s2,-11 10,-10 1,1 8,-10T319,95c6,4 8,-6 10,-17s2,10 9,11h210' />
                </svg>
            </div>
        </div>

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
                <div class="imgBx"><img src="http://www.health-centre.mitindia.edu/health_centre/hel15.jpg" alt="" />
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
                sessionStorage.setItem('registerNumber', data.student.registerNumber);
                window.location.href = 'home.php';
            } else {
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

            const loadingSpinner = document.getElementById('css3-spinner-svg-pulse-wrapper');
            const blurContainer = document.getElementById('blur-container');

            loadingSpinner.style.display = 'block';
            blurContainer.style.display = 'block';

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
            } finally {
                loadingSpinner.style.display = 'none';
                blurContainer.style.display = 'none'; // Hide the blur container
            }
        };

    </script>
</body>

</html>