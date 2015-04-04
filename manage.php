<?php
session_start();
if ($_SESSION['level'] == 'employee') {
?>

<?php
}
else {
    header("location:index.php");
}
?>
