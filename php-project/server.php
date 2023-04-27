



<?php
include("functions.php");
// error_reporting(0);
//session_start();
//$_SESSION['ban_time']-= 3450;
// unset($_SESSION['try']);
// action=admin.php // post = array("officeName"=>"ffff","officeNunm"=>"444","do"=>"addOffice"); 

// print_r(getOfficeInfoBySerivce('dff'));
// echo var_dump((bool) "0");
// echo gettype("0");
//print_r(getDrInfoByEmail("jo@")) ;
//changeEmail('$email' ,'4' ,'fg');

print_r($drID = getDrInfoByEmail('dxcfgvbhjnk')['Dr_id']);
if($drID = getDrInfoByEmail('dxcfgvbhjnk')['Dr_id']){
    echo $drID;

}
?>
