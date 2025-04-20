<?php
include "db_connection.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate inputs
    $id = intval($_POST['id']);  // Prevent SQL injection
    $surname = $_POST['surname'] ?? '';
    $fname = $_POST['first_name'] ?? '';
    $lname = $_POST['last_name'] ?? '';
    $dob = $_POST['dob'] ?? '';
    $gender = $_POST['gender'] ?? '';
    $nationality = $_POST['nationality'] ?? '';
    $state = $_POST['state'] ?? '';
    $lga = $_POST['lga'] ?? '';
    $admission = $_POST['admission_number'] ?? '';
    $hostel = $_POST['hostel'] ?? '';

    $check_sql = "SELECT * FROM hostel_management WHERE admission_number = '$admission'";
    $check_result = $conn->query($check_sql);

    if ($check_result->num_rows > 0) {
        echo "duplicate";
        exit;
    }

    // Prepare statement to prevent SQL injection
    $stmt = $conn->prepare("UPDATE hostel_management SET 
        surname = ?, 
        first_name = ?, 
        last_name = ?, 
        date_of_birth = ?, 
        gender = ?, 
        nationality = ?, 
        state_of_origin = ?, 
        lga = ?, 
        admission_number = ?, 
        hostel = ?
        WHERE id = ?");

    $stmt->bind_param(
        "ssssssssssi",
        $surname,
        $fname,
        $lname,
        $dob,
        $gender,
        $nationality,
        $state,
        $lga,
        $admission,
        $hostel,
        $id
    );

    if ($stmt->execute()) {
        echo "success";
    } else {
        echo "error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
