<?php
//phpinfo();
/*$conex = new PDO("sqlsrv:server=DESKTOP-M1MF6C5\NICOLAS;database=Autos", "sa", "nicolas97");
if($conex){
    echo "Conexión correcta";
}else{
    echo "No se pudo hacer la conexión";
}*/

/*$serverName = "DESKTOP-M1MF6C5\NICOLAS"; //serverName\instanceName
$connectionInfo = array( "Database"=>"Autos", "UID"=>"sa", "PWD"=>"nicolas97");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

if( $conn ) {
     echo "Conexión establecida.<br />";
}else{
     echo "Conexión no se pudo establecer.<br />";
     die( print_r( sqlsrv_errors(), true));
}*/

$connection_string = 'DRIVER={SQL Server};SERVER=DESKTOP-M1MF6C5\NICOLAS;DATABASE=prueba_usuario';

$user = 'sa';
$pass = 'nicolas97';

$connection = odbc_connect( $connection_string, $user, $pass );

/*if($connection){
    echo "Conexión correcta";
}else{
    echo "Conexión no establecida";
}*/

?>