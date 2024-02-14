<?php
spl_autoload_register(function ($class) {
  if (file_exists('class/' . $class . '.php')) {
    require_once 'class/' . $class . '.php';
  } 
});
$db = new DBSetup();
if ($db->createDatabase()){
  header('Location:views/auth/login.php');
}