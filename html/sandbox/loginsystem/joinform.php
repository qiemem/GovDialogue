<?php

// joinform.php

?>

<h2>Join</h2>

<form name="joinForm" method="POST" action="<?php $_SERVER["PHP_SELF"] ?>">

	<p>
		Full name:
		<input id="fullname" name="fullname" type="text" />		
	</p>
	
	<p>
		Username:
		<input id="username" name="username" type="text" />		
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
		Email address:
		<input id="email" name="email" type="text" />		
	</p>
	
	<p>
		Zip code:
		<input id="zipcode" name="zipcode" type="text" />		
	</p>

	<p>
		<input type="submit" value="Submit" name="submitted">
		<input type="reset" value="Reset">
	</p>


</form>