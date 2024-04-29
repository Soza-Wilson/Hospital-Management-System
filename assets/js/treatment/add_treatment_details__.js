$(document).ready(() => {
  $("#saveTreatment").click(() => {
    let form = $(".needs-validation")[0];
    if (form.checkValidity()) {
      if (confirm("Are you sure ?")) {
        registerTreatment();
      }
    } else {
      $(form).addClass("was-validated");
    }
  });

  const registerTreatment = () => {
    data = {
      treatmentName: $("#treatmentName").val(),
      treatmentDescription: $("#treatmentDescription").val(),
      advice: $("#advice").val(),
      diagnosisId: $("#diagnosisId").val(),
      patient: $("#patientId").val(),
      doctor: $("#userId").val(),
    };

    $.post(
      "../../controller/treatment.php",
      {
        registerTreatment: data,
      },
      (data) => {
        alert(data);
        window.location.reload();
      }
    );
  };
});
