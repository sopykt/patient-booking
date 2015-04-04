<?php
session_start();
$msg = '';
$time = date('U');
require_once("conn.php");
if ($_SESSION['level'] == 'employee') {
    # Delete module
    if (isset($_REQUEST['a']) && $_REQUEST['a'] == 'd') {
        if (isset($_REQUEST['cid'])) {
            $cid = $_REQUEST['cid'];
            $sql = "DELETE FROM `" . $prefix . "schedule` WHERE `id` = $cid;";
            $db->query($sql);
        }

        if (isset($_REQUEST['t']) && $_REQUEST['t'] == 'puser') {
            if (isset($_REQUEST['uid'])) {
                $uid = $_REQUEST['uid'];
                $sql = "DELETE FROM `" . $prefix . "puser` WHERE `id` = $uid";
                $db->query($sql);
            }
        }

        if (isset($_REQUEST['t']) && $_REQUEST['t'] == 'employee') {
            if (isset($_REQUEST['uid'])) {
                $uid = $_REQUEST['uid'];
                $sql = "DELETE FROM `" . $prefix . "employee` WHERE `id` = $uid";
                $db->query($sql);
            }
        }
    }
    # Can manage both patient records and employee schedule
    $sql_allPatients = "SELECT * FROM `" . $prefix . "puser` ORDER BY `last`";
    $sql_allEmployee = "SELECT * FROM `" . $prefix . "employee` ORDER BY `last`";
    $sql_allSched = "SELECT `id`,`pid`,`eid`,`type`,`duration`,FROM_UNIXTIME(`unixtime`) FROM `" . $prefix . "schedule` WHERE `unixtime` > $time ORDER BY `unixtime`";
?>

<html>
<head>
<title>Management System</title>
</head>
<body>
<p> <?php echo $msg; ?>
<p> <?php echo "Welcome, ". $_SESSION['first'] . " " . $_SESSION['last'] . "!";?></p>

<p><a href="logout.php">Logout</a> &nbsp; <a href="eprofile.php">Update Profile</a> &nbsp; <a href="eregister.php">Add a new employee</a></p>
<h2>List of all future schedules</h2>
<?php
    $results = $db->query($sql_allSched);
    if ($results->num_rows == 0) {
        echo '<p>No future schedules</p>';
    }
    else {
        echo "Total: " . $results->num_rows . " future entries.";
        echo "<table border='2'>";
        echo "<th>ID</th><th>Patient Name</th><th>Doctor Name</th><th>Time</th><th>Type</th><th>duration (minutes)</th><th>Cancel?</th>";
        while ($row = $results->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            $patients = $db->query("SELECT `first`,`last` FROM `". $prefix . "puser` WHERE `id`='" . $row['pid'] . "'");
            $pname = $patients->fetch_assoc();
            echo "<td>" . $pname['first'] . " " . $pname['last'] . "</td>";
            $employees = $db->query("SELECT `first`,`last` FROM `". $prefix . "employee` WHERE `id`='" . $row['eid'] . "'");
            $ename = $employees->fetch_assoc();
            echo "<td>" . $ename['first'] . " " . $ename['last'] . "</td>";
            echo "<td>" . $row['FROM_UNIXTIME(`unixtime`)'] . "</td>";
            echo "<td>" . $row['type'] . "</td>";
            echo "<td>" . $row['duration'] . "</td>";
            echo "<td><a href=manage.php?a=d&cid=".$row['id']. ">Cancel</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
?>

<h2>List of all patients</h2>
<?php
    $results = $db->query($sql_allPatients);
    if ($results->num_rows == 0) {
        echo '<p>No patients</p>';
    }
    else {
        echo "Total: " . $results->num_rows . " patients.";
        echo "<table border='2'>";
        echo "<th>UID</th><th>Last</th><th>First</th><th>Addr</th><th>Phone</th><th>Health ID</th><th>Edit?</th><th>Delete?</th>";
        while ($row = $results->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['last'] . "</td>";
            echo "<td>" . $row['first'] . "</td>";
            echo "<td>" . $row['addr'] . "</td>";
            echo "<td>" . $row['phone'] . "</td>";
            echo "<td>" . $row['healthid'] . "</td>";
            echo "<td><a href='profile.php?uid=" . $row['id'] . "'>Edit</a></td>";
            echo "<td><a href='manage.php?t=puser&uid=" . $row['id'] . "&a=d'>Delete</a></td>";
        }
        echo "</table>";
        unset($row);
    }
    unset($results);
?>
<h2>List of all employees</h2>
<?php
    $results = $db->query($sql_allEmployee);
    if ($results->num_rows == 0) {
        echo '<p>No patients</p>';
    }
    else {
        echo "Total: " . $results->num_rows . " employees.";
        echo "<table border='2'>";
        echo "<th>UID</th><th>Last</th><th>First</th><th>Addr</th><th>Phone</th><th>Rate</th><th>Edit?</th><th>Delete?</th>";
        while ($row = $results->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['last'] . "</td>";
            echo "<td>" . $row['first'] . "</td>";
            echo "<td>" . $row['addr'] . "</td>";
            echo "<td>" . $row['phone'] . "</td>";
            echo "<td>$" . $row['rate'] . "</td>";
            echo "<td><a href='eprofile.php?uid=" . $row['id'] . "'>Edit</a></td>";
            echo "<td><a href='manage.php?t=employee&uid=" . $row['id'] . "&a=d'>Delete</a>";
        }
        echo "</table>";
    }
?>

</body>
</html>


<?php
}
else {
    # Not registered user
    header("location:index.php");
}
?>
