<?php



spl_autoload_register(function ($class) {
    if (file_exists('../class/' . $class . '.php')) {
        require_once '../class/' . $class . '.php';
    }
});

if (isset($_POST["registerTreatment"])) {
    $data = $_POST["registerTreatment"];
    $treatment = new Treatment("", $data["patient"], $data["doctor"], $data["treatmentName"], $data["treatmentDescription"], $data["diagnosisId"], $data["advice"]);
    echo $treatment->registerTreatment();
}
