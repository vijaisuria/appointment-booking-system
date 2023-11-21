<?php
session_start();
if (isset($_SESSION['registerNumber'])) {
    header("Location: home.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student/Staff MIT-HC</title>
    <link rel="stylesheet" href="assets/css/user.css">
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
            background-image: url('assets/images/mit-hc.jpg');
            background-size: cover;
            background-position: center;
            width: 100%;
            height: 100%;
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

        .error-input {
            border: 1px red solid !important;
        }

        .error-msg {
            color: red !important;
            font-size: 12px;
        }

        #err-pwd,
        #err-reg {
            display: none;
        }
    </style>
    <script>
        sessionStorage.clear();
    </script>
</head>

<body>
    <?php
    include 'includes/navbar.php';
    ?>
    <section>
        <?php
        if (isset($_SESSION['redirectAlert'])) {
            // Display the alert if the redirectAlert session variable is set
            echo '
            <div class="alert alert-danger alert-dismissible fade show w-lg-25 float-end"
            style="z-index: 999; position: fixed; top: 10px !important; right: 10px !important;">
                <strong>Error!</strong> Please login to acces the page
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        ';
            unset($_SESSION['redirectAlert']); // Unset the variable after displaying the alert
        }
        ?>
        <!-- Modal -->
        <div class="modal fade" id="loginGuide" tabindex="-1" aria-labelledby="loginGuide" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="loginGuide">Login Guide</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Your username will be your registration number, for example, <strong>2021503568</strong>. <br />
                        Initially, your password will be your date of birth in the format (<strong>YYYY-MM-DD</strong>).
                        <br />
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="newUser" tabindex="-1" aria-labelledby="newUser" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="newUser">New Registration Request</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Your username will be your registration number, for example, <strong>2021503568</strong>. <br />
                        Initially, your password will be your date of birth in the format (<strong>YYYY-MM-DD</strong>).
                        <br />
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <!--  redirect to www.google.com-->
                        <button type="button" class="btn btn-primary"
                            onclick="window.location.href = 'https://health-center.vercel.app/register';'">Register</button>
                    </div>
                </div>
            </div>
        </div>

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
                <div class="imgBx"><img src="assets/images/mit-hc-logo-1.jpg" alt="" /></div>
                <div class="formBx">
                    <form action="actions/student_auth.php" method="POST">
                        <h2>Student Sign In</h2>
                        <input type="text" name="registerNumber" id="err-in-reg" placeholder="Username" required />
                        <span class="error-msg" id="err-reg">
                            Student not registered!
                        </span>
                        <input type="password" name="password" id="err-in-pwd" placeholder="Password" required />
                        <span class="error-msg" id="err-pwd">
                            Invalid Password
                        </span>

                        <select name="loginType" id="loginType">
                            <option value="UG">UG</option>
                            <option value="PG">PG</option>
                            <option value="PHD">PHD</option>
                        </select>
                        <p style="font-size: 12px; color: red; cursor: pointer;" data-bs-toggle="modal"
                            data-bs-target="#loginGuide">
                            Having trouble logging in?
                            <span style="padding: 0; margin: 0">
                                <img style="width: 20px; height: 20px" src="assets/images/help.png" alt="">
                            </span>
                        </p>
                        <input type="submit" value="Login" />

                        <p class="signup">
                            Are you a staff?
                            <a href="#" onclick="toggleForm();">Staff login.</a>
                        </p>

                        <p class="signup" style="cursor: pointer;">New user? <span data-bs-toggle="modal"
                                data-bs-target="#newUser">Click here
                                to know more</span></p>
                    </form>
                </div>
            </div>
            <div class="user signupBx">
                <div class="formBx">
                    <form action="actions/staff_auth.php" method="POST">
                        <h2>Staff Sign In</h2>
                        <input type="text" name="username" placeholder="Username" required />
                        <input type="email" name="email" placeholder="Email Address" required />
                        <input type="password" name="password" placeholder="Password" required />
                        <input type="submit" value="Login" />
                        <p class="signup">
                            Are you a student?
                            <a href="#" onclick="toggleForm();">Student login.</a>
                        </p>
                    </form>
                </div>
                <div class="imgBx"><img src="assets/images/mit-hc-logo-1.jpg" alt="" />
                </div>
            </div>
        </div>
        </div>

    </section>


    <script>
        const toggleForm = () => {
            const container = document.querySelector('.container');
            container.classList.toggle('active');
        };



        document.addEventListener('DOMContentLoaded', function () {
            var hasError = <?php echo (isset($_SESSION['alert'])) ? 'true' : 'false'; ?>;

            if (hasError) {
                const error = <?php echo $_SESSION['alert']; ?>;
                if (error == '1') {
                    document.getElementById('err-reg').style.display = 'block';
                    document.getElementById('err-in-reg').classList.add('error-input');
                }
                else if (error == '2') {
                    document.getElementById('err-in-pwd').classList.add('error-input');
                    document.getElementById('err-pwd').style.display = 'block';
                }
            }
        });
    </script>
    <?php
    unset($_SESSION['alert']);
    ?>
</body>

</html>