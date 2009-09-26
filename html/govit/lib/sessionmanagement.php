<?php

require_once("usermanagement.php");

// Should correspond with session variables in header.php
function create_session($id) {
    $row = get_user($id);
    if($row) {
        $_SESSION['user'] 
            = array('id' => $row['id'],
                    'email' => $row['email'],
                    'firstname' => $row['firstname'],
                    'lastname' => $row['lastname'],
                    'canpost' => $row['canpost'],
                    'validated' => $row['validated']);
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
