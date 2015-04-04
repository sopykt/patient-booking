<?php
session_start();

if (!(isset($_SESSION['level']))) {
    header("location:index.php");
}

if ($_SESSION['level'] != 'employee') {
    header("location:index.php");
}
?>

<html>
<head>
<title>Profile Manager</title>
</head>
<body>
</body>
</html>
