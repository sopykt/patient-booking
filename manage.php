<?php
session_start();
if ($_SESSION['level'] == 'employee' && $_SESSION['level'] != 'patient') {
    # Can manage both patient records and employee schedule
?>

<?php
}
else if ($_SESSION['level'] == 'patient' || $_SESSION['level'] == 'employee') {
    # Can only manage his/her own schedule
?>

<?php
}
else {
    # Not registered
    header("location:index.php");
}
?>
