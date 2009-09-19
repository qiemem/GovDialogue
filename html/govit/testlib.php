<?php

ini_set('display_errors',1);
error_reporting(E_ALL);

require_once("lib/usermanagement.php");

if(add_user("abcd@123.tv", "pass", "Foo", "Bar", true)){
    echo("ya");
 }else{
    echo("fuck");
 }
?>
hi