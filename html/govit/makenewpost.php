<?php

// makenewpost.php
error_reporting(E_ALL);
ini_set('display_errors', true);
require_once("header.php");
printHeader("Title", "Keywords", "Description");


?>

<h2>Make a new post</h2>

<?php

if (isUserLoggedIn())
{

?>

<form name="newPostForm" id="newPostForm" method="POST" action="addpost.php">

    <p><input type="text" name="title" size="50" value="Post title" /></p>
    
    <p><textarea name="content" id="content" rows="15" cols="70">Write your post here</textarea></p>
    
    <p><input type="tags" name="tags" size="50" /></p>
    
    <p><input type="submit" id="submitButton" value="Add Post" name="submitted"/></p>

</form>

<?php

}
else
{
	echo("You must be logged in to post.");
}

require_once("footer.php");

?>