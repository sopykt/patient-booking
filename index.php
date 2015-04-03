<?php
if (isset($_SESSION['user'])) {
    header("location:select.php");
}
else {
    # Login table.
?>
<html>
<head>
<title>Login</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
</head>
<body>
<h2 id="login-title">Login</h2>
<div id="loginpanel">
<form>
Username:<br>
<input type="text" name="usernameinput">
<br>
Password:<br>
<input type="password" id="passwordinput">
<input type="button" id='submitbutton' value="Submit"> &nbsp; <input type="button" value="Reset" id="resetbutton">
<br />
<a href="register.php" id='registerbutton'>Not Registered?</a>
</form> 
</div>
</body>
</html>
<?php
}
?>
