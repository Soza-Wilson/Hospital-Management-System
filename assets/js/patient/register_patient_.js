$(document).ready(() => {
  $("#save_patient").click(() => {
    let form = $(".needs-validation")[0];
    if (form.checkValidity()) {
      if (confirm("Are you sure ?")) {
        registerPatient();
      }
    } else {
      $(form).addClass("was-validated");
    }
  });

  const registerPatient = () => {
    const patientValues = {
      fullName: $("#fullName").val(),
      dob: $("#dob").val(),
      sex: $("#sex").val(),
      contactNumber: $("#contactNumber").val(),
      email: $("#email").val(),
      region: $("#select_region").val(),
      district: $("#select_district").val(),
      ta: $("#ta").val(),
      village: $("#village").val(),
      userId: $("#userId").val(),
      contactAdrress: $("#contactAddress").val(),
    };

    $.post(
      "../../controller/patient.php",
      {
        registerPatient: patientValues,
      },
      (data) => {
        window.location = "../relative/register-relative.php?patientId="+parseInt(data)+"";
      }
    );
  };

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
