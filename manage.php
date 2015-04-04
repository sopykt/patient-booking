<?php
session_start();
if ($_SESSION['level'] == 'employee') {
    # Can manage both patient records and employee schedule
?>

<?php
}
else {
    # Not registered user
    header("location:index.php");
}
?>
