<?php

require_once("database.php");


function add_user($email, $password, $firstname, $lastname, $canpost) {
    $dbcon = db_connect();
    $canpost_entry = bool_to_int($canpost);
    $valkey = gen_validation_key($id);
    $sql = "INSERT INTO users (email, password, validated, validationkey, joindate, firstname, lastname, canpost)
VALUES ('$email', PASSWORD('$password'), 0, '$valkey', CURDATE(), '$firstname', '$lastname', $canpost_entry)";
    $success = mysql_query($sql);
    db_close($dbcon);
    return $success;
}

function email_in_use($email) {
    return user_id($email)==-1;
}

function user_id($email) {
    $result = mysql_query("SELECT id FROM users WHERE email='$email'");
    if($row = mysql_fetch_array($result)){
	return $row['id'];
    }else{
	return -1;
    }
}

function get_user_row($id){
    $result=mysql_query("SELECT * FROM users WHERE id=$id)");
    return mysql_fetch_array($result);
}

function get_user_col($id, $col){
    $result = mysql_query("SELECT $col FROM users WHERE id=$id)");
    $row = mysql_fetch_array($result);
    if($row){
	return $row[$col];
    }else{
	return null;
    }
}

function validate_user($id, $validationkey) {
    $con = db_connect();
    $result = mysql_query("SELECT validationkey FROM users WHERE id='$id'");
    $row = mysql_fetch_array($result);
    if(!$row or $row['validationkey']!=$validationkey){
	db_close($con);
	return false;
    }else{
	mysql_query("UPDATE users SET validated=1 WHERE id=$id");
	db_close($con);
	return true;
    }
}



function gen_validation_key($id) {
    return substr(md5(time().$id), 0, 10);
}

function get_validation_key($id) {


function bool_to_int($bool){
    if($bool) {
	return 1;
    } else {
	return 0;
    }
}

function int_to_bool($int){
    if($int==0) {
	return false;
    } else {
	return true;
    }
}
?>