<?php

// common.php


/////////////////////////////////
// Database                    //
/////////////////////////////////

// Creates a function to create a database connection

$dbhost = "localhost";
$dbname = "db72199_govdb";
$dbuser = "root";
$dbpass = "sapass";

function dbConnect($db="") {
   global $dbhost, $dbuser, $dbpass;
   
   $dbcnx = @mysql_connect($dbhost, $dbuser, $dbpass)
       or die("The site database appears to be down.");

   if ($db!="" and !@mysql_select_db($db))
       die("The site database is unavailable.");
   
   return $dbcnx;
}


/////////////////////////////////
// Display functions           //
/////////////////////////////////

function makeThumbnail($id, $imgid) {
	?>
<div class="thumbnail">
	<a href="/detail.php?id=<?php echo($id); ?>"><img src="/images/posts/<?php echo($imgid); ?>_thumb.jpg" width="100" height="100" border="0" alt="thumbnail" />
</div>
	<?php
}

function makeGallery($number) {
	$connection = dbConnect("db72199_lonely") or die("Could not connect to the database.");
	$query = "SELECT * FROM post ORDER BY RAND() LIMIT " . $number;
	$result = mysql_query($query, $connection) or die(mysql_error());
	while ($row = mysql_fetch_array($result))
	{
		?>
			<div class="thumbnail">
				<a href="/detail.php?id=<?php echo($row['id']); ?>"><img src="/images/posts/<?php echo($row['imgid']); ?>_thumb.jpg" width="100" height="100" border="0" alt="<?php echo($row['description']); ?>" /></a>
			</div>
		<?php
	}
}

function listTags($id)
{
	$connection = dbConnect("db72199_lonely") or die("Could not connect to the database.");
	$query = "SELECT * FROM tag WHERE post_id = '" . $id ."' ORDER BY tag ASC";
	$result = mysql_query($query, $connection) or die(mysql_error());
	
	$num = mysql_num_rows($result);
	$i = 0;
	
	while ($row = mysql_fetch_array($result))
	{
		$i++;
		?><a href="tag.php?id=<?php echo($row['id']); ?>"><?php echo($row['tag']); ?></a><?php if ($i < $num) { echo(", "); }
	}
	
	if ($num == 0) { echo("(none)"); }
}

function listTagsForURL($id)
{
	$connection = dbConnect("db72199_lonely") or die("Could not connect to the database.");
	$query = "SELECT * FROM tag WHERE post_id = '" . $id ."' ORDER BY tag ASC";
	$result = mysql_query($query, $connection) or die(mysql_error());
	
	$num = mysql_num_rows($result);
	$i = 0;
	
	$returnstr = "";
	
	while ($row = mysql_fetch_array($result))
	{
		$i++;
		$returnstr .= ($row['tag']);
		if ($i < $num) { $returnstr .= (",%20"); }
	}
	
	return $returnstr;
	
}


/////////////////////////////////
// Error messages              //
/////////////////////////////////

// Show error message
function displayError($msg) {
   ?>
   
<div class="errormsg"><?php echo($msg); ?></div>
   
<?php
}


/////////////////////////////////
// Miscellaneous               //
/////////////////////////////////

// Get TinyURL
function getTinyURL($url)
{
	$ch = curl_init();
	$timeout = 5; // set to zero for no timeout
	curl_setopt ($ch, CURLOPT_URL, ('http://tinyurl.com/api-create.php?url=' . $url));
	curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
	$file_contents = curl_exec($ch);
	curl_close($ch);

// display file
return $file_contents;

}

?>
