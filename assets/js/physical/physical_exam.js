$(document).ready(() => {
  $("#SaveExamination").click(async () => {
    // Check form validation
    let form = $(".needs-validation-physical")[0];
    if (form.checkValidity()) {
      if (confirm("Are you sure ?")) {
        await uploadFile();
      }
    } else {
      $(form).addClass("was-validated");
    }
  });

  const registerPhysical = (directoryName) => {
    data = {
      examName: $("#examinationName").val(),
      dir: directoryName,
      diagnosis: $("#diagnosisId").val(),
    };

    $.post(
      "../../controller/physical.php",
      {
        registerPhysical: data,
      },
      (data) => {
        alert(data);
        window.location.reload()
      }
    );
  };

  /// upload file using PHP
  const uploadFile = async () => {
    let formData = new FormData();
    let fileInput = document.querySelector("#documents");
    formData.append("physcal_documentation", fileInput.files[0]);

    await fetch("../../controller/physical.php", {
      method: "POST",
      body: formData,
    })
      .then((response) => response.json())
      .then((data) => {
        registerPhysical(data.filename);
      })
      .catch((error) => {
        console.log(error);
      });
  };

  const getPhysicalExam = (diagnosisId) => {
    $.post(
      "../../controller/physical.php",
      {
        getExam: diagnosisId,
      },
      (data) => {
        if (data === "empty") {
        } else {
          outPut = data.split(",");
          $("#examinationName").val(outPut[0]);

          $("#SaveExamination").html('<button type="submit" id="SaveExamination" class="btn btn-primary">Update</button>');

          $("#buttons").html(
            '<div class="column"> <a href="'+'../../documents/uploadedFiles/physicalExam/'+outPut[1]+'"   class="btn btn-success"><i class="ri ri-file-copy-2-line"></i></a></div>'
          );
        }
      }
    );
  };

  getPhysicalExam($("#diagnosisId").val());
});
