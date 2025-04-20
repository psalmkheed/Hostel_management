</body>
<script>
    // sidebar li for registering a new student
    $("#addStudent").click(function() {
        $(".main-content").load("student.php");
    });
    // sidebar li for viewing registered student
    $("#viewStudent").click(function() {
        $(".main-content").load("view_records.php");
    });

    // sidebar li for dashboard overview
    $("#dashboard").click(function() {
        $(".main-content").load("dashboard.php");
    });
    $(document).ready(function() {
        $(".main-content").load("dashboard.php");
    });
</script>

<!-- These are external javascript -->

<script src="../assets/js/script.js"></script>
    <script src="../assets/js/form.js"></script>

</html>