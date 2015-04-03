<?php
if (isset($_REQUEST['POST'])) {
    echo 'request received';
    echo '<pre>';
    print_r($_REQUEST);
}
else if (isset($_REQUEST['GET'])) {
    echo 'Get request received.';
}
?>
