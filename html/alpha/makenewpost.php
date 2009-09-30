<?php

// makenewpost.php
error_reporting(E_ALL);
ini_set('display_errors', true);
require_once("header.php");
printHeader("Title", "Keywords", "Description", "newpost");


?>

<h2>Make a new post</h2>

<?php

if (isUserLoggedIn())
{

?>

<form name="newPostForm" id="newPostForm" method="POST" action="addpost.php">

    <p><input type="text" name="title" size="50" value="Post title" onfocus="if(this.value=='Post title'){this.value='';}" onblur="if(this.value==''){this.value='Post title';}" /></p>
    
    <p><textarea name="content" id="content" rows="7" cols="70" onfocus="if(this.value=='Write your post here'){this.value='';}" onblur="if(this.value==''){this.value='Write your post here';}">Write your post here</textarea></p>
    
    <p><input type="tags" name="tags" size="50" value="Tags (space-separated)" onfocus="if(this.value=='Tags (space-separated)'){this.value='';}" onblur="if(this.value==''){this.value='Tags (space-separated)';}" /></p>
    
    <p><input type="submit" id="submitButton" value="Add Post" name="submitted"/></p>

</form>

<?php

}
else
{
	echo("<p>You must be logged in to post.</p>");
}

require_once("footer.php");

?>