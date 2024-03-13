<?php

spl_autoload_register(function ($class) {
    if (file_exists('../class/' . $class . '.php')) {
        require_once '../class/' . $class . '.php';
    }
});


if (isset($_POST['registerRole'])) {

    $roleData = $_POST['registerRole'];
    $role = new Role($roleData['name'], $roleData['department'], $roleData['description']);
    echo $role->addRole();
}
