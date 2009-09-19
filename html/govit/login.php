<?php

// login.php

require_once("lib/sessionmanagement.php");

require_once("header.php");
printHeader("Login", "Keywords", "Description");

if (isset($_SESSION['user'])) {
	
	// If session is set, user is logged in
	
	echo("You're already logged in as " . $user_firstname);
}
else
{
	
	// Check if form has been submitted
	
	if (isset($_POST['email']))
	{
		// Form has been submitted
		// Validate fields
			
			// Username and password missing
			if (strlen($_POST['email']) <= 0 || strlen($_POST['password']) <= 0)
			{
				echo("Missing information!");
			}
			else
			{
				if(login($_POST['email'], $_POST['password']))
				{
					echo("Logged in.");
				}
				else
				{
					echo("Invalid login.");
				}
			}	
	}
	else
	{
		// No form has been submitted
		// So, display login form
		
		?>
		
<form name="loginForm" method="POST" action="<?php $_SERVER["PHP_SELF"] ?>">

<p>
	Email address: <input type="text" name="email" />
</p>

<p>
	Password: <input type="password" name="password" />
</p>

<input type="submit" value="Submit" />

</form>
        
		<?php
	}
	
}
require_once("footer.php");

?>