<?php




spl_autoload_register(function ($class) {
    if (file_exists('../class/' . $class . '.php')) {
        require_once '../class/' . $class . '.php';
    }
});

if (isset($_POST["registerPhysical"])) {
    $physicalData = $_POST["registerPhysical"];
    $physical = new PhysicalExam($physicalData["examName"], $physicalData["dir"], $physicalData["diagnosis"]);
    if ($physical->checkIfExists()) {
        echo $physical->updatePhysical();
    } else {
        echo $physical->registerPhysical();
    }
}


if (isset($_POST["getExam"])) {

    $physical = new PhysicalExam("", "", $_POST["getExam"]);
    echo $physical->getPhysicalExam();
}


if (isset($_FILES['physcal_documentation'])) {

    $errors = array();
    $file_name = $_FILES['physcal_documentation']['name'];
    $file_size = $_FILES['physcal_documentation']['size'];
    $file_tmp = $_FILES['physcal_documentation']['tmp_name'];
    $file_type = $_FILES['physcal_documentation']['type'];

    $newfilename = date('dmYHis') . str_replace(" ", "", basename($_FILES["physcal_documentation"]["name"]));
    if ($file_size > 2097152) {
        $errors[] = 'File size must be excately 2 MB';
    }

    if (empty($errors) == true) {
        move_uploaded_file($_FILES["physcal_documentation"]["tmp_name"], "../documents/uploadedFiles/physicalExam/" . $newfilename);
    } else {
    }

    $data = array("filename" => "$newfilename");
    $eco_data = json_encode($data);
    echo $eco_data;
}
