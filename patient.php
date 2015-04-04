<?php
session_start();

if (isset($_REQUEST['a'])) {
    # Action set
    //if (isset($_REQUEST
}

if ($_SESSION['level'] == 'patient') {
    date_default_timezone_get('America/Halifax');
    $date = date('Y-m-d');
?>
<html>
<title>Patient Calandar Page</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<body>
<p> <?php echo "Welcome, ". $_SESSION['first'] . " " . $_SESSION['last'] . "!";?></p>

<p><a href="logout.php">Logout</a> &nbsp; <a href="profile.php">Update Profile</a></p>
<h2>List of your future schedules</h2>
<?php
    require_once("conn.php");
    $time = date('U');
    $sql = "SELECT `id`,`pid`,`eid`,`type`,`duration`,FROM_UNIXTIME(`unixtime`) FROM `" . $prefix . "schedule` WHERE `pid` = '" . $_SESSION['uid'] ."' AND `unixtime` > " . $time;
    $results = $db->query($sql);

    if ($results->num_rows == 0) {
        echo '<p>You have no appointments today or in the future.</p>';
    }
    else{
        echo "<table border='2'>";
        echo "<th>Calendar ID</th><th>Patient Name</th><th>Doctor Name</th><th>Time</th><th>Duration (minutes)</th><th>Cancel?</th>";

        while ($row = $results->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $_SESSION['first'] . " " . $_SESSION['last'] . "</td>";
            $employee = $db->query("SELECT `first`,`last` FROM `". $prefix . "employee` WHERE `id`='" . $row['eid'] . "'");
            $ename = $employee->fetch_assoc();
            echo "<td>" . $ename['first'] . " " . $ename['last'] . "</td>";
            echo "<td>" . $row['FROM_UNIXTIME(`unixtime`)'] . "</td>";
            echo "<td>" . $row['duration'] . "</td>";
            echo "<td><a href=patient.php?a=d&cid=".$row['id']."&username=".$_SESSION['user'].">Cancel</td>";
            echo "</tr>";
        }
    }
?>

</body>
</html>
<?php
}
else {
    header("location:index.php");
}
?>
