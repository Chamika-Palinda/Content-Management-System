<?php 


$db['db_host']="localhost";
$db['db_user']="root";
$db['db_pass']="gigabytechassis890@";
$db['db_name']="cms";

foreach($db as $key => $value){

define (strtoupper($key),$value);

}

$connection=mysqli_connect('localhost','root','gigabytechassis890@','cms');

// if($connection){

//     echo "We are connected";
// }





?>