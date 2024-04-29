$(document).ready(() => {
  $("#saveLabTest").click(() => {
    // Check form validation, if true register user
    let form = $(".needs-validation-lab-test")[0];
    if (form.checkValidity()) {
      if (confirm("Are you sure ?")) {
        registerTest()
      }
    } else {
      $(form).addClass("was-validated");
    }
  });

  const registerTest = () => {
    testValues = {
      urineTest: $("#urineTest").val(),
      bloodTest: $("#bloodTest").val(),
      imagingStudies: $("#imagingStudies").val(),
      diagnosisId: $("#diagnosisId").val(),
    };

    $.post(
      "../../controller/lab.php",
      {
        registerTest: testValues,
      },
      (data) => {
        alert(data);
      }
    );
  };


  const getLabTest= (diagnosisId) => {
    $.post(
      "../../controller/lab.php",
      {
        getTest: diagnosisId,
      },
      (data) => {
        if (data === "empty") {
        } else {
          outPut = data.split(",");
          $("#urineTest").val(outPut[0]);
          $("#bloodTest").val(outPut[1]);
          $("#imagingStudies").val(outPut[2]);
          

          $("#saveLabTest").html(
            '<button type="submit" id="saveLabTest" class="btn btn-primary">Update</button>'
          );
        }
      }
    );
  };

  getLabTest($("#diagnosisId").val());
});
