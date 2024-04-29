$(document).ready(() => {
  $("#saveVitals").click(async () => {
    // Check form validation, if true register user
    let form = $(".needs-validation-vitals")[0];
    if (form.checkValidity()) {
      if (confirm("Are you sure ?")) {
        registerVitals();
      }
    } else {
      $(form).addClass("was-validated");
    }
  });

  const registerVitals = () => {
    vitalsData = {
      temperature: $("#temperature").val(),
      bloodTest: $("#bloodPressure").val(),
      heartRate: $("#heartRate").val(),
      respiratoryRate: $("#respiratoryRate").val(),
      diagnosisId: $("#diagnosisId").val(),
    };

    $.post(
      "../../controller/vitals.php",
      {
        registerVitals: vitalsData,
      },
      (data) => {
        alert(data);
      }
    );
  };


  const getVitals = (diagnosisId) => {
    $.post(
      "../../controller/vitals.php",
      {
        getVitals: diagnosisId,
      },
      (data) => {
        if (data === "empty") {
        } else {
          outPut = data.split(",");
          $("#temperature").val(outPut[0]);
          $("#bloodPressure").val(outPut[1]);
          $("#heartRate").val(outPut[2]);
          $("#respiratoryRate").val(outPut[3]);
          $("#vitalsId").val(outPut[4]);

          $("#saveVitals").html(
            '<button type="submit" id="updateVitals" class="btn btn-primary">Update</button>'
          );
        }
      }
    );
  };

  getVitals($("#diagnosisId").val());

});
