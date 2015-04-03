<?php
if (!(isset($_SESSION['user']))) {
    header("location:index.php");
}
else if($_SESSION['level'] == 'patient' ) {
    header("location:patient.php");
}
else if($_SESSION['level'] == 'employee' ) {
    header("location:employee.php");
}
else {
    header("location:index.php");
}
?>
