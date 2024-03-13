$(document).ready(() => {
  $("#save_role").click(() => {
    let form = $(".needs-validation")[0];
    if (form.checkValidity()) {
      if (confirm("Are you sure ?")) {
        registerRole();
      }
    } else {
      $(form).addClass("was-validated");
    }
  });

  const registerRole = () => {
    roleValues = {
      name: $("#roleName").val(),
      department: $("#department").val(),
      description: $("#roleDescription").val(),
    };

  
    $.post(
      "../../controller/role.php",
      {
        registerRole: roleValues,
      },
      (data) => {

        if (data.toString() === "registered") {
          alert("New role registered ");
          window.location = "register_department.php";
        } else if (data.toString() === "nameExists") {
          alert("Error: Role already exists in department !!");
          $("#departmentName").attr("class", "");
        } else {
          alert(data);
        }
      }
    );
  };
});
