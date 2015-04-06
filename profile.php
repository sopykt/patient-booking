<?php
session_start();
require_once("conn.php");

if (isset($_SESSION['level']))
{
    $uid = $_SESSION['uid'];
    if ($_SESSION['level'] == 'employee' and isset($_REQUEST['uid'])) {
        $uid = $_REQUEST['uid'];
    }
    else if ($_SESSION['level'] == 'patient') { }
    else {
        header("location:eprofile.php");
    }
    $passwordErr = $retypeErr = $firstErr = $lastErr = $phoneErr = $addrErr = $idErr = "";
    $username = $password = $retype = $first = $last = $phone = $addr = $id = $msg = "";
    $haserror = false;
    $sql = "SELECT * FROM `" . $prefix . "puser` WHERE id='" . $uid . "'";

    $result = $db->query($sql);
    if ($result->num_rows == 0) {
        echo "Error: Something is wrong, couldn't find the current user.";
        die();
    }
    else {
        $row = $result->fetch_assoc();
        $username = $row['username'];
        $first = $row['first'];
        $last = $row['last'];
        $phone = $row['phone'];
        $addr = $row['addr'];
        $id = $row['healthid'];
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST['password'])) {
            $passwordErr = "Password is required";
            $haserror = true;
        }
        else {
            $password = htmlspecialchars($_POST['password']);
        }

        if (empty($_POST['retype'])) {
            $retypeErr = "Please re-type";
            $haserror = true;
        }
        else {
            $retype = htmlspecialchars($_POST['retype']);
        }

        if ($retype != $password) {
            $retypeErr = "Password not matched.";
            $haserror = true;
        }

        if (empty($_POST['first'])) {
            $firstErr = "First name is required";
            $haserror = true;
        }
        else {
            $first = htmlspecialchars($_POST['first']);
        }

        if (empty($_POST['last'])) {
            $lastErr = "Last name is required";
            $haserror = true;
        }
        else {
            $last = htmlspecialchars($_POST['last']);
        }

        if (empty($_POST['phone'])) {
            $phoneErr = "Phone number is required";
            $haserror = true;
        }
        else {
            $phone = htmlspecialchars($_POST['phone']);
        }

        if (empty($_POST['addr'])) {
            $addrErr = "Address is required";
            $haserror = true;
        }
        else {
            $addr = htmlspecialchars($_POST['addr']);
        }

        if (empty($_POST['id'])) {
            $idErr = htmlspecialchars($_POST['id']);
            $haserror = true;
        }
        else {
            $id = htmlspecialchars($_POST['id']);
        }

        if ($haserror == false) {

            $sql = "UPDATE `" . $prefix . "puser` SET `password` ='" . $password . "', `first` = '" . $first . "', `last` = '" . $last . "', `addr` = '" . $addr . "' WHERE `id` = " . $uid;

            if ($db->query($sql) === true) {
                $msg = "Successfully updated profile.";
            }
            else {
                $msg = "Error: " . $db->error;
            }
        }
    }
?>

<html>
<head>
<title>Patient Profile Edit</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="js/reg.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
</head>
<body>
<?php echo '<p>' . $msg . '</p>'; ?>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
ID: <?php echo $uid ?> <br />
Username: <?php echo $username?> <br/>
Password: <input type="password" id="regpass" name="password"><span class="err"> <?php echo $passwordErr ?> <br />
Re-type Password: <input type="password" id='regpass2' name="retype"><span class="err"> <?php echo $retypeErr ?> <br />
First name: <input type='text' id='regfirst' name="first" value="<?php echo $first ?>"><span class="err"> <?php echo $firstErr ?> <br />
Last name: <input type='text' id='reglast' name="last" value="<?php echo $last ?>"><span class="err"> <?php echo $lastErr ?> <br />
Address: <input type='text' id='regaddr' name="addr" value="<?php echo $addr ?>"><span class="err"> <?php echo $addrErr ?> <br />
Phone number: <input type='text' id='regphone' name='phone' value="<?php echo $phone ?>"><span class="err"> <?php echo $phoneErr ?> <br />
Health Card ID: <input type='text' id='regid' name='id' value="<?php echo $id ?>"> <span class="err"> <?php echo $idErr ?> <span class="err"> <?php echo $idErr ?> </br />
<input type="submit" id='regsubmit' value="Submit"> &nbsp; <input type="button" value="Reset" id="regreset"> <br />
</form>
<br />
<a href='index.php'>Home</a>
<p>&copy; Luxing Huang</p>
</body>
</html>
<?php
}
else {
    header("location:index.php");
}
