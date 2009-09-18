<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>User login system documentation</title>
</head>

<body>

<h1>Documentation: User Login System</h1>

<ol type="1">
	<li><a href="#files">Files</a>
	<li><a href="#globalvariables">Global variables</a>
	<li><a href="#databasestructure">Database structure</a>
</ol>

<hr />

<a name="files"></a>
<h2>Files</h2>

	<ul>
		<li><strong>common.php</strong>: containes widely-used functions and config information</li>
		<li><strong>editprofile.php</strong>: lets a user edit his/her profile; only displays edit form if the user is logged in</li>
		<li><strong>footer.php</strong></li>
		<li><strong>header.php</strong></li>
		<li><strong>index.php</strong></li>
		<li><strong>join.php</strong></li>
		<li><strong>login.php</strong>: simple login form</li>
		<li><strong>logout.php</strong>: logs the user out and redirects to a specific page</li>
		<li><strong>validate.php</strong>: used to validate a user's email address; a user will visit this page once they've registered to activate their account</li>
	</ul>

<hr />

<a name="globalvariables">
<h2>Global variables</h2>

	<p>User information is stored as an array, "user", in a session variable. It can be accessed via <strong>$_SESSION['user']</strong>.</p>

	<h3>User data</h3>
	
	<ul>
		<li><strong>$user_isLoggedIn</strong>: true/false</li>
		<li><strong>$user_id</strong></li>
		<li><strong>$user_username</strong></li>
		<li><strong>$user_fullname</strong></li>
		<li><strong>$user_email</strong></li>
		<li><strong>$user_zipcode</strong></li>
		<li><em>TODO: add more user fields, and add them as database fields and form fields</em></li>
	</ul>
	
	<h3>Page data</h3>
	
	<ul>
		<li><strong>$page_title</strong>: set the page title with this variable</li>
		<li><strong>$page_description</strong>: descriptive text (used for meta tags)</li>
		<li><strong>$page_keywords</strong>: (also used for meta tags)</li>
		<li><em>TODO: add meta tags to HTML</em></li>
	</ul>
	
<hr />

<a name="databasestructure">
<h2>Database Structure</h2>

<h3>Table: user</h3>

	<ul>
		<li><strong>id</strong>: INT. not null, auto increment, primary key</li>
		<li><strong>username</strong>: VARCHAR 200</li>
		<li><strong>password</strong>: VARCHAR 200, encoded with PASSWORD()</li>
		<li><strong>fullname</strong>: VARCHAR 200</li>
		<li><strong>email</strong>: VARCHAR 200</li>
		<li><strong>zipcode</strong>: VARCHAR 20</li>
	</ul>

</body>
</html>
