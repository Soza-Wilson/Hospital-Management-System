<?php

spl_autoload_register(function ($class) {
    if (file_exists('../class/' . $class . '.php')) {
        require_once '../class/' . $class . '.php';
    }
});

if (isset($_POST['registerPatient'])) {
    $patientData = $_POST['registerPatient'];
    $patient = new Patient(
        "",
        $patientData['fullName'],
        $patientData['dob'],
        $patientData['sex'],
        $patientData['district'],
        $patientData['village'],
        $patientData['ta'],
        $patientData["contactNumber"],
        $patientData['email'],
        $patientData['userId'],
        $patientData['contactAdrress']
    );

  
    echo (int)$patient->registerPatient();
}

if (isset($_POST['getPatientdetails'])) {
    $output = "";
    $patient = new Patient($_POST['getPatientdetails'], "", "", "", "", "", "", "", "", "", "", "");
    $patientData = $patient->getPatientDetails();
    for ($i = 0; $i < sizeof($patientData); $i++) {
        $output = $ouput . ',' . $patientData[$i];
    }
    echo $output;
}
