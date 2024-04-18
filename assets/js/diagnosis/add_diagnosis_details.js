$(document).ready(() => {
  $("#saveDiagnosis").click(() => {
    // Check form validation, if true register user
    let form = $(".needs-validation")[0];
    if (form.checkValidity()) {
      if (confirm("Are you sure ?")) {
        registerDiagnosis();
      }
    } else {
      $(form).addClass("was-validated");
    }
  });

  const registerDiagnosis = () => {
    const diagnosisHistory = () => {
      if ($("#presentComplaintHistory").val() === "") {
        return "empty";
      } else {
        return $("#presentComplaintHistory").val();
      }
    };

    diagnosisData = {
      presentComplaint: $("#presentComplaint").val(),
      presentComplaintHistory: diagnosisHistory(),
      diagnosisName: $("#diagnosisName").val(),
      diagnosisDescription: $("#diagnosisDescription").val(),
      doctorAdvice: $("#doctorAdvice").val(),
      patientId: $("#patientId").val(),
      doctorId: $("#doctorId").val(),
    };

    $.post(
      "../../controller/diagnosis.php",
      {
        registerDiagnosis: diagnosisData,
      },
      (data) => {
        alert(data);
        //   window.location = "login.php";
      }
    );
  };
});
