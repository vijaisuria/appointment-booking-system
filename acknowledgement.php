<?php
session_start();
if (!isset($_SESSION['registerNumber'])) {
    $_SESSION['redirectAlert'] = true;
    header("Location: index.php");
    exit();
}
?>
<html>
<?php
include_once 'config/dbconnection.php';
if (isset($_GET['appointmentId'])) {
    $appointmentId = $_GET['appointmentId'];
    $appointmentQuery = "SELECT * FROM appointment WHERE id = $appointmentId";
    $appointmentResult = $conn->query($appointmentQuery);

    if ($appointmentResult->num_rows > 0) {
        $appointmentDetails = $appointmentResult->fetch_assoc();
        $registerNumber = $appointmentDetails['registerNumber'];
        $patientName = $appointmentDetails['name'];
        $patientEmail = $appointmentDetails['email'];
        $speciality = $appointmentDetails['speciality'];
        $appointmentDate = $appointmentDetails['appointment_date'];
        $appointmentTimeSlot = $appointmentDetails['appointment_time_slot'];
        $status = $appointmentDetails['status'];
        $issue = $appointmentDetails['issue'];
        $details = $appointmentDetails['details'];
        $createdAt = $appointmentDetails['created_at'];
        $updatedAt = $appointmentDetails['updated_at'];
    } else {
        header("Location: home.php");
    }

    $registerNumber = $appointmentDetails['registerNumber'];
    $table = $appointmentDetails['category']; // [ug_student, pg_student, phd_student

    $studentQuery = "SELECT * FROM $table WHERE registerNumber = $registerNumber";
    $studentResult = $conn->query($studentQuery);

    if ($studentResult->num_rows > 0) {
        $studentDetails = $studentResult->fetch_assoc();
        $studentName = $studentDetails['name'];
        $studentDepartment = $studentDetails['department'];
        $studentPhone = $studentDetails['phone'];
        $studentEmail = $studentDetails['email'];
    } else {
        header("Location: home.php");
    }

} else {
    header("Location: home.php");
}
?>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Acknowledgement | MIT-HC</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css"
        integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>

    <link rel="stylesheet" href="assets/css/acknowledgement.css">
    <style>
        @media print {
            .receipt-main {
                width: 100%;
                margin: 0;
                padding: 0;
                font-size: 10px;
                line-height: 1.5;
            }
        }
    </style>
</head>

<body>
    <div class="col-md-12">
        <div class="row">

            <div class="receipt-main col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
                <div class="row">
                    <div class="receipt-header">
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="receipt-left">
                                <img class="img-responsive" alt="mit-hc" src="assets/images/mit-hc-logo.png"
                                    style="width: 71px; border-radius: 43px;">
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                            <div class="receipt-right">
                                <h5>Health Centre, MIT Campus</h5>
                                <p>044-2251 6193 <i class="fa fa-phone"></i></p>
                                <p>healthcentremit@gmail.com <i class="fa fa-envelope-o"></i></p>
                                <p>Chrompet, Chennai <i class="fa fa-location-arrow"></i></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="receipt-header receipt-header-mid">
                        <div class="col-xs-6 col-sm-6 col-md-6 text-left">
                            <div class="receipt-right">
                                <h5>Patient Details </h5>
                                <p><b>Name :</b>
                                    <?php echo $patientName ?>
                                </p>
                                <p><b>Mobile :</b>
                                    <?php echo $studentPhone ?>
                                </p>
                                <p><b>Email :</b>
                                    <?php echo $patientName ?>
                                </p>
                            </div>
                        </div>

                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="text-right">
                                <h3>APPOINTMENT RECIEPT</h3>
                                <p class="text-right app-id">#
                                    <?php echo $appointmentId ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>
                                    <img class="img-responsive" alt="mit-hc"
                                        src="https://t3.ftcdn.net/jpg/02/61/41/70/360_F_261417005_gOqg93fKEUMpMnS8TvUUIIDf2R0IGJcm.jpg"
                                        style="width: 35px; border-radius: 43px; display: inline; margin-x: 8px">
                                    Description
                                </th>
                                <th>Details</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Register Number</td>
                                <td>
                                    <?php echo $registerNumber; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Student/Staff Name</td>
                                <td>
                                    <?php echo $studentName; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Department</td>
                                <td>
                                    <?php echo $studentDepartment; ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="col-md-9">Category</td>
                                <td class="col-md-3">
                                    <?php echo $table; ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="col-md-9">Speciality</td>
                                <td class="col-md-3">
                                    <?php echo $speciality; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Appointment Date</td>
                                <td>
                                    <?php echo $appointmentDate; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Appointment Time Slot</td>
                                <td>
                                    <?php echo $appointmentTimeSlot; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Time Duration</td>
                                <td>
                                    <?php echo $appointmentTimeSlot; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Issue</td>
                                <td>
                                    <?php echo $issue; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Details</td>
                                <td>
                                    <?php echo $details; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Booked On</td>
                                <td>
                                    <?php echo $createdAt; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Status Updated At</td>
                                <td>
                                    <?php echo $updatedAt; ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!--
                <div class="row">
                    <div class="receipt-header receipt-header-mid receipt-footer">
                        <div class="col-xs-8 col-sm-8 col-md-8 text-left">
                            <div class="receipt-right">
                                <p><b>Current Date :</b> <span id="cdate"></span></p>
                                <p><b>Current Time :</b> <span id="ctime"></span></p>
                                <br>
                                <h5 style="color: green">Generated by Healthcare Software</h5>
                            </div>
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4">
                            <div class="receipt-left">
                                <h1>Stamp</h1>
                            </div>
                        </div>
                    </div>
                </div>
    -->
                <div class="footer">
                    <p class="quote">"Save paper, save tree, save earth!"</p>
                    <p class="credit">Developed by <a href="http://www.health-centre.mitindia.edu/team.html"
                            target="_blank" class="credit">MIT Health centre web team</a></p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>