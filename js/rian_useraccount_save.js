function areAllValuesFilled(obj) {
  for (var key in obj) {
    if (obj.hasOwnProperty(key)) {
      if (!obj[key] && obj[key] !== 0) {
        return false;
      }
    }
  }
  return true;
}
var isMatching = true;
$(document).ready(function () {

  $("#password, #confirm_password").on("keyup", function () {
    if ($("#password").val() == $("#confirm_password").val()) {
      $("#message").html("Matching").css("color", "green");
      isMatching = true;
    } else {
      $("#message").html("Not Matching").css("color", "red");
      isMatching = false;
    }
  });

  $("#update").click(function (e) {
    e.preventDefault();

    var formData = {};
    $(".formdata").each(function () {
      var fieldName = $(this).attr("id");
      var fieldValue = $(this).val();
      formData[fieldName] = fieldValue;
    });
    console.log(formData)

    if (!areAllValuesFilled(formData) || !isMatching) {
      alert("enter the required inputs");
    } 
    else {
      $.ajax({
        type: "POST",
        url: "process/rian_useraccount_save.php",
        data: formData,
        dataType: "json",
        success: function (result) {
          if (result.ok) {
            alert("Data successfully updated!");
          }
        },
      });
    }
  });

  $("#delete").click(function (e) {
    e.preventDefault();
    
    $.ajax({
      type: "POST",
      url: "process/rian_payroll_delete.php",
      data: formData,
      dataType: "json",
      success: function (result) {
        if (result.ok) {
          alert("Data successfully deleted!");
          window.location.href = "payroll_report.php";
        }
      },
    });
  });
});
