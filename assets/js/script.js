$(document).ready(function () {
  $("#studentsTable").DataTable();

    // DELETE BUTTON HANDLER

    $(document).on("click", ".delete-btn", function () {
      const id = $(this).data("id");
      if (confirm("Are you sure you want to delete this student?")) {
        $.post("../components/delete.php", { id }, function (response) {
          if (response.trim() === "success") {
            $("#row-" + id).fadeOut("slow", function () {
              showToast("Student deleted successfully!", "success");
            });
          } else {
            showToast("Delete failed: " + response, "danger");
          }
        });
      }
    });
    

  // OPEN EDIT MODAL TO UPDATE STUDENT
  $(document).on("click", ".edit-btn", function() {
    $("#edit-id").val($(this).data("id"));
    $("#edit-surname").val($(this).data("surname"));
    $("#edit-fname").val($(this).data("fname"));
    $("#edit-lname").val($(this).data("lname"));
    $("#edit-dob").val($(this).data("dob"));
    $("#edit-gender").val($(this).data("gender"));
    $("#edit-nationality").val($(this).data("nationality"));
    $("#edit-state").val($(this).data("state"));
    $("#edit-lga").val($(this).data("lga"));
    $("#edit-admission").val($(this).data("admission"));
    $("#edit-hostel").val($(this).data("hostel"));

    const modal = new bootstrap.Modal(document.getElementById("editModal"));
    modal.show();
  });

  // EDIT FORM SUBMIT HANDLER
  $("#editForm").submit(function (e) {
    e.preventDefault();
    $("#editForm button[type='submit']").prop("disabled", true);
    const formData = $(this).serialize();
    const id = $("#edit-id").val();
    $.ajax({
      url: "../components/update.php",
      method: "POST",
      data: formData,
      success: function (response) {
        if (response.trim() === "success") {
          // Update table row directly
          const row = $("#row-" + id);
          row.find("td:eq(1)").text($("#edit-surname").val());
          row.find("td:eq(2)").text($("#edit-fname").val());
          row.find("td:eq(3)").text($("#edit-lname").val());
          row.find("td:eq(4)").text($("#edit-dob").val());
          row.find("td:eq(5)").text($("#edit-gender").val());
          row.find("td:eq(6)").text($("#edit-nationality").val());
          row.find("td:eq(7)").text($("#edit-state").val());
          row.find("td:eq(8)").text($("#edit-lga").val());
          row.find("td:eq(9)").text($("#edit-admission").val());
          row.find("td:eq(10)").text($("#edit-hostel").val());

          // Hide modal
          const modal = bootstrap.Modal.getInstance(
            document.getElementById("editModal")
          );
          modal.hide();

          showToast("Record updated successfully!", "success");
        } else {
          showToast("Update failed: " + response, "danger");
        }
      },
      error: function () {
        showToast("An error occurred while updating.", "danger");
      },
      complete: function () {
        $("#editForm button[type='submit']").prop("disabled", false);
      }
    });
  });
});

// TOAST FUNCTION
function showToast(message, type = "success") {
  const toastEl = $("#toastMessage");
  toastEl
    .removeClass("bg-success bg-danger")
    .addClass(type === "success" ? "bg-success" : "bg-danger");
  toastEl.find(".toast-body").text(message);
  const toast = bootstrap.Toast(toastEl[0]);
  toast.show();
}

// AJAX RELOAD TABLE (optional)
function loadStudentTable() {
  $.ajax({
    url: "../admin/view_records.php",
    type: "GET",
    success: function (data) {
      $("#studentTableBody").html(data);
    },
  });
}
