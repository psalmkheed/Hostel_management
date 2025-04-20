<?php
include "../components/head.php";
?>

<body>
  <div class="container-fluid">
    <!-- Header Wrapper -->
    <div class="row">
      <div class="col-lg-2 sidebar p-0 bg-success">
        <div class="logo px-2 pt-3 pb-1">
          <a href="">
            Admin Panel
          </a>
        </div>
        <ul>
        <li id="dashboard">Dashboard </li>
          <li id="addStudent">Add Student</li>
          <li id="viewStudent">View Students</li>
          <li>Logout</li>
        </ul>
      </div>
      <div class="col-lg-10 main-content">
      </div>
    </div>
  </div>
</body>
<?php
include "../components/footer.php";
?>