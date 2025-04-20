// Custom Alert Function (with title, message, type, auto-close, and duration)
$(document).ready(function () {
  // PHOTOID HANDLER
  // Handle file input change event
  $("#photo").change(function (e) {
    var file = e.target.files[0];
    var reader = new FileReader();

    reader.onload = function (event) {
      // Show the preview section and display the image
      $("#imagePreview").show();
      $("#previewImg").attr("src", event.target.result);
    };

    // Read the file as a data URL
    if (file) {
      reader.readAsDataURL(file);
    }
  });

  $("#closeAlert").click(function () {
    $("#customAlert").fadeOut();
  });

  window.showCustomAlert = function (
    title,
    message,
    type = "info",
    autoClose = true,
    duration = 3000
  ) {
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
      setTimeout(function () {
        $("#customAlert").fadeOut();
      }, duration);
    }
  };
});

// AJAX Form Submission with Spinner and Disabled Submit Button
$(document).ready(function () {
  $("#registerForm").submit(function (e) {
    e.preventDefault(); // Prevent page reload
    var formData = new FormData(this);
    var $submitBtn = $("#registerForm button[type='submit']");
    var originalText = $submitBtn.text();

    $("#formLoader").show(); // Show the spinner
    $submitBtn.prop("disabled", true).text("Submitting...");

    $.ajax({
      type: "POST",
      url: "../admin/register.php", // Ensure your PHP file is at this URL
      data: formData,
      contentType: false,
      processData: false,
      success: function (response) {
        $("#formLoader").hide(); // Hide spinner
        $submitBtn.prop("disabled", false).text(originalText); // Re-enable button

        // Expecting "success" if registration was successful
        if (response.trim() === "success") {
          showCustomAlert(
            "Success!",
            "Registration Successful",
            "success",
            true,
            3000
          );
          $("#registerForm")[0].reset();
          $("#imagePreview").hide();
          $("#previewImg").attr("src", ""); // Clear the image source
        } else {
          showCustomAlert("Error!", response, "error", false);
        }

        loadStudentTable();
        $("#studentTableBody").hide().html(data).fadeIn("slow");
      },
      error: function () {
        $("#formLoader").hide();
        $submitBtn.prop("disabled", false).text(originalText);
        showCustomAlert("Error!", "Something went wrong.", "error", false);
      },
    });
  });
});

function loadStudentTable() {
  $.ajax({
    url: "../admin/view_records.php",
    type: "GET",
    success: function (data) {
      $("#studentTableBody").html(data);
    },
  });
}
