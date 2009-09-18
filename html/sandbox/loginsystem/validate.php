<?php
ob_start();

// va.php

require_once("header.php");


if (!isset($_GET['v']))
{
	echo("<p>Error: invalid verification code.</p>");
}
else
{

	$vcode = $_GET['v'];

	$connection = dbConnect($dbname);
	$query = "SELECT * FROM user WHERE validationcode = '" . $vcode . "'";
	$result = mysql_query($query, $connection) or die("Could not connect to the database.");

	$thearray = mysql_fetch_array($result);
	if (isset($thearray['id']))
	{
		$userid = $thearray['id'];
		
		$query2 = "UPDATE user SET validated = '1' WHERE id = '" . $userid . "' LIMIT 1";
		$result2 = mysql_query($query2, $connection) or die("There was an error verifying your email address.");
		
		
		// Create session
		// Create user as an array in a session variable
		$_SESSION['user'] = array(
				'id' => mysql_result($result, 0, 'id'),
				'fullname' => mysql_result($result, 0, 'fullname'),
				'username' => mysql_result($result, 0, 'username'),
				'email' => mysql_result($result, 0, 'email'),
				'zipcode' => mysql_result($result, 0, 'zipcode')
			);


		function selfURL() { $s = empty($_SERVER["HTTPS"]) ? '' : ($_SERVER["HTTPS"] == "on") ? "s" : ""; $protocol = strleft(strtolower($_SERVER["SERVER_PROTOCOL"]), "/").$s; $port = ($_SERVER["SERVER_PORT"] == "80") ? "" : (":".$_SERVER["SERVER_PORT"]); return $protocol."://".$_SERVER['SERVER_NAME'].$port.$_SERVER['REQUEST_URI']; } function strleft($s1, $s2) { return substr($s1, 0, strpos($s1, $s2)); }

		if (!$user_isLoggedIn) {
			header("Location: " . selfURL());
			exit();
		}
		
?>

<h2>Welcome!</h2>

Thanks! Your email address has been verified.

<?php
	}
	else
	{
	?>
	
	There was an error verifying your email address.
	
		
		<?php
	}
}


require_once("footer.php");

ob_flush();
?>