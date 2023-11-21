<?php
include_once '../config/dbconnection.php';
if (isset($_POST['appointmentDate'])) {
    $selectedDate = $_POST['appointmentDate'];

    // Perform necessary validation and sanitation on $selectedDate

    // Fetch the day name from the selected date
    $selectedDay = date('l', strtotime($selectedDate));

    // Query to fetch available specialists for the selected day
    $query = "SELECT DISTINCT speciality FROM doctor_visits WHERE day = '$selectedDay'";

    // Perform the query
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        // Start constructing the options for the dropdown
        $options = '<option value="">Select Specialty</option>';

        // Append options based on the fetched data
        while ($row = $result->fetch_assoc()) {
            $options .= '<option value="' . $row['speciality'] . '">' . $row['speciality'] . '</option>';
        }

        // Output the constructed options
        echo $options;
    } else {
        // No specialties found for the selected date
        echo '<option value="">No specialties available</option>';
    }
} else {
    // If the POST variable is not set
    echo '<option value="">Invalid request</option>';
}
?>