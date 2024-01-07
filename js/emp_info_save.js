$(document).ready(function () {
  // Save Form
  $("#save").click(function (e) {
    e.preventDefault();

    var formData = {};
    $(".form-control").each(function () {
      var fieldName = $(this).attr("id");
      var fieldValue = $(this).val();
      formData[fieldName] = fieldValue;
    });
    console.log(formData);

    $.ajax({
      type: "POST",
      url: "process/emp_info_save.php",
      data: formData,
      dataType: "json",
      success: function (result) {
        if (result.ok) {
          var frm = document.getElementById(
            "form_employee_registration_save"
          );
          frm.reset();
          document.getElementById('pic-img').src = "Images/Assets/placeholder.jpg";
          alert("Data successfully added!");
        }
      },
    });
  });

  // Update Form
  $("#update").click(function (e) {
    e.preventDefault();

    var formData = {};
    $(".form-control").each(function () {
      var fieldName = $(this).attr("id");
      var fieldValue = $(this).val();
      formData[fieldName] = fieldValue;
    });

    $.ajax({
      type: "POST",
      url: "process/emp_info_update.php",
      data: formData,
      dataType: "json",
      success: function (result) {
        if (result.ok) {
          alert("Data successfully updated!");
        }
      },
    });
  });

  $("#delete").click(function (e) {
    e.preventDefault();

    var formData = {};
    $(".form-control").each(function () {
      var fieldName = $(this).attr("id");
      var fieldValue = $(this).val();
      formData[fieldName] = fieldValue;
    });

    $.ajax({
      type: "POST",
      url: "process/emp_info_delete.php",
      data: formData,
      dataType: "json",
      success: function (result) {
        if (result.ok) {
          alert("Data successfully deleted!");
          window.location.href = "employee_report.php";
        }
      },
    });
  });

  // Image upload
  $("#uploadfile").change(function (e) {
    var formData = new FormData($("#pic-upload")[0]);

    $.ajax({
      type: "POST",
      url: "process/upload_pic.php",
      data: formData,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function (result) {
        if (result.ok) {
          document.getElementById('pic-img').src = result.temp_path
          $("#picpath").val(result.temp_path);
        } else {
          alert("Error occured");
        }
      },
    });
  });

  $("#cancelbtn").click(function (e) {
    e.preventDefault();
    window.location.href = "Admin_page.php";
  });
});
