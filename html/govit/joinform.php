<?php

// joinform.php

?>

<h2>Join</h2>

<p class="joinIntro">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

<form name="joinForm" id="joinForm" method="POST" action="<?php $_SERVER["PHP_SELF"] ?>">

	<p><input id="firstname" name="firstname" type="text" value="First Name"
    	onblur="if(this.value==''){this.value='First Name';}this.style.borderColor='#cccccc';"
        onfocus="if(this.value=='First Name'){this.value='';}this.style.borderColor='#777777';"/></p>
    
    <p><input id="firstname" name="lastname" type="text" value="Last Name"
    	onblur="if(this.value==''){this.value='Last Name';}this.style.borderColor='#cccccc';"
        onfocus="if(this.value=='Last Name'){this.value='';}this.style.borderColor='#777777';"/></p>
    
    <p><input id="email" name="email" type="text" value="Email address"
    	onblur="if(this.value==''){this.value='Email address';}this.style.borderColor='#cccccc';"
        onfocus="if(this.value=='Email address'){this.value='';}this.style.borderColor='#777777';"/></p>

	<p><input id="password1" name="password1" type="text" value="Password"
    	onblur="if(this.value==''){this.value='Password';this.type='text'}this.style.borderColor='#cccccc';if(this.value=='Password'){this.type='text';}"
        onfocus="if(this.value=='Password'){this.value='';this.type='password'}this.style.borderColor='#777777';"/></p>
	
	<p><input id="password2" name="password2" type="text" value="Re-enter your password"
    	onblur="if(this.value==''){this.value='Re-enter your password';this.type='text'}this.style.borderColor='#cccccc';if(this.value=='Re-enter your password'){this.type='text';}"
        onfocus="if(this.value=='Re-enter your password'){this.value='';this.type='password'}this.style.borderColor='#777777';"/></p>

	<p><input id="tos" name="tos" value="0" type="checkbox" class="checkboxes" /><label for="tos">I have read and agree to the <a href="termsofservice.php">terms of service</label></p>

	<p><input type="submit" class="submitButton" value="Join" name="submitted" /></p>

</form>