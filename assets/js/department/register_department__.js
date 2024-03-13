$(document).ready(() => {
  $("#save_department").click(() => {
    let form = $(".needs-validation")[0];
    if (form.checkValidity()) {
      if (confirm("Are you sure ?")) {
        registerDepartment();
      }
    } else {
      $(form).addClass("was-validated");
    }
  });

  const registerDepartment = () => {
    departmentValues = {
      name: $("#departmentName").val(),
      description: $("#description").val(),
    };

    $.post(
      "../../controller/department.php",
      {
        registerDepartment: departmentValues,
      },
      (data) => {
        if (data.toString() === "registered") {
          alert("New department registered ");
          window.location = "register_department.php";
        } else if(data.toString() === "nameExists") {
          alert("Error: Department name already exists !!");
          $("#departmentName").attr("class", "")
        }
      }
    );
  };
});
