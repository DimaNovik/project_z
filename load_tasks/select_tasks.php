<?php
$clerkid = intval($_GET['q']);
$db = ($_GET['db']);

$serverName = "10.75.1.223"; //serverName\instanceName
$connectionInfo = array( "Database"=>$db, "UID"=>"admin1", "PWD"=>"1");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

$sql = "SELECT convert(varchar, CreateDate,104) as cd, Number as numb FROM Bypasses Where ClerkId=$clerkid and formdate > = (Select PaymentDate FROM GlobSet)";
$stmt = sqlsrv_query($conn, $sql);

if( $stmt === false ) {
     die( print_r( sqlsrv_errors(), true));
}


while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
        $number = iconv('windows-1251', 'utf-8', $row['numb']);
        echo "<div class='load_number_tasks'>";
        echo "<p>Дата задания: <b>".$row['cd']."</b> № задания: <b>".$number."</b></p>";
        echo "</div>";
}

?>
