<?php

require_once("database.php");


function add_user($email, $password, $firstname, $lastname, $canpost) {
    $dbcon = db_connect();
    $email = mysql_real_escape_string($email);
    $password = mysql_real_escape_string($password);
    $firstname = mysql_real_escape_string($firstname);
    $lastname = mysql_real_escape_string($lastname);
    $canpost_entry = bool_to_int($canpost);
    $valkey = gen_validation_key($email);
    $sql = "INSERT INTO users (email, password, validated, validationkey, joindate, firstname, lastname, canpost)
VALUES ('$email', PASSWORD('$password'), 0, '$valkey', CURDATE(), '$firstname', '$lastname', $canpost_entry)";
    echo $sql;
    $success = mysql_query($sql);
    db_close($dbcon);
    return $success;
}

function email_in_use($email) {
    return user_id($email)!=-1;
}

// Returns the id of the user with the given email, or -1
// if no such user is found.
function user_id($email) {
    $con = db_connect();
    $email = mysql_real_escape_string($email);
    $sql = "SELECT id FROM users WHERE email='$email'";
    echo $sql;
    $result = mysql_query("SELECT id FROM users WHERE email='$email'");
    if(mysql_num_rows($result)>0){
	$id = mysql_result($result, 0);
	db_close($con);
	return $id;
    }else{
	db_close($con);
	return -1;
    }
}

function get_user_row($id){
    $result=mysql_query("SELECT * FROM users WHERE id=$id)");
    if(mysql_num_rows($result)>0){
	return mysql_fetch_array($result);
    }else{
	return null;
    }
}

function get_user_col($id, $col){
    $con = db_connect();
    $result = mysql_query("SELECT $col FROM users WHERE id=$id)");
    if(mysql_num_rows($result)>0){
	$val = mysql_result($result, 0);
	db_close($con);
	return $row[$col];
    }else{
	db_close($con);
	return null;
    }
}

function validate_user($validationkey) {
    if($validationkey=="")
	return false;
    $con = db_connect();
    $validationkey = mysql_real_escape_string($validationkey);
    $result = mysql_query("SELECT id FROM users WHERE validationkey='$validationkey'");
    if(mysql_num_rows($result)==0){
	db_close($con);
	return false;
    }else{
	$id = mysql_result($result, 0);
	mysql_query("UPDATE users SET validated=1, validationkey=''  WHERE id=$id");
	db_close($con);
	return true;
    }
}

function check_password($email, $password) {
    $con = db_connect();
    $email = mysql_real_escape_string($email);
    $password = mysql_real_escape_string($password);
    $result = mysql_query("SELECT * FROM users WHERE email='$email' AND password=PASSWORD('$password')");
    $success = mysql_num_rows($result)>0;
    db_close($con);
    return $success;
}

function gen_validation_key($email) {
    return substr(md5(time().$email), 0, 10);
}

function get_validation_key($email) {
    $con = db_connect();
    $email = mysql_real_escape_string($email);
    $result = mysql_query("SELECT validationkey FROM users WHERE email='$email'");
    $key = "";
    if(mysql_num_rows($result)>0){
	$key = mysql_result($result, 0);
    }
    db_close($con);
    return $key;
}

function is_validated($email) {
    $con = db_connection();
    $email = mysql_real_escape_string($string);
    $result = mysql_query("SELECT validated FROM users WHERE email='$email'");
    if(mysql_num_rows($result)>0) {
	$validated = int_to_bool(mysql_result($result, 0));
	db_close($con);
	return $result;
    }else{
	return false;
    }
}

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