<?php
include_once '../config/dbconnection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['selectedDate']) && isset($_POST['selectedSpeciality'])) {
    $selectedDate = $_POST['selectedDate'];
    $selectedSpeciality = $_POST['selectedSpeciality'];

    // Query to fetch available time slots for the selected date and speciality
    $query = "SELECT visit_start_time, visit_end_time FROM doctor_visits 
                WHERE day = DAYNAME('$selectedDate') AND speciality = '$selectedSpeciality'";

    // Execute the query
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        // Construct options for available time slots
        $slots = '';
        while ($row = $result->fetch_assoc()) {
            $startTime = $row['visit_start_time'];
            $endTime = $row['visit_end_time'];
            $slots .= "<option value='$startTime-$endTime'>$startTime - $endTime</option>";
        }
        echo $slots; // Return available time slots as options for the dropdown
    } else {
        echo "<option value=''>No slots available</option>";
    }
} else {
    echo "<option value=''>Invalid request</option>";
}
?>