<?php
include "components/db_connection.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    $userId = $_POST['userId'];
    $password = $_POST['pswrd'];

    $sql = "insert into user(userID, pswrd) values('$userId', '$password')";

    if ($conn->query($sql) === TRUE) {
        header('location: admin/index.php');
        exit;
    } else {
        echo "Database Error: " . $conn->error;
    }
}

$conn->close();
