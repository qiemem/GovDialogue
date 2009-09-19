<?php

require_once("usermanagement.php");

function create_session($id) {
    $result = get_user_row($id);
    if($result) {
	$_SESSION['user'] 
	    = array('id' => mysql_result($result, 0, 'id'),
		    'email' => mysql_result($result, 0, 'email'),
		    'firstname' => mysql_result($result, 0, 'firstname'),
		    'lastname' => mysql_result($result, 0, 'lastname'),
		    'canpost' => mysql_result($result, 0, 'canport'),
		    'validated' => int_to_bool(mysql_result($result, 0, 'validated')));
	return true;
    }else{
	return false;
    }
  }

function login($email, $password) {
<<<<<<< HEAD:html/govit/lib/sessionmanagement.php
    if(check_password($email)){
=======
    if(check_password($email, $password)){
>>>>>>> a39ec99917e2cbd401c52ce37e0cd7a19ac15bab:html/govit/lib/sessionmanagement.php
	return create_session(user_id($email));
    }else{
	return false;
    }
}

function logout() {
    $_SESSION['user']=null;
}
?>
