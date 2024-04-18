$(document).ready(() => {
  $("#passwordResponse").hide();
  $("#verifyResponse").hide();
  $("#save").click(() => {
    // Check form validation, if true register user
      let form = $(".needs-validation")[0];
      if (form.checkValidity()) {
        if (confirm("Are you sure ?")) {
          registerUser();
        }
      } else {
        $(form).addClass("was-validated");
      
      }
  });

  $("#password").on("input", () => {
    const progressStatus = {
      20: ["danger", "Weak"],
      40: ["warning", "Medium"],
      60: ["primary", "Almost there"],
      80: ["info", "Strong"],
      100: ["success", "Very strong"],
    };

    let response = checkPasswordStrength($("#password").val());
    [
      ($("#passwordResponse")
        .show()
        .html(
          "<h7 class='label' id='passwordResponse'>  <i class='bi bi-info-circle-fill text-primary'></i><span class='badge text-dark' > " +
            response[0] +
            "</span></h7></br>"
        ),
      $("#progress").attr("style", "width: " + response[1] + "%"),
      $("#progress").attr(
        "class",
        "progress-bar progress-bar-striped bg-" +
          progressStatus[response[1].toString()][0] +
          ""
      ),
      $("#statusBadge").html(
        "<span class='badge rounded-pill bg-" +
          progressStatus[response[1].toString()][0] +
          " text-light'>" +
          progressStatus[response[1].toString()][1] +
          "</span>"
      )),
    ];
  });

  $("#repeatPassword").on("input", () => {
    if ($("#password").val() !== $("#repeatPassword").val()) {
      $("#verifyResponse").show();
    } else {
      $("#verifyResponse").hide();
    }
  });

  const checkPasswordStrength = (password) => {
    // Define the criteria for a strong password
    const minLength = 8;
    const minUpperCase = 1;
    const minLowerCase = 1;
    const minDigits = 1;
    const minSpecialChars = 1;

    // Check the length of the password
    if (password.length < minLength) {
      return [
        "Password should be at least " + minLength + " characters long.",
        20,
      ];
    }
    // Check the presence of uppercase letters
    if (!password.match(/[A-Z]/g)) {
      return [
        "Password should contain at least " +
          minUpperCase +
          " uppercase letter.",
        40,
      ];
    }

    // Check the presence of lowercase letters
    if (!password.match(/[a-z]/g)) {
      return [
        "Password should contain at least " +
          minLowerCase +
          " lowercase letter.",
        60,
      ];
    }

    // Check the presence of digits
    if (!password.match(/[0-9]/g)) {
      return ["Password should contain at least " + minDigits + " digit.", 80];
    }

    // Check the presence of special characters
    if (!password.match(/[!@#$%^&*()\-_=+{}[\]|\\;:'",.<>/?]/g)) {
      return [
        "Password should contain at least " +
          minSpecialChars +
          " special character.",
        80,
      ];
    }

    // Password meets all the criteria, considered strong
    return ["Password is strong", 100];
  };

  const registerUser = () => {
    userValues = {
      firstName: $("#firstName").val(),
      lastName: $("#lastName").val(),
      email: $("#email").val(),
      dateOfBirth: $("#dob").val(),
      sex: $("#sex").val(),
      contactAddress: $("#address").val(),
      phone: $("#phone").val(),
      password: $("#password").val(),
    };

    $.post(
      "../../controller/user.php",
      {
        registerUser: userValues,
      },
      (data) => {
        alert(data);
        window.location = "login.php";
      }
    );
  };
});
