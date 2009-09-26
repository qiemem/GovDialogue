<?php

// login.php

ob_start();

require_once("lib/sessionmanagement.php");

require_once("header.php");
printHeader("Login", "Keywords", "Description");

if (isset($_SESSION['user'])) {
	
	// If session is set, user is logged in
	
	echo("Logged in as " . $user_firstname);
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
					header("Location: http://dev.morninj.com/govit/login.php");
					exit();	
				}
				else
				{
					echo("The email address and password you entered don't match our records. Please go back and try again.");
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

ob_flush();

?>