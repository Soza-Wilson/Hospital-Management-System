<?php

spl_autoload_register(function ($class) {
    if (file_exists('../class/' . $class . '.php')) {
        require_once '../class/' . $class . '.php';
    }
});
if (isset($_POST["registerTest"])) {

    $testValues = $_POST["registerTest"];
    $lab = new LabTest("", $testValues["urineTest"], $testValues["bloodTest"], $testValues["imagingStudies"], $testValues["diagnosisId"]);
    if ($lab->checkIfExists()) {

        echo $lab->updateLabTest();
    } else {
        echo $lab->registerLabTest();
    }
}


if (isset($_POST["getTest"])) {
    $lab = new LabTest("", "", "", "", $_POST["getTest"]);
    echo $lab->getLabTest();
}
