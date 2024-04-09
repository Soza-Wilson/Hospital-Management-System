<?php


spl_autoload_register(function ($class) {
    if (file_exists('../class/' . $class . '.php')) {
        require_once '../class/' . $class . '.php';
    }
});


if (isset($_POST['registerRelative'])) {
    $relativeData = $_POST['registerRelative'];
    $relative = new Relative($relativeData['firstName'], $relativeData['lastName'], $relativeData['residence'], $relativeData['contactNumber'], $relativeData['email'], $relativeData['relation'], $relativeData['contactAddress'], $relativeData['patientId']);
    echo $relative->registerRelative();
}
