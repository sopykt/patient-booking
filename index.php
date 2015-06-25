<?php
# Check mysql
require_once("conn.php");
session_start();
if (isset($_SESSION['level'])) {
    header("location:select.php");
}
else {
    # Login table.
?>
<html>
<head>
<title>Login</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="js/index.js"></script>
</head>
<body>
<h1>Welcome to the patient booking website for FeelBetter Physiotherapy Clinic</h1>
<?php
    if (isset($_REQUEST['m'])) {
        echo "<p>" . $_REQUEST['m'] . "</p>";
    }
?>
<h2 id="login-title">Login</h2>
<div id="loginpanel">
<form>
Username:<br>
<input type="text" id="usernameinput">
<br>
Password:<br>
<input type="password" id="passwordinput">
<br />
<input type="radio" name="ue" value="patient" checked>Patient
<br />
<input type="radio" name="ue" value="employee">Employee
<br />
<input type="button" id='submitbutton' value="Submit"> &nbsp; <input type="button" value="Reset" id="resetbutton">
<br />
<a href="register.php" id='registerbutton'>Not Registered?</a>
</form> 
<p id='index-msg'>
</div>
<p>&copy; Luxing Huang</p>
</body>
</html>
<?php
}
?>
