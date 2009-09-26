<?php

// index.php

require_once("header.php");
printHeader("Title", "Keywords", "Description");

function inError(){
	global $errors;
	return count($errors) > 0;
}

if (!isUserLoggedIn()) { $errors['You must be logged in to reply.']; }
if (!isset($_POST['parentNode'])) { $errors['There was an error with your request.']; }
if (!isset($_POST['replyType'])) { $errors['Invalid reply type']; }
if (!isset($_POST['replyText']) || strlen($_POST['replyText']) <= 1) { $errors['Your reply was empty.']; }
if (strlen($_POST) > 500) { $errors['Your reply must be less than 500 characters.']; }

if (!inError())
{
	// Post comment
	
	// Determine whether it's supposed to post a reply to a post or a comment
	if ($_POST['replyType'] == "post")
	{
		// post reply to top-level post
	}
	else
	{
		// post reply to comment
	}
	
}
else
{
	// Display errors
	echo("<p>There were some problems with your form. Please go back and try again.</p><br /><br />");
	
	// Display error messages
	echo("<ul>\n");
	for ($i = 0; $i < count($errors); $i++)
	{
		echo("<li>" . $errors[$i] . "</li>");
	}
	echo("</ul>");

}

require_once("footer.php");

?>