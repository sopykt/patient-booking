<?php
if (!(isset($_SESSION['user']))) {
    header("location:index.php");
}
else if($_SESSION['level'] == 'patients' ) {
    header("location:patient.php");
}
else if($_SESSION['level'] == 'employee' ) {
    header("location:employee.php");
}
?>
