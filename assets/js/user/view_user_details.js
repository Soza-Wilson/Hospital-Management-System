$(document).ready(() => {
  const getDepartments = () => {
    $.post(
      "../../controller/department.php",
      {
        getDepartments: "",
      },
      (data) => {
        $("#select_department").html(data);
      }
    );
  };

  const getSpecialties = () => {
    let data = {
      title: $("#select_title").val(),
      department: $("#select_department").val(),
    };

    $.post(
      "../../controller/department.php",
      {
        getSpecialties: data,
      },
      (data) => {
        $("#select_specialty").html(data);
      }
    );
  };

  const getTitles = () => {
    $.post(
      "../../controller/department.php",
      {
        getTitles: $("#select_department").val(),
      },
      (data) => {
        $("#select_title").html(data);
      }
    );
  };

  const getRoleId = () => {
    let data = {
      title: $("#select_title").val(),
      department: $("#select_department").val(),
    };

    $.post(
      "../../controller/department.php",
      {
        getRoleId: data,
      },
      (data) => {
        $("#roleId").val(data);
      }
    );
  };

  const setRole = () => {
    let data = {
      userId: $("#userId").val(),
      roleId: $("#roleId").val(),
    };

    $.post("../../controller/department.php", { setRole: data }, (data) => {
      alert(data);
    });
  };

  const fillRoleForm = () => {
    if ($("#roleId").val() !== null) {
      $.post(
        "../../controller/department.php",
        {
          getRoleData: $("#roleId").val(),
        },
        (data) => {
          let roleArray = data.split(',')
          $("#department").val(roleArray[1]);
          $("#title").val(roleArray[2]);
          $("#specialty").val(roleArray[3]);
          $("#description").val(roleArray[4]);
        }
      );
    }
  };

  fillRoleForm();

  $("#select_department").change(() => {
    getTitles();
  });

  $("#select_title").change(() => {
    getSpecialties();
  });

  $("#select_specialty").change(() => {
    getRoleId();
  });

  getDepartments();

  $("#assign_role").click(() => {
    let form = $(".needs-validation")[0];
    if (form.checkValidity()) {
      if (confirm("Are you sure ?")) {
        setRole();
        fillRoleForm();
      }
    } else {
      $(form).addClass("was-validated");
    }
  });
});
