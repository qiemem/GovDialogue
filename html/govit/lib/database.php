<?php

require_once("dbconfig.php");

function db_connect($db="") {
    global $_dbhost_, $_dbuser_, $_dbpass_, $_dbname_;
    
    if($db=="") {
        $db = $_dbname_;
    }
    
    $dbcon = mysql_connect($_dbhost_, $_dbuser_, $_dbpass_);
    if (!$dbcon) {
        die('Could not connect to database: ' . mysql_error());
    }
    
    if ($db=="" or !mysql_select_db($db, $dbcon)){
        die("The site database is unavailable.");
    }
    
    return $dbcon;
}

function db_close($dbcon) {
    mysql_close($dbcon);
}

?>