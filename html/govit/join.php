<?php

// join.php

require_once("header.php");
printHeader("Join", "Keywords", "Description");

/* Structure:

Is user logged in? If yes:
	Display error
Else
	Has form data been submitted? If yes:
		Validate fields
		Errors? If yes:
			Display errors
		Else:
			Process form
	Else
		Display join form

*/

// Start error processing
function inError(){
	global $errors;
	return count($errors) > 0;
}

if ($user_isLoggedIn)
{
	// User is already logged in; display error
	echo("You're already logged in!");
}
else
{
	if (isset($_POST["submitted"]))
	{
		// Form has been submitted
		echo("<p>Form has been submitted</p>");
		
		
		// Validate fields and create user
	
		$errors = array();
		
		// Check fields
		if (strlen($_POST['firstname']) <= 0) {
				$errors[] = 'You must enter your firstname';
		}
		if (strlen($_POST['lastname']) <= 0) {
				$errors[] = 'You must enter your last name.';
		}
		if (strlen($_POST['email']) <= 0) {
				$errors[] = 'You must enter your email address';
		}
		if (strlen($_POST['zipcode']) <= 0) {
				$errors[] = 'You must enter your zip code.';
		}
		if (strlen($_POST['password1']) < 6) {
				$errors[] = 'Your password must be at least 6 characters long.';
		}
		if ($_POST['password1'] != $_POST['password2']) {
				$errors[] = 'Your passwords don\'t match.';
		}
		
		
		/*
		
		TODO: add reCAPTCHA to form
		
		// Verify reCAPTCHA
		require_once('recaptchalib.php');
		$privatekey = "6Ld7MQcAAAAAABVrkgntR-suieZdkTl2iuO915qZ";
		$resp = recaptcha_check_answer ($privatekey,
									$_SERVER["REMOTE_ADDR"],
									$_POST["recaptcha_challenge_field"],
									$_POST["recaptcha_response_field"]);
		if (!$resp->is_valid)
		{
			$errors[] = "The reCAPTCHA wasn't entered correctly. (reCAPTCHA said: " . $resp->error . ")";
		}
		*/
		
		if (email_in_use($_POST['email']))
		{
			$errors[] = 'That email address is already in use.';
		}
		
		if (!inError())
		{
			
			if(!add_user($_POST['email'], $_POST['password'], $_POST['firstname'], $_POST['lastname'], 0))
			{
				$errors[] = 'There was a database error.';
			}
			else
			{	
				echo("<p>User added successfully!!</p><p><em>TODO: Send confirmation email with validation link.</em></p><p>In the meantime, visit this link to validate the account: http://www.lonelyear.com/validate.php?v=$validation</p>");
			
				/*
				
				// User successfully created!
				$emailMessage = "Hi $_POST[fullname],
				
This is where a welcome message would go.

Yours,
The Script
";

				// Send email confirmation
				if(mail($_POST['email'], "Welcome message subject", $emailMessage, "From: Email address <realemailaddress@domain.com>"))
				{
					?>
					
					Thanks! You should get an email at <strong><?php echo($_POST['email']); ?></strong> with a confirmation link. Once you verify your email address, you'll be able to post.
					
					<?php
					
					mail("joey@morninj.com", "New user", "New user: $_POST[fullname] ($_POST[email])", "From: realemailaddress@domain.com"); 
					
				}
				else
				{
					echo("There was an error with your submission.");
				}

				*/
	
			}
			
			
		}
		
		if (inError())
		{
			
			echo("<p>There were some problems with your form. Please go back and try again.</p><br /><br />");
			
			// Display error messages
			for ($i = 0; $i < count($errors); $i++)
			{
				displayError($errors[$i]);
				// (displayError() is in common.php)
			}
			
		}
		
	}
	else
	{
		// Form hasn't been submitted; display join form
		include("joinform.php");
	}
}

?>




<?php

require_once("footer.php");

?>