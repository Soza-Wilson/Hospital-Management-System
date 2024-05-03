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

if (isset($_POST['getDepartments'])) {
    $department = new Department("", "", "");
    $departmentData = $department->getDepartments();

    echo '   <option selected disabled value="">Choose Department...</option>';
    while ($row = $departmentData->fetch_assoc()) {
        $department_id = $row['department_id'];
        $name = $row['department_name'];
        echo "
        <option value ='$department_id'>$name</option>";
    }
}

if (isset($_POST['getSpecialties'])) {
    $data = $_POST['getSpecialties'];

    $role = new Role($data['title'], "", $data['department'], "");
    $roleData = $role->getSpecialty();

    echo '   <option selected disabled value="">Choose Specialty...</option>';
    while ($row = $roleData->fetch_assoc()) {
        $role_id = $row['role_id'];
        $specialty = $row['specialty'];
        echo "
        <option value ='$role_id'>$specialty</option>";
    }
}

if (isset($_POST['getTitles'])) {
    $department = $_POST['getTitles'];
    $role = new Role("", "", $department, "");
    $roleData = $role->getRoles();

    echo '   <option selected disabled value="">Choose Specialty...</option>';
    while ($row = $roleData->fetch_assoc()) {
        $title = $row['title'];

        echo "
        <option value ='$title'>$title</option>";
    }
}

if (isset($_POST['getRoleId'])) {
    $data = $_POST['getRoleId'];
    $role = new Role($data['title'], "", $data['department'], "");
    $roleData = $role->getSpecialty();


    while ($row = $roleData->fetch_assoc()) {
        $id = $row['role_id'];

        echo "$id";
    }
}

if (isset($_POST['setRole'])) {

    $data = $_POST['setRole'];
    $user = new User("", "", "", "", "", "", "", "","");
    echo $user->setUserRole($data['userId'], $data['roleId']);
}

if (isset($_POST['getRoleData'])) {

    $roleId = $_POST['getRoleData'];
    $role = new Role("", "", "", "");
    $roleData = $role->getRoleData($roleId);

    while ($row = $roleData->fetch_assoc()) {
        $id = $row['role_id'];
        $department = $row['department_name'];
        $title = $row['title'];
        $specialty =$row['specialty'];
        $description = $row['description'];
 
        echo "$id".","."$department".","."$title".","."$specialty".","."$description";
    }
    
}
