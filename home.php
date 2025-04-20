<?php
include "db_connection.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="description" content="This website is designed just to test my ability in table creation, simple form and to develop my skills in javascript">
  <meta name="author" content="blaq media">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Student's Management Portal</title>
  <link href="assets/css/alert.css" rel="stylesheet">

  <!-- BOOTSTRAP CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <!-- FONTAWESOME -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<!-- AJAX CDN  -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<!-- This is an external css -->
<!-- <link href="assets/css/bootstrap.css" rel="stylesheet"> -->
<style>
  @import url('https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap');

  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Ubuntu", serif !important;
  }

  ::placeholder {
    font-size: 14px;
    font-style: italic;
  }

  .form-label {
    color: green;
  }

  .header {
    background: linear-gradient(#28a745, rgba(0, 0, 0, 0.9)),
      url(../assets/img/logo.png) repeat;
    background-color: #000;
    background-size: 200px;
    background-position: top right;
  }
</style>
</head>

<body>
  <!-- container Wrapper -->
  <div class="container ">
    <!-- Custom Alert Box -->
    <div id="customAlert">
      <div class="alertBox">
        <span class="alertIcon"></span>
        <h3 class="alertTitle"></h3>
        <p class="alertText"></p>
        <button id="closeAlert">OK</button>
      </div>
    </div>
    <!-- Header Wrapper -->
    <div class="text-center  py-2 mb-0 header">
      <img src="./assets/img/logo.png" style="width: 70px; height: 70px; margin-bottom: 10px;">
      <h2 class="text-white">HOSTEL MANAGEMENT PORTAL</h2>
      <em class="text-light"><small><strong>DO-ESTDOT…</strong> we build tomorrow’s leaders</small></em>
    </div>
    <div class="text-light bg-success p-2 my-1 d-flex align-items-center justify-content-center">
      <h4 class="mb-0">STUDENT REGISTRATION FORM</h4>
    </div>
    <!-- header wrapper ends here -->
    <!-- form starts here-->
    <form class="row border mx-0 border-success border-1 rounded-1 p-3 px-3" id="registerForm" enctype="multipart/form-data" autocomplete="off">

      <div id="imagePreview" style="margin: 10px; display: none; text-align: center;">
        <img id="previewImg" src="" alt="Image Preview" style="max-width: 200px; max-height: 200px;" />
      </div>
      <div class="text-center mb-4 py-5  rounded">
        <input type="file" name="photo" accept=".jpg" id="photo" required>

      </div>
      <div class=" col-lg-4 ">
        <div class=" mb-3">
          <label class="form-label">Surname</label>
          <input type="text" name="surname" class="form-control border-success-subtle border-success-subtle" placeholder="Enter Student's Surname" required>
        </div>

        <div class="mb-3">
          <label class="form-label">First Name</label>
          <input type="text" name="fname" class="form-control border-success-subtle" placeholder="Enter Student's First name" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Last Name</label>
          <input type="text" name="lname" class="form-control border-success-subtle" placeholder="Enter Student's Last name" required>
        </div>

      </div>
      <!-- col-sm-4 ending -->

      <!-- col-sm-4 starts here -->
      <div class="col-lg-4 ">
        <div class="mb-3">
          <label class="form-label">Date of Birth</label>
          <input type="date" name="dob" class="form-control border-success-subtle" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Gender</label> <br>
          <select class="form-select" id="gender" name="gender" required>

            <option value="" selected disabled>
              -- Select gender --
            </option>
            <option value="Male" name="Male">
              Male
            </option>
            <option value="Female" name="Female">
              Female
            </option>

          </select>
        </div>

        <div class="mb-3">
          <label class="form-label">Nationality</label>
          <input type="text" name="nationality" class="form-control border-success-subtle" placeholder="Nigeria, Ghana etc." required>
        </div>

        <div class="mb-3">
          <label class="form-label">Hostel</label><br>
          <select class="form-select form-control" name="dorms" required id="dorms">
            <option value="" selected disabled>
              -- Select Hostel --
            </option>
            <option value="Boys Hostel Regular">
              Boys Hostel Regular
            </option>
            <option value="Girls Hostel Regular">
              Girls Hostel Regular
            </option>
            <option value="Boys Hostel Special">
              Boys Hostel Special
            </option>
            <option value="Girls Hostel Special">
              Girls Hostel Special
            </option>
          </select>
        </div>
      </div>
      <!-- col-sm-4 ending -->


      <!-- col-sm-4 start -->
      <div class="col-lg-4 ">
        <div class="mb-3">
          <label class="form-label">State of Origin</label>
          <input type="text" name="state" class="form-control border-success-subtle" placeholder="Lagos, Ogun etc." required>
        </div>
        <div class="mb-3">
          <label class="form-label">L.G.A</label>
          <input type="text" name="lga" class="form-control border-success-subtle" placeholder="Alimosho.." required>
        </div>

        <div class="mb-3">
          <label class="form-label">Admission Number</label>
          <input type="text" name="admission" class="form-control border-success-subtle" placeholder="DSH/LA/25/001" required>
        </div>

      </div>
      <!-- BUTTONS -->
      <div class="container text-center flex mt-5">
        <button type="submit" class="btn btn-success" name="submit">Submit Form</button>
        <button type="reset" class="btn btn-success" name="submit">Reset Form</button>
        <button type="button" class="btn btn-success" name="submit" id="view">View Records</button>
      </div>
      <!-- Loading Spinner -->
      <div id="formLoader">
        <div class="spinner"></div>
      </div>

    </form>
    <!-- form ends here -->
    <!-- this is the table div that shows the students records -->
    <div id="view_table"></div>
    <!-- footer -->
    <footer class="container text-center bg-success text-light mt-4 p-2 border border-start border-2">
      Do-Estdot International school <span class="label label-primary">&copy; 2025</span>
      <br />
      Hostel Management
    </footer>
    <!-- footer ends here -->
  </div>
  <!-- These are external javascript -->
  <script src="js/jquery.js"></script>
  <script src="js/form.js"></script>
</body>

</html>