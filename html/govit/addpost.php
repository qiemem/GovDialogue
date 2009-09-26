<?php

// addpost.php
error_reporting(E_ALL);
ini_set('display_errors', true);
require_once("header.php");
printHeader("Title", "Keywords", "Description");

// Start error processing
function inError(){
	global $errors;
	return count($errors) > 0;
}

if (!isUserLoggedIn) { $errors[] = "You must be logged in to post."; }
if (!isset($_POST['submitted'])) { $errors[] = "No form data was received."; }
if (!isset($_POST['title']) || strlen($_POST['title'] <= 0)) { $errors[] = "You did not enter a title for your post."; }
if (strlen($_POST['title'] > 500)) { $errors[] = "Your title must be less that 500 characters."; }
if (!isset($_POST['content']) || strlen($_POST['content'] <= 0)) { $errors[] = "You did not enter any content for your post."; }
if (!isset($_POST['content'] > 3000)) { $errors[] = "The content of your post must be less than 3,000 characters."; }

if (!inError())
{
}

if (inError())
{
	echo("<p>There were some problems with your form. Please go back and try again.</p><br /><br />");
	
	// Display error messages
	for ($i = 0; $i < count($errors); $i++)
	{
		echo($errors[$i] . "<br />");
	}
}

require_once("footer.php");

?>