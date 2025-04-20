<?php
include "../components/db_connection.php"; // database connection
// include "../components/head.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Dashboard</title>
  <!-- BOOTSTRAP CSS -->
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

  <!-- External Stylesheet -->
  <link rel="stylesheet" href="../assets/css/alert.css" />
  <link rel="stylesheet" href="../assets/css/style.css" />

</head>

<body>
  <div class="container p-0 m-0">
    <div class="text-dark bg-success-subtle border-start border-success border-5 p-2 mb-2">
      <h4 class="">Registered Students </h4>
    </div>
    <div class="table-responsive">
      <table id="studentsTable" class="table table-hover table-striped">
        <thead>
          <tr>
            <th>Photo</th>
            <th>Surname</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>DOB</th>
            <th>Gender</th>
            <th>Nationality</th>
            <th>State</th>
            <th>LGA</th>
            <th>Admission No</th>
            <th>Hostel</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody id="studentTableBody">
          <?php
          $sql = "SELECT * FROM hostel_management ORDER BY id DESC";
          $result = $conn->query($sql);

          while ($row = $result->fetch_assoc()) {
            echo "<tr id='row-{$row['id']}'>
            <td><img src='uploads/{$row['photo_id']}' width='50'></td>
            <td>{$row['surname']} </td>
            <td>{$row['first_name']}</td>
            <td>{$row['last_name']}</td>
            <td>{$row['date_of_birth']}</td>
            <td>{$row['gender']}</td>
            <td>{$row['nationality']}</td>
            <td>{$row['state_of_origin']}</td>
            <td>{$row['lga']}</td>
            <td>{$row['admission_number']}</td>
            <td>{$row['hostel']}</td>
            <td>
              <button class='btn btn-sm btn-warning edit-btn' 
                  data-id='{$row['id']}'
                  data-surname='{$row['surname']}'
                  data-fname='{$row['first_name']}'
                  data-lname='{$row['last_name']}'
                  data-dob='{$row['date_of_birth']}'
                  data-gender='{$row['gender']}'
                  data-nationality='{$row['nationality']}'
                  data-state='{$row['state_of_origin']}'
                  data-lga='{$row['lga']}'
                  data-admission='{$row['admission_number']}'
                  data-hostel='{$row['hostel']}'
                ><i class='fas fa-pen'></i>
              </button>

              <button class='btn btn-sm btn-danger delete-btn' data-id='{$row['id']}'>  <i class='fa-solid fa-trash'></i></button>

            </td>
          </tr>";
          }
          $conn->close();
          ?>
        </tbody>
      </table>
    </div>
  </div>
  <!-- Edit Modal -->
  <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <form id="editForm">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Edit Student</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body row g-3">
            <input type="hidden" name="id" id="edit-id">
            <div class="col-md-6">
              <label>Surname</label>
              <input type="text" class="form-control" name="surname" id="edit-surname">
            </div>
            <div class="col-md-6">
              <label>First Name</label>
              <input type="text" class="form-control" name="first_name" id="edit-fname">
            </div>
            <div class="col-md-6">
              <label>Last Name</label>
              <input type="text" class="form-control" name="last_name" id="edit-lname">
            </div>
            <div class="col-md-6">
              <label>Date of Birth</label>
              <input type="date" class="form-control" name="dob" id="edit-dob">
            </div>
            <div class="col-md-6">
              <label>Gender</label>
              <select class="form-select" name="gender" id="edit-gender">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
              </select>
            </div>
            <div class="col-md-6">
              <label>Nationality</label>
              <input type="text" class="form-control" name="nationality" id="edit-nationality">
            </div>
            <div class="col-md-6">
              <label>State</label>
              <input type="text" class="form-control" name="state" id="edit-state">
            </div>
            <div class="col-md-6">
              <label>LGA</label>
              <input type="text" class="form-control" name="lga" id="edit-lga">
            </div>
            <div class="col-md-6">
              <label>Admission Number</label>
              <input type="text" class="form-control" name="admission_number" id="edit-admission" readonly>
            </div>
            <div class="col-md-6">
              <label>Hostel</label>
              <input type="text" class="form-control" name="hostel" id="edit-hostel">
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Save Changes</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  <!--EDIT SUCCESS MESSAGE ALERT -->
  <!-- Toast Popup effect Container -->
  <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 9999">
    <div id="toastMessage" class="toast align-items-center text-white bg-success border-0" role="alert">
      <div class="d-flex">
        <div class="toast-body">
          Toast message here
        </div>
        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
      </div>
    </div>
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