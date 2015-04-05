<?php
require_once("conn.php");
session_start();
if ($_SESSION['level'] == 'employee') {
    if (isset($_REQUEST['doctor']) && isset($_REQUEST['patient']) && isset($_REQUEST['duration']) && isset($_REQUEST['date']) && isset($_REQUEST['time']) && isset($_REQUEST['type'])) {
        $dt = $_REQUEST['date'] . " " . $_REQUEST['time'];
        $sql = "INSERT INTO `" . $prefix . "schedule` (`id`, `pid`, `eid`, `type`, `duration`, `unixtime`, `added`) VALUES (NULL, '" . $_REQUEST['patient'] . "', '" . $_REQUEST['doctor']. "', '". htmlspecialchars($_REQUEST['type']) . "', '" . $_REQUEST['duration'] . "', UNIX_TIMESTAMP('" . $_REQUEST['date'] . "'), " . date("U") . ")";
        $db->query($sql);
    }
?>
<html>
<head>
<title>Appointment System</title>
<meta charset="utf-8">
<script src="//code.jquery.com/jquery-1.11.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script src="js/app.js"></script>
</head>
<body>
<h2>Create an appointment</h2>
<div class="app">
<form action='#'>
<fieldset>
  <label for="doctor">Select a doctor</label>
  <select name="doctor" id="doctor">
    <option value="" selected="selected">Select</option>
<?php
    $sql = "SELECT `id`,`first`,`last` FROM `" . $prefix . "employee`";
    $results = $db->query($sql);
    if ($results->num_rows == 0) { }
    else {
        while ($row = $results->fetch_assoc()) {
            echo "<option value='" . $row['id'] . "'>" . $row['first'] . " " . $row['last'] . "</option>\n";
        }
    }
?>
  </select>

    <label for="patient">Select a patient</label>
    <select name="patient" id="patient">
        <option value="" selected="selected">Select</option>
<?php
    $sql = "SELECT `id`,`first`,`last` FROM `" . $prefix . "puser`";
    $results = $db->query($sql);
    if ($results->num_rows == 0) { }
    else {
        while ($row = $results->fetch_assoc()) {
            echo "<option value='" . $row['id'] . "'>" . $row['first'] . " " . $row['last'] . "</option>\n";
        }
    }
?>
    </select>

    <br />
    <label for'date'>Date and time:</label>
    <input type="text" id="dateinput" value="YYYY-MM-DD"></input> &nbsp; <input type="text" id="timeinput" value='HH:mm:ss'></input>

    </script>
&nbsp;
    <br />
    <span id="inputerr"></span>
    <br />
    <label for"type">Type:</label>
    <input id="type"></input>
    <br />
    <label for="duration">Duration:</label>
    <select name='duration' id='duration'>
        <option value='' selected="selected">Select</option>
        <option value=30>0.5 Hour</option>
        <option value=60>1 Hour</option>
        <option value=90>1.5 Hour</option>
        <option value=120>2 Hours</option>
        <option value=180>3 Hours</option>
    </select>
    <br />
    <input type="button" id="submit" value="Submit"></input>
</fieldset>
</form>
</div>
<div id="result">
</div>
<a href="index.php">Home</a> &nbsp; <a href="logout.php">Logout</a>
<p>&copy; Luxing Huang</p>
</body>
</html>
<?php
}
else {
    header("location:index.php");
}
?>
