<?php

require_once("usermanagement.php");

function create_session($id) {
    $row = get_user_row($id);
    if($row) {
	$_SESSION['user'] = $row;
	return true;
    }else{
	return false;
    }
  }

function login($email, $password) {
    if(check_password($email, $password)){
	return create_session(user_id($email));
    }else{
	return false;
    }
}

function logout() {
    $_SESSION['user']=null;
}
?>
