<?php
include "components/db_connection.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Admin Login Page</title>
  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
    crossorigin="anonymous" />

  <!-- DataTables CSS -->
  <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">

  <!-- Bootstrap Bundle JS (includes Popper.js) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- AJAX CDN  -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <style>
    /* Spinner Styles */
    .spinner {
      width: 30px;
      height: 30px;
      border: 4px solid #ccc;
      border-top: 4px solid #3498db;
      border-radius: 50%;
      animation: spin 0.8s linear infinite;
      display: inline-block;
    }

    @keyframes spin {
      to {
        transform: rotate(360deg);
      }
    }

    #formLoader {
      display: none;
      text-align: center;
      margin-top: 10px;
    }

    /* Custom Alert Styles */
    #customAlert {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.6);
      z-index: 9999;
    }

    .alertBox {
      padding: 25px 20px;
      border-radius: 12px;
      width: 320px;
      margin: 120px auto;
      text-align: center;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
      position: relative;
      background: #fff;
      animation: popIn 0.3s ease-in-out;
    }

    @keyframes popIn {
      from {
        transform: scale(0.8);
        opacity: 0;
      }

      to {
        transform: scale(1);
        opacity: 1;
      }
    }

    .alertIcon {
      font-size: 40px;
      display: block;
      margin-bottom: 10px;
    }

    .alertTitle {
      font-size: 18px;
      font-weight: bold;
      margin-bottom: 5px;
    }

    .alertText {
      font-size: 16px;
      color: #333;
      margin-bottom: 20px;
    }

    #closeAlert {
      padding: 8px 20px;
      background: #333;
      color: #fff;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      font-weight: bold;
    }

    #closeAlert:hover {
      opacity: 0.8;
    }

    /* Alert type color themes */
    .success .alertTitle {
      color: #27ae60;
    }

    .error .alertTitle {
      color: #e74c3c;
    }

    .warning .alertTitle {
      color: #f39c12;
    }

    .info .alertTitle {
      color: #3498db;
    }

    h1:hover {
      color: blue;
    }

    /* Basic styling for the form */
    form {
      max-width: 400px;
      /* margin: auto; */
      padding: 20px;
      text-align: center;
      border: 1px solid red;
    }

    form input,
    form button {
      padding: 10px;
      margin: 5px;
      width: 80%;
      box-sizing: border-box;
    }
  </style>
</head>

<body>

  <!-- Registration Form -->
  <div class="container-fluid d-flex justify-content-center align-content-center">
    <form id="registerForm" action="signin.php" method="POST">
      <h1 style="text-align:center;"><strong>Admin</strong> Login</h1>
      <input type="text" name="userId" placeholder="User ID" required>
      <input type="password" name="pswrd" placeholder="Password" required>
      <button type="submit" name="login">Login</button>
    </form>

  </div>

  <!-- Loading Spinner -->
  <div id="formLoader">
    <div class="spinner"></div>
  </div>

  <!-- Custom Alert Box -->
  <div id="customAlert">
    <div class="alertBox">
      <span class="alertIcon"></span>
      <h3 class="alertTitle"></h3>
      <p class="alertText"></p>
      <button id="closeAlert">OK</button>
    </div>
  </div>


  <!-- <script>
    // Custom Alert Function (with title, message, type, auto-close, and duration)
    $(document).ready(function() {
      $("#closeAlert").click(function() {
        $("#customAlert").fadeOut();
      });

      window.showCustomAlert = function(title, message, type = "info", autoClose = true, duration = 3000) {
        let icon = "ℹ️";
        let bgClass = "info";

        if (type === "success") {
          icon = "✅";
          bgClass = "success";
        } else if (type === "error") {
          icon = "❌";
          bgClass = "error";
        } else if (type === "warning") {
          icon = "⚠️";
          bgClass = "warning";
        }

        // Reset previous styles and apply new ones
        $(".alertBox").removeClass("success error warning info").addClass(bgClass);
        $(".alertTitle").text(title);
        $(".alertText").text(message);
        $(".alertIcon").html(icon);
        $("#customAlert").fadeIn();

        // Auto-close after duration (if enabled)
        if (autoClose) {
          setTimeout(function() {
            $("#customAlert").fadeOut();
          }, duration);
        }
      };
    });

    // AJAX Form Submission with Spinner and Disabled Submit Button
    $(document).ready(function() {
      $("#registerForm").submit(function(e) {
        e.preventDefault(); // Prevent page reload

        var formData = $(this).serialize();
        var $submitBtn = $("#registerForm button[type='submit']");
        var originalText = $submitBtn.text();

        $("#formLoader").show(); // Show the spinner
        $submitBtn.prop("disabled", true).text("Please wait...");

        $.ajax({
          type: "POST",
          url: "signin.php", // Ensure your PHP file is at this URL
          data: formData,
          success: function(response) {
            $("#formLoader").hide(); // Hide spinner
            $submitBtn.prop("disabled", false).text(originalText); // Re-enable button

            // Expecting "success" if registration was successful
            if (response.trim() === "success") {
              showCustomAlert("Success!", "Registration Successful", "success", true, 3000);
              $("#registerForm")[0].reset();
            } else {
              showCustomAlert("Error!", response, "error", false);
            }
          },
          error: function() {
            $("#formLoader").hide();
            $submitBtn.prop("disabled", false).text(originalText);
            showCustomAlert("Error!", "Something went wrong.", "error", false);
          }
        });
      });
    });
  </script> -->
</body>

</html>