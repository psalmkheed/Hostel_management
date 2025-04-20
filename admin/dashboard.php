<?php

include "../components/db_connection.php";
include "../components/head.php";
?>

<head>
    <style>
        span {
            font-size: 60px;
            text-align: left;
            color: #000;
        }
    </style>

</head>
<div class="text-dark bg-success-subtle border-start border-success border-5 p-2 mb-2" id="dashboard">

    <h4>Dashboard Overview</h4>
</div>

<section class=" cards">
    <div class="card" style="font-size: 24px;">Number of Students: <br>
        <span>
            <?php
            $sql = "SELECT COUNT(*) as total FROM hostel_management";
            $result = $conn->query($sql);

            if ($result) {
                $row = $result->fetch_assoc();
                echo $row['total'];
            } else {
                echo "Error" . $conn->error;
            }
            $conn->close();
            ?>
        </span>
    </div>
    <div class="card">Sales: ₦45,000</div>
    <div class="card">Messages: 10</div>
</section>