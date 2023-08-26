
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
                        <a class="nav-link text-light" href="./home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="./bookings.php">Appointments</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="./book.php">Book</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#" id="prescription">Prescriptions</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="./profile.php">Profile</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-light" id="loginLink" href="./user.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" id="logoutLink" href="#">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="loading-container">
        <div class="heartbeat-icon">&hearts;</div>
    </div>

    <script>
        const loginLink = document.getElementById('loginLink');
        const logoutLink = document.getElementById('logoutLink');
        const prescriptionLink = document.getElementById('prescription');

        const registerNumber = sessionStorage.getItem('registerNumber');
        console.log(registerNumber);

        if (registerNumber) {
            loginLink.style.display = 'none';
        } else {
            logoutLink.style.display = 'none';
        }

        logoutLink.addEventListener('click', () => {
            sessionStorage.removeItem('registerNumber');
            window.location.href('./user.php');
        });

        prescriptionLink.addEventListener('click', () => {
            const registerNumber = sessionStorage.getItem('registerNumber');
            window.location.href = `https://health-center.vercel.app/user/prescriptions/${registerNumber}`;
        });
    </script>

