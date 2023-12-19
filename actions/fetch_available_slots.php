<?php
include_once '../config/dbconnection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['selectedDate']) && isset($_POST['selectedSpeciality'])) {
    $selectedDate = $_POST['selectedDate'];
    $selectedSpeciality = $_POST['selectedSpeciality'];

    // Query to fetch available slots for the selected speciality and day from appointment_slots
    $availableSlotsQuery = "SELECT slots, start_time, end_time FROM appointment_slots 
                            WHERE speciality = '$selectedSpeciality' 
                            AND day = DAYNAME('$selectedDate')";

    // Execute the query to get available slots
    $availableSlotsResult = $conn->query($availableSlotsQuery);

    if ($availableSlotsResult->num_rows > 0) {
        $bookedSlotsQuery = "SELECT appointment_time_slot FROM appointment 
                            WHERE speciality = '$selectedSpeciality' 
                            AND appointment_date = '$selectedDate'";
        $bookedSlotsResult = $conn->query($bookedSlotsQuery);

        $bookedSlots = [];
        while ($row = $bookedSlotsResult->fetch_assoc()) {
            $bookedSlots[] = $row['appointment_time_slot'];
        }

        $options = [];
        while ($slotRow = $availableSlotsResult->fetch_assoc()) {
            $slot = $slotRow['slots'];
            $startTime = $slotRow['start_time'];
            $endTime = $slotRow['end_time'];

            if (!in_array($slot, $bookedSlots)) {
                $options[] = "<option value='$slot'>$startTime - $endTime</option>";
            }
        }

        if (empty($options)) {
            echo "<option value=''>No slots available</option>";
        } else {
            echo implode('', $options); // Return available slots as options for the dropdown
        }
    } else {
        echo "<option value=''>No slots available</option>";
    }
} else {
    echo "<option value=''>Invalid request</option>";
}
?>