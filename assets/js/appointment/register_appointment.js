$(document).ready(() => {
  // get and set patients, for select patient

  const getPatient = () => {
    $.post(
      "../../controller/appointment.php",
      {
        getPatientData: "",
      },
      (data) => {
        $("#patient").html(data);
      }
    );
  };

  getPatient();

  const getDocData = () => {
    $.post(
      "../../controller/appointment.php",
      {
        getDocData: "",
      },
      (data) => {
        $("#doc").html(data);
      }
    );
  };

  getDocData();

  $("#saveAppointment").click(() => {
    let form = $(".needs-validation")[0];
    if (form.checkValidity()) {
      if (confirm("Are you sure ?")) {
        registerAppointment();
      }
    } else {
      $(form).addClass("was-validated");
    }
  });

  const registerAppointment = () => {
    appointmentData = {
      patient: $("#patient").val(),
      doctor: $("#doc").val(),
      date: $("#date").val(),
      start: $("#start").val(),
      end: $("#end").val(),
      type : $("#type").val(),
    
    };

    $.post(
      "../../controller/appointment.php",
      {
        registerAppointment: appointmentData,
      },
      (data) => {
        alert(data);
      }
    );
  };
});
