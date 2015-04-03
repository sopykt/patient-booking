<?php
if ($_SESSION['level'] == 'patient'){
    echo "You are now on patient page!";
}
else {
    header("location:index.php");
}
?>
