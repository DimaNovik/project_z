<?php

$db = $_POST['officename'];
$pass = $_POST['password'];

if ($pass == 1) {

$serverName = "10.75.1.223"; //serverName\instanceName
$connectionInfo = array( "Database"=>$db, "UID"=>"admin1", "PWD"=>"1");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

if( $conn ) {


}else{
     echo "Connection could not be established.<br />";
     die( print_r( sqlsrv_errors(), true));
}


} else {
  echo "Невірний пароль";
  exit();
}
?>
