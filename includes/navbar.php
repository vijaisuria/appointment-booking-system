<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="assets/images/mit-hc-logo.png" alt="Logo" width="40" height="40" class="d-inline-block align-top">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item ">
                    <a class="nav-link text-light" href="./home.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="./booking-history.php">Appointments</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="./schedule.php">Book</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="#" id="prescription">Prescriptions</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="./profile.php">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="./feedback.php">Feedback</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <?php
                if (isset($_SESSION['registerNumber'])) {
                    // If the user is logged in, show the Logout link
                    echo '
                        <li class="nav-item">
                            <a class="nav-link text-light" id="logoutLink" href="actions/logout.php">Logout</a>
                        </li>';
                } else {
                    // If the user is not logged in, show the Login link
                    echo '
                        <li class="nav-item">
                            <a class="nav-link text-light" id="loginLink" href="./">Login</a>
                        </li>';
                }
                ?>
            </ul>
        </div>
    </div>
</nav>