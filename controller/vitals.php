<?php


spl_autoload_register(function ($class) {
    if (file_exists('../class/' . $class . '.php')) {
        require_once '../class/' . $class . '.php';
    }
});

if (isset($_POST["registerVitals"])) {
    $vitalsData = $_POST["registerVitals"];
    $vitals = new Vitals("", $vitalsData["temperature"], $vitalsData["bloodTest"], $vitalsData["heartRate"], $vitalsData["respiratoryRate"], $vitalsData["diagnosisId"]);
    if ($vitals->checkIfExists()) {
        echo $vitals->updateVitals();
    } else {
        echo $vitals->registerVitals();
    }
}


if (isset($_POST['getVitals'])) {

    $vitals = new Vitals("", "", "", "", "", $_POST['getVitals']);
    echo $vitals->getVitals();
}



