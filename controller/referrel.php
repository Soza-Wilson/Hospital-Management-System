<?php


spl_autoload_register(function ($class) {
    if (file_exists('../class/' . $class . '.php')) {
        require_once '../class/' . $class . '.php';
    }
});
if (isset($_POST["getPatients"])) {
    $patient = new Patient("", "", "", "", "", "", "", "", "", "", "", "");
    $patientData = $patient->getPatients();

    echo '   <option selected disabled value="">Choose patient...</option>';
    while ($row = $patientData->fetch_assoc()) {
        $id = $row['patient_id'];
        $fullName = $row['full_name'];
        echo "
        <option value ='$id'>ID:$id   ,Name: $fullName</option>";
    }
}

if (isset($_POST['searchPatient'])) {
    $patientName = $_POST['searchPatient'];
    $patient = new Patient("", "", "", "", "", "", "", "", "", "", "", "");
    $patientData = $patient->searchPatientByName($patientName);


    while ($row = $patientData->fetch_assoc()) {
        $id = $row['patient_id'];
        $fullName = $row['full_name'];
        echo "
        <option value ='$id'>ID:$id   ,Name: $fullName</option>";
    }
}

if (isset($_POST['registerReferrel'])) {
    $referrelData = $_POST['registerReferrel'];
    $referrel = new Referral("", $referrelData['patientId'], $referrelData['referredBy'], $referrelData['hospitalName'], $referrelData['region'], $referrelData['TA'], $referrelData['district'], $referrelData['caseDescription'], $referrelData['documentation']);
    echo $returnData = $referrel->registerRefarrel();
}

if (isset($_FILES['referrelDocumnetation'])) {
    $fileName = $_FILES['referrelDocumnetation']['name'];
    $fileSize = $_FILES['referrelDocumnetation']['size'];
    $fileTmp = $_FILES['referrelDocumnetation']['tmp_name'];
    $fileType = $_FILES['referrelDocumnetation']['type'];
    $directory = "../documents/uploadedFiles/referrelDocumentation/";
    $fileHandler = new FileHandler($fileName, $fileSize, $fileType, $fileTmp, $directory);
    $returnData = $fileHandler->uploadFile();
    echo $returnData["fileName"];
}
