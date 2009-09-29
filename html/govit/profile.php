<?php

  // viewpost.php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once("header.php");
require_once("lib/userdisplay.php");
require_once("lib/sessionmanagement.php");
printHeader("Title", "Keywords", "Description","profile");
if(is_logged_in()){
    print_user_info($_SESSION['user']['id']);
 }else{
    echo "You need to <a href=\"login.php\">login</a> to see your profile.\n";
 }

require_once("footer.php");
?>