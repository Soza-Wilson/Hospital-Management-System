$(document).ready(() => {
  const getPatients = () => {
    $.post(
      "../../controller/referrel.php",
      {
        getPatients: "",
      },
      (data) => {
        $("#selectPatient").html(data);
      }
    );
  };

  const searchPatient = () => {
    $.post(
      "../../controller/referrel.php",
      {
        searchPatient: $("#searchPatientName").val(),
      },
      (data) => {
        $("#selectPatient").html(data);
      }
    );
  };

  const registerReferrel = () => {
    referrelData = {
      patientId: $("#selectPatient").val(),
      referredBy: $("#referrer").val(),
      hospitalName: $("#hospitalName").val(),
      region: $("#select_region").val(),
      district: $("#select_district").val(),
      TA: $("#ta").val(),
      caseDescription: $("#caseDescription").val(),
      documentation: $("#documentation").val(),
    };

    $.post(
      "../../controller/referrel.php",
      {
        registerReferrel: referrelData,
      },
      (data) => {
        if (data === "registered") {
          uploadFile();
          // window.location = "register-refferel.php";
        } else {
          alert("Error : " + data);
        }
      }
    );
  };

  const uploadFile = () => {
    let formData = new FormData();
    let fileInput = document.querySelector("#documentation");
    formData.append("referrelDocumnetation", fileInput.files[0]);
    fetch("../../controller/referrel.php", { method: "POST", body: formData })
      .then((response) => response.json())
      .then((data) => {
        alert(data);
        fileName = data.filename;
        $("#tempFile").val(filename);
        alert(fileName);
      })
      .catch((error) => {
        console.log(error);
      });
  };
  getPatients();
  $("#searchPatientName").on("input", () => {
    searchPatient();
  });
  $("#registerReferrel").click(() => {
    let form = $(".needs-validation")[0];
    if (form.checkValidity()) {
      if (confirm("Are you sure ?")) {
        registerReferrel();
      }
    } else {
      $(form).addClass("was-validated");
    }
  });

  $("#select_region").change(() => {
    var region_data = $("#select_region").find(":selected");
    if (region_data.val() == "") {
    } else if (region_data.val() == "central") {
      $("#select_district").empty();
      var myOptions = [
        {
          text: "Select District",
          value: "",
        },
        {
          text: "Dedza",
          value: "dedza",
        },
        {
          text: "Dowa",
          value: "dowa",
        },
        {
          text: "Kasungu",
          value: "kasungu",
        },
        {
          text: "Lilongwe",
          value: "lilongwe",
        },
        {
          text: "Mchinji",
          value: "mchinji",
        },
        {
          text: "Nkhotakota",
          value: "nkhotakota",
        },
        {
          text: "Ntcheu",
          value: "ntcheu",
        },
        {
          text: "Ntchisi",
          value: "ntchisi",
        },
        {
          text: "Salima",
          value: "salima",
        },
      ];

      $.each(myOptions, function (i, el) {
        $("#select_district").append(new Option(el.text, el.value));
      });
    } else if (region_data.val() == "northern") {
      $("#select_district").empty();
      var myOptions = [
        {
          text: "Select District",
          value: "",
        },
        {
          text: "Chitipa",
          value: "chitipa",
        },
        {
          text: "Kalonga",
          value: "kalonga",
        },
        {
          text: "Likoma",
          value: "likoma",
        },
        {
          text: "Mzimba",
          value: "mzimba",
        },
        {
          text: "Mkhata Bay",
          value: "mchinji",
        },
        {
          text: "Rumphi",
          value: "rumphi",
        },
      ];

      $.each(myOptions, function (i, el) {
        $("#select_district").append(new Option(el.text, el.value));
      });
    } else if (region_data.val() == "southern") {
      $("#select_district").empty();
      var myOptions = [
        {
          text: "Select District",
          value: "",
        },
        {
          text: "Balaka",
          value: "balaka",
        },
        {
          text: "Blantyre",
          value: "blantyre",
        },
        {
          text: "Chikwawa",
          value: "chikwawa",
        },
        {
          text: "Chiradzulu",
          value: "chiradzulu",
        },
        {
          text: "Machinga",
          value: "machinga",
        },
        {
          text: "Mulanje",
          value: "mulanje",
        },
        {
          text: "Mwanza",
          value: "mwanza",
        },
        {
          text: "Nsanje",
          value: "nsanje",
        },
        {
          text: "Thyolo",
          value: "thyolo",
        },
        {
          text: "Phalombe",
          value: "phalombe",
        },
        {
          text: "Zomba",
          value: "zomba",
        },
        {
          text: "Neno",
          value: "neno",
        },
      ];

      $.each(myOptions, function (i, el) {
        $("#select_district").append(new Option(el.text, el.value));
      });
    }
  });
});
