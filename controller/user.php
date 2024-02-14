
<?php

spl_autoload_register(function ($class) {
  if (file_exists('../class/' . $class . '.php')) {
    require_once '../class/' . $class . '.php';
  }
});



if (isset($_POST["registerUser"])) {
  $userValues = $_POST["registerUser"];
  $user = new User("", $userValues["firstName"], $userValues["lastName"], $userValues["dateOfBirth"], $userValues["sex"], $userValues["contactAddress"], $userValues["email"], $userValues["password"]);
  echo $user->RegisterUser();
}

if (isset($_POST["userLogIn"])) {

  $user = new User("", "", "", "", "", "", $_POST["email"], $_POST["password"]);
  $user->userLogIn();
  
}
