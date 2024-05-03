<?php

use function PHPSTORM_META\registerArgumentsSet;

spl_autoload_register(function ($class) {
    if (file_exists('../class/' . $class . '.php')) {
        require_once '../class/' . $class . '.php';
    }
});



if (isset($_POST["getPatientData"])) {
    $patient = new Patient("", "", "", "", "", "", "", "", "", "", "");
    $result = $patient->getPatients();

    echo ' 
    <option selected disabled value="">Choose Patient</option>';
    while ($row = $result->fetch_assoc()) {
        echo '
    <option  value="' . $row['user_id'] . '">' . $row['full_name'] . '</option>
    ';
    }
}


if (isset($_POST["getDocData"])) {
    $user = new User("", "", "", "", "", "", "", "", "", "", "",);
    $result = $user->getDoctor();
    echo ' 
    <option selected disabled value="">Choose Doctor/ Nurse...</option>';
    while ($row = $result->fetch_assoc()) {
        echo '  
       
        <option  value="' . $row['user_id'] . '">' . $row['first_name'] . ' ' . $row['last_name'] . '</option>
   ';
    }
}

if (isset($_POST['registerAppointment'])) {
    $data = $_POST['registerAppointment'];
    $appointment = new Appointment("", $data["doctor"], $data["date"], $data["start"], $data["end"], $data["patient"], $data["type"]);
    echo $appointment->registerAppointment();
}
