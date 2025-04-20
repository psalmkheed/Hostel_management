
<?php
include "../components/db_connection.php";  // database connection
$surname = $_POST['surname'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$date_of_birth = $_POST['dob'];
$gender = $_POST['gender'];
$nationality = $_POST['nationality'];
$state_of_origin = $_POST['state'];
$lga = $_POST['lga'];
$admission_number = $_POST['admission'];
$hostel = $_POST['dorms'];

$check_sql = "SELECT * FROM hostel_management WHERE admission_number = '$admission_number'";
$check_result = $conn->query($check_sql);

if ($check_result->num_rows > 0) {
    echo "Admission Number Exist";
    exit;
}

if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
    $photo_id = $_FILES['photo']['name'];
    $tmpName = $_FILES['photo']['tmp_name'];
    $uploadDir = "uploads/";
    $targetPath = $uploadDir . basename($photo_id);

    // Create folder if not exists
    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, recursive: true);
    }

    if (move_uploaded_file($tmpName, $targetPath)) {
        // Save to database (adjust table name and columns)
        $sql = "insert into hostel_management(photo_id,surname,first_name,last_name,date_of_birth,gender,nationality,state_of_origin,lga,admission_number,hostel) Values('$photo_id','$surname','$fname','$lname','$date_of_birth',' $gender','$nationality','$state_of_origin','$lga','$admission_number', '$hostel')";

        if ($conn->query($sql) === TRUE) {
            echo "success";
        } else {
            echo "Database Error: " . $conn->error;
        }
    } else {
        echo "Failed to upload image";
    }
} else {
    echo "No photo uploaded";
}
$conn->close();
