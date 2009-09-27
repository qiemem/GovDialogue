<?php

// userdisplay.php

function print_login_box($divid)
{
	?>
    
<div class="loginBox" id="<?= $divid; ?>">            
    <form name="loginForm" method="POST" action="<?php $_SERVER["PHP_SELF"] ?>">
        <span class="loginBoxHeader">Login</span>
        <input type="text" name="email" value="Email address" onfocus="if(this.value=='Email address'){this.value='';}" onblur="if(this.value==''){this.value='Email address';}" />
        <input type="text" name="password" value="Password" onfocus="if(this.value=='Password'){this.value='';this.type='password';}" onblur="if(this.value==''){this.value='Password';this.type='text';}" />
        <input type="submit" class="submitButton" value="Login" />
		<p class="bottomText"><a href="join.php">Join</a>&nbsp;|&nbsp;<a href="#">Forgot password?</a></p>
    </form>
</div>
    
    <?php
}

?>