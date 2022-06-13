<?php
$sname  = "localhost";
$uname  = "root";
$pass   = "";
$dbname = "northwind";

$HL2 = new mysqli($sname, $uname, $pass, $dbname);

if($HL2->connect_error){
    die("D I S C O N N E C T E D" . $HL->connect_error);
} else{
    
    echo "<br />";
   
}

?>