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

function user_id($email) {
    $con = db_connect();
    $email = mysql_real_escape_string($email);
    $sql = "SELECT id FROM users WHERE email='$email'";
    echo $sql;
    $result = mysql_query("SELECT id FROM users WHERE email='$email'");
    if(mysql_num_rows($result)>0){
	$row = mysql_fetch_array($result);
	db_close($con);
	return $row['id'];
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
	$row = mysql_fetch_array($result);
	db_close($con);
	return $row[$col];
    }else{
	db_close($con);
	return null;
    }
}

function validate_user($id, $validationkey) {
    $con = db_connect();
    $result = mysql_query("SELECT validationkey FROM users WHERE id=$id AND validationkey='$validationkey'");
    if(mysql_num_rows($result)==0){
	db_close($con);
	return false;
    }else{
	mysql_query("UPDATE users SET validated=1 WHERE id=$id");
	db_close($con);
	return true;
    }
}

function gen_validation_key($email) {
    return substr(md5(time().$email), 0, 10);
}

function get_validation_key($id) {
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