<?php
include "../components/db_connection.php";
include "../components/head.php";
?>

<head>
    <style>
        ::placeholder {
            font-size: 14px;
            font-style: italic;
        }

        .form-label {
            color: green;
        }
    </style>
</head>

<div class="p-0 m-0 container  mb-5">
    <!-- Custom Alert Box -->
    <div id="customAlert">
        <div class="alertBox">
            <span class="alertIcon"></span>
            <h3 class="alertTitle"></h3>
            <p class="alertText"></p>
            <button id="closeAlert">OK</button>
        </div>
    </div>
    <div class="text-dark bg-success-subtle border-start border-success border-5 p-2 mb-2">
        <h4 class="">Register new student </h4>
    </div>
    <form class="row border mx-0  border-success-subtle border-1" id="registerForm" enctype="multipart/form-data" autocomplete="off">

        <div id="imagePreview" style="margin: 10px; display: none; text-align: center;">
            <img id="previewImg" src="" alt="Image Preview" style="max-width: 200px; max-height: 200px;" />
        </div>
        <div class="text-center mb-4 py-5  rounded">
            <input type="file" name="photo" accept=".jpg, .jpeg, .png" id="photo" required>
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

            <!-- Hostel Form Select -->
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
        <!-- Loading Spinner -->
        <div id="formLoader">
            <div class="spinner"></div>
        </div>
        <!-- BUTTONS -->
        <div class="container text-center flex m-5">
            <button type="submit" class="btn btn-success" name="submit">Submit Form</button>
            <button type="reset" class="btn btn-success" name="submit">Reset Form</button>
            <!-- <button type="button" class="btn btn-success" name="submit" id="view">View Records</button> -->
        </div>
    </form>


</div>

<!-- jQuery, Bootstrap JS, DataTables -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js">
</script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js">
</script>
<script src="../assets/js/script.js"></script>
<script src="../assets/js/form.js"></script>
</body>

</html>