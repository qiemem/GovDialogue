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

<form name="newPostForm" method="POST" action="addpost.php">

    <p>Title:</p>
    <p><input type="text" name="title" size="50" /></p>
    
    <p><textarea nme="content" id="content" rows="15" cols="70">Write post here</textarea></p>
    
    <p>Tags (comma separated: tag one, tag two, etc.)</p>
    <p><input type="tags" name="title" size="50" /></p>
    
    <p>
        <input type="submit" value="Submit" name="submitted"/>
    </p>

</form>

<?php

}
else
{
	echo("You must be logged in to post.");
}

require_once("footer.php");

?>