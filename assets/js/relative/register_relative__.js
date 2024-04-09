$("#document").ready(() => {
  $("#saveRelative").click(() => {
    let form = $(".needs-validation")[0];
    if (form.checkValidity()) {
      if (confirm("Are you sure ?")) {
        registerRelative();
      }
    } else {
      $(form).addClass("was-validated");
    }
  });

  const cancleRegistration = () => {
    $.post(
      "../../controller/relative.php",
      {
        cancleRegisterRelative: $("#patientId").val(),
      },
      (data) => {
        alert(data);
      }
    );
  };

  const registerRelative = () => {
    
    const relativeData = {
      firstName: $("#firstName").val(),
      lastName: $("#lastName").val(),
      contactNumber: $("#contactNumber").val(),
      email: $("#email").val(),
      relation: $("#relation").val(),
      residence: $("#residence").val(),
      contactAddress: $("#contactAddress").val(),
      patientId : $("#patientId").val()
    };


    $.post(
      "../../controller/relative.php",
      {
        registerRelative: relativeData,
      },
      (data) => {
        alert(data);
      }
    );
  };
});
