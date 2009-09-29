<?php

// userdisplay.php
require_once("usermanagement.php");

function print_login_box($divid) {
	?>
    
<div class="loginBox" id="<?= $divid; ?>">            
    <form name="loginForm" method="POST" action="login.php">
        <span class="loginBoxHeader">Login</span>
        <input type="text" name="email" value="Email address" onfocus="if(this.value=='Email address'){this.value='';}" onblur="if(this.value==''){this.value='Email address';}" />
        <input type="text" name="password" value="Password" onfocus="if(this.value=='Password'){this.value='';this.type='password';}" onblur="if(this.value==''){this.value='Password';this.type='text';}" />
        <input type="submit" class="submitButton" value="Login" />
        <p class="bottomText"><a href="join.php">Join</a>&nbsp;|&nbsp;<a href="#">Forgot password?</a></p>
    </form>
</div>
    
    <?php
}

function print_greeting_box($divid) {
    $name = $_SESSION['user']['firstname'];
    echo "<div class=\"loginBox\" id=\"$divid\">\n";
    echo "<span class=\"loginBoxHeader\">Welcome, $name</span>\n";
    echo "<p class=\"bottomText\">Not $name? <a href=\"/govit/logout.php\">Log out.</a></p>\n";
    echo "</div>";
}

function print_user_info($user_id) {
    $user = get_user($user_id);
    echo "<ul class=\"userInfo\">\n";
    echo "<li>First name: ".$user['firstname']."</li>\n";
    echo "<li>Last name: ".$user['lastname']."</li>\n";
    echo "<li>Email: ".$user['email']."</li>\n";
    echo "</ul>\n";
}

?>