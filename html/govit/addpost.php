<?php

// addpost.php

require_once("lib/errormanagement.php");
require_once("lib/postmanagement.php");

// TODO: add meta information
require_once("header.php");
printHeader("Add post", "Keywords", "Description");

// Start error processing
function inError(){
	global $errors;
	return count($errors) > 0;
}

// Validate fields
// TODO: add full form validation
if (!isUserLoggedIn()) { $errors[] = "You must be logged in to post."; } // isUserLoggedIn() lives in header.php
if (!isset($_POST['submitted'])) { $errors[] = "No form data was received."; }
if (!isset($_POST['title']) || strlen($_POST['title']) <= 0) { $errors[] = "You did not enter a title for your post."; }
if (strlen($_POST['title']) > 500) { $errors[] = "Your title must be less that 500 characters."; }
if (!isset($_POST['content']) || strlen($_POST['content']) <= 0) { $errors[] = "You did not enter any content for your post."; }
if (strlen($_POST['content']) > 3000) { $errors[] = "The content of your post must be less than 3,000 characters."; }

////////////
echo("Strlen post: " . strlen($_POST['content']));


// Make sure the user has sufficient permissions to post
if (!$user_canpost) { $errors[] = "You do not have sufficient permissions to add new posts."; }

if (!inError())
{
	if (add_post($user_id, $_POST['title'], $_POST['content'], $_POST['tags']))
	{
		echo("Your post was successfully added!");
		// TODO: add link to view new post
	}
	else
	{
		$errors[] = "There was an unknown error adding your post";
		echo("ERROR: add_post(" . $user_id . ", " . $_POST['title'] . ", " . $_POST['content'] . ", " . $_POST['tags'] . ")");
	}
}



if (inError())
{
	echo("<p>There were some problems with your form. Please go back and try again.</p><br /><br />");
	
	// Display error messages
	// TODO: change to error handler function
	write_errors($errors); // lives in lib/errormanagement.php
}

require_once("footer.php");

?>