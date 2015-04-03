<?php
if (isset($_SESSION['user'])) {
    header("location:home.php");
}
else {
?>
<html>
<head>
</head>
<body>
</body>
</html>
<?php
}
?>
