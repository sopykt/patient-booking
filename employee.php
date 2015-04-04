<?php
session_start();
if ($_SESSION['level'] == 'employee') {
?>
<html>
<head>
<title>Employee Page</title>
</head>
<body>
<p><?php echo "You have logged in, ". $_SESSION['first'] . " ". $_SESSION['last'] . "."; ?>
<p><a href="logout.php">Logout</a> &nbsp; <a href="manage.php">Manage</a> &nbsp; <a href="profile.php">Update Profile</a></p>
</body>
</html>
<?php
}
else {
    header("location:index.php");
}
?>
