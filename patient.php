<?php
session_start();
if ($_SESSION['level'] == 'patient') {
?>
<html>
<title>Patient Calandar Page</title>
<body>
<p> <?php echo "You are now on patient page: ". $_SESSION['user'];?></p>
<p><a href="logout.php">Logout</a>
</body>
</html>
<?php
}
else {
    header("location:index.php");
}
?>
