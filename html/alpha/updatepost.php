<?php

// updatepost.php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once("lib/errormanagement.php");
require_once("lib/postmanagement.php");

// TODO: add meta information
require_once("header.php");
printHeader("Add post", "Keywords", "Description", "posts");

// Start error processing
function inError(){
    global $errors;
    return count($errors) > 0;
}

// Validate fields
// TODO: add full form validation


if (!isUserLoggedIn()) { $errors[] = "You must be logged in edit a post."; } // isUserLoggedIn() lives in header.php
if (!isset($_POST['postID'])) { $errors[] = "No form data was received."; }
if (!isset($_POST['content']) || (strlen($_POST['content']) <= 0)) { $errors[] = "You did not enter any content for your post."; }
if (strlen($_POST['content']) > 3000) { $errors[] = "The content of your post must be less than 3,000 characters."; }

$postContent = $_POST['content'];
$postID = $_POST['postID'];

$post = get_post($postID);

// Make sure the user has sufficient permissions to post
if ((!$user_canpost) or ($post['user']!=$_SESSION['user']['id'])) { $errors[] = "You do not have sufficient permissions to edit this posts."; }

if (!inError()) {
    if (update_post_content($postID, $postContent)) {
        echo("Your post was edited successfully! \n");
        echo "<a href=\"viewpost.php?postid=$postID\">Go back to post.</a>\n";
    }
    else {
        $errors[] = "There was an unknown error adding your post";
        echo("ERROR: add_post(" . $user_id . ", " . $_POST['title'] . ", " . $_POST['content'] . ", " . $_POST['tags'] . ")");
    }
}



if (inError()) {
    echo("<p>There were some problems with your form. Please go back and try again.</p><br /><br />");
    
    // Display error messages
    // TODO: change to error handler function
    write_errors($errors); // lives in lib/errormanagement.php
}

require_once("footer.php");

?>