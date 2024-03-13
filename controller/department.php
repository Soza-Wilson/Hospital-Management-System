<?php
spl_autoload_register(function ($class) {
    if (file_exists('../class/' . $class . '.php')) {
        require_once '../class/' . $class . '.php';
    }
});


if (isset($_POST['registerDepartment'])) {
    $departmentData = $_POST['registerDepartment'];
    $department = new Department($departmentData["name"], $departmentData["description"]);
    echo $department->registerDepartment();
}


