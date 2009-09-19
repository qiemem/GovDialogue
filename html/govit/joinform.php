<?php

// joinform.php

?>

<h2>Join</h2>

<form name="joinForm" method="POST" action="<?php $_SERVER["PHP_SELF"] ?>">

	<p>
		First name:
		<input id="fullname" name="firstname" type="text" />		
	</p>
    
    <p>
		Last name:
		<input id="fullname" name="lastname" type="text" />		
	</p>
    
    <p>
		Email address:
		<input id="email" name="email" type="text" />		
	</p>

	<p>
		Password:
		<input id="password1" name="password1" type="password" />		
	</p>
	
	<p>
		Confirm password:
		<input id="password2" name="password2" type="password" />		
	</p>

	<p>
		<input type="submit" value="Submit" name="submitted">
		<input type="reset" value="Reset">
	</p>

</form>