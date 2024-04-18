<?php
spl_autoload_register(function ($class) {
    if (file_exists('../class/' . $class . '.php')) {
        require_once '../class/' . $class . '.php';
    }
});

if (isset($_POST["registerDiagnosis"])) {
    $diagnosisData = $_POST["registerDiagnosis"];

    $diagnosis = new Diagnosis("", $diagnosisData["patientId"], $diagnosisData["doctorId"], $diagnosisData["presentComplaint"], $diagnosisData["presentComplaintHistory"], $diagnosisData["diagnosisName"], $diagnosisData["diagnosisDescription"], $diagnosisData["doctorAdvice"]);
    echo $diagnosis->registerDiagnosis();
}
