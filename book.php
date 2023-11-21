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
    <title>Home | MIT-HC</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@500&family=Poppins&display=swap');

        body {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            background-color: goldenrod;
            font-family: 'Montserrat', sans-serif;
        }

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
            position: absolute;
            z-index: 1000;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .form-header {
            font-family: Georgia, sans-serif;
        }

        .form-container {
            padding: 1rem;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: wheat;
        }

        form {
            max-width: 768px;
            background-color: #fff;
            padding: 2rem;
            border: 1px solid #ccc;
        }

        @media screen and (max-width: 768px) {
            .form-container {
                height: auto;
                margin: 1rem 0;
            }

            form {
                padding: 1rem;

            }
        }
    </style>
</head>

<body>
    <?php
    include 'includes/navbar.php';
    include_once './config/dbconnection.php';
    ?>
    <div id="spinner-container">
        <div id='css3-spinner-svg-pulse-wrapper'>
            <svg id='css3-spinner-svg-pulse' version='1.2' height='210' width='550' xmlns='http://www.w3.org/2000/svg'
                viewport='0 0 60 60' xmlns:xlink='http://www.w3.org/1999/xlink'>
                <path id='css3-spinner-pulse' stroke='#DE6262' fill='none' stroke-width='2' stroke-linejoin='round'
                    d='M0,90L250,90Q257,60 262,87T267,95 270,88 273,92t6,35 7,-60T290,127 297,107s2,-11 10,-10 1,1 8,-10T319,95c6,4 8,-6 10,-17s2,10 9,11h210' />
            </svg>
        </div>
    </div>
    <div class="container form-container">
        <form action="process_form.php" method="post">
            <h2 class="text-primary form-header">Doctor Appointment Booking</h2>
            <div class=" row">
                <div class="form-group col-lg-6 col-12">
                    <label for="registerNumber">Register Number:</label>
                    <input type="text" class="form-control mb-3" id="registerNumber" name="registerNumber" required
                        value=<?php echo $_SESSION["registerNumber"] ?> readonly>
                </div>
                <div class="form-group col-lg-6 col-12">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control mb-3" id="name" name="name" placeholder="Your name" required>
                </div>
                <div class="form-group col-lg-6 col-12">
                    <label>Communication Mail Id: </label>
                    <input type="email" class="form-control mb-3" placeholder="Your maild id" value="">
                </div>
                <div class="form-group col-lg-6 col-12">
                    <label>Date of Appointment: </label>
                    <input type="date" class="form-control mb-3" id="appointmentDate" placeholder="Date of Appointment">
                </div>
                <div class="form-group col-lg-6 col-12">
                    <label for="speciality">Speciality:</label>
                    <select class="form-control mb-3" id="speciality" name="speciality" required>
                        <!-- Options will be dynamically loaded here -->
                    </select>
                </div>
                <div class="form-group col-lg-6 col-12">
                    <button type="button" id="checkSlots" class="btn btn-success w-100 mt-4" style="height: 36px">Check
                        Slots</button>
                </div>
                <!--
                <div class="form-group col-lg-6 col-12">
                    <label for="appointmentTime">Select Time Slot:</label>
                    <select class="form-control mb-3" id="appointmentTime" name="appointmentTime" required>
                        <option value="1">4:00 PM - 4:15 PM</option>
                        <option value="2">4:15 PM - 4:30 PM</option>
                        <option value="3">4:30 PM - 4:45 PM</option>
                        <option value="4">4:45 PM - 5:00 PM</option>
                        <option value="5">5:00 PM - 5:15 PM</option>
                        <option value="6">5:15 PM - 5:30 PM</option>
                        <option value="7">5:30 PM - 5:45 PM</option>
                        <option value="8">5:45 PM - 6:00 PM</option>
                    </select>
                </div>
    -->
                <div class="form-group col-lg-6 col-12">
                    <label for="appointmentTime">Select Time Slot:</label>
                    <select class="form-control mb-3" id="appointmentTime" name="appointmentTime" required>
                        <!-- Available time slots will be populated here -->
                    </select>
                </div>
                <div class="form-group col-lg-6 col-12">
                    <label for="issueType">Issue Type:</label>
                    <select class="form-control mb-3" id="issueType" name="issueType" required>
                        <option value="Consultation">Consultation</option>
                        <option value="Procedure">Procedure</option>
                        <!-- Add more issue type options here -->
                    </select>
                </div>
                <div class="form-group col-lg-6 col-12">
                    <label for="issueType">Service Required</label>
                    <select class="form-control mb-3" id="issueType" name="issueType" required>
                        <option value="Consultation">Consultation</option>
                        <option value="Procedure">Procedure</option>
                        <!-- Add more issue type options here -->
                    </select>
                </div>

            </div>
            <p class="fs-6">Note: This appointment time is only applicable for consultations. Procedure and
                treatment schedules
                may
                differ. Priority will be given to booked patients and patients with emergencies.</p>
            <div class="mb-3 form-check">
                <input type="checkbox" checked required class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">I accept the <a href="">terms and
                        conditions</a></label>
            </div>
            <button type="submit" class="btn btn-primary">Book Appointment</button>

    </div>
    </form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function () {
            $('#appointmentDate').change(function () {
                var selectedDate = $(this).val();
                console.log(selectedDate);

                $.ajax({
                    type: 'POST',
                    url: 'actions/fetch_specialist.php', // Update the URL to your PHP file handling the backend logic
                    data: {
                        appointmentDate: selectedDate
                    },
                    success: function (response) {
                        $('#speciality').html(response); // Update the dropdown with fetched specialists
                        console.log(response);
                    }
                });
            });
        });
    </script>
    <script>
        // Get the input element
        const appointmentDateInput = document.getElementById('appointmentDate');

        // Set today's date as the minimum date for selection
        const minDate = new Date();
        minDate.setDate(minDate.getDate() + 2); // Set minimum date as two days ahead

        // Format the minimum date as YYYY-MM-DD for input field
        const minDateFormatted = minDate.toISOString().split('T')[0];
        appointmentDateInput.setAttribute('min', minDateFormatted);

        // Function to check if a date is a Sunday
        function isSunday(date) {
            const selectedDate = new Date(date);
            return selectedDate.getDay() === 0; // Sunday is represented by 0 in JavaScript Date object
        }

        // Add event listener for date change
        appointmentDateInput.addEventListener('change', function () {
            const selectedDate = appointmentDateInput.value;

            // Check if the selected date is a Sunday
            if (isSunday(selectedDate)) {
                alert("Sundays are not available for appointments. Please choose another date.");
                appointmentDateInput.value = ''; // Reset the value if it's a Sunday
            }
        });
    </script>
    <script>
        $(document).ready(function () {
            $('#checkSlots').click(function () {
                const registerNumber = $('#registerNumber').val();
                const selectedDate = $('#appointmentDate').val();
                const selectedSpeciality = $('#speciality').val();

                // AJAX request to check for existing booking on the same day
                $.ajax({
                    type: 'POST',
                    url: 'actions/check_existing_booking.php', // Update the URL to your PHP file for checking existing booking
                    data: {
                        registerNumber: registerNumber,
                        selectedDate: selectedDate
                    },
                    success: function (response) {
                        if (response === 'exists') {
                            alert('You already have a booking on this day.');
                        } else {
                            // Proceed to fetch available time slots
                            $.ajax({
                                type: 'POST',
                                url: 'actions/fetch_available_slots.php', // Update the URL to your PHP file for fetching available slots
                                data: {
                                    selectedDate: selectedDate,
                                    selectedSpeciality: selectedSpeciality
                                },
                                success: function (slots) {
                                    console.log(slots);
                                    $('#appointmentTime').html(slots); // Populate available time slots
                                }
                            });
                        }
                    }
                });
            });
        });
    </script>

</body>

</html>