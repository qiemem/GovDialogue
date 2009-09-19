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
    if(check_password($email)){
	return create_session(user_id($email));
    }else{
	return false;
    }
}

function logout() {
    $_SESSION['user']=null;
}
?>
