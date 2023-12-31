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

        // Console log the bookedSlots array
        echo "<script>console.log(" . json_encode($bookedSlots) . ");</script>";



        $output = ''; // To store the generated HTML content

        while ($slotRow = $availableSlotsResult->fetch_assoc()) {
            $slot = $slotRow['slots'];
            $startTime = $slotRow['start_time'];
            $endTime = $slotRow['end_time'];

            $timeSlot = "$startTime - $endTime";

            // Check if the slot is booked or available
            if (in_array($slot, $bookedSlots)) {
                $output .= "<div class='col-md-4'>
                        <div class='slot-card not-available'>$timeSlot</div>
                    </div>";
            } else {
                // Slot is available
                $output .= "<div class='col-md-4'>
                        <div class='slot-card available'>$timeSlot</div>
                    </div>";
            }
        }

        echo $output;


    } else {
        echo "<div class='col-md-4'>
                        <div class='slot-card high-demand'>No slot available</div>
                    </div>";
    }
} else {
    echo "<div class='col-md-4'>
                        <div class='slot-card high-demand'>Invlaid Request</div>
                    </div>";
}
?>