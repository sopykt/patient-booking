<?php
session_start();
require_once("conn.php");

if (isset($_SESSION['level'])) {
    header("location:index.php");
}

$usernameErr = $passwordErr = $retypeErr = $firstErr = $lastErr = $phoneErr = $addrErr = $idErr = "";
$username = $password = $retype = $first = $last = $phone = $addr = $id = $msg = "";
$haserror = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['username'])) {
        $usernameErr = "Username is required";
        $haserror = true;
    }
    else {
        $username = htmlspecialchars($_POST['username']);
    }

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
        $idErr = "Health ID is required";
        $haserror = true;
    }
    else {
        $id = htmlspecialchars($_POST['id']);
    }

    if ($haserror == false) {
        $sql = "INSERT INTO `" . $prefix . "puser` (`id`, `username`, `password`, `first`, `last`, `addr`, `phone`, `healthid`) VALUES (NULL, '". $username . "', '" . $password ."', '". $first . "', '" . $last . "', '". $addr . "', '". $phone . "', '" . $id ."')";
        if ($db->query($sql) === true) {
            $msg = "Registered, please go back to home page to login.";
        }
        else {
            $msg = "Error: User exists, please try to use another username.";
        }
    }

}

?>

<html>
<head>
<title>Patient Registration</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="js/reg.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
</head>
<body>
<?php echo '<p>' . $msg . '</p>'; ?>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
Username: <input type="text" id="reguser" name="username" value="<?php echo $username?>"> <span class="err"> <?php echo $usernameErr ?> </span><br/>
Password: <input type="password" id="regpass" name="password"><span class="err"> <?php echo $passwordErr ?></span> <br />
Re-type Password: <input type="password" id='regpass2' name="retype"><span class="err"> <?php echo $retypeErr ?></span> <br />
First name: <input type='text' id='regfirst' name="first" value="<?php echo $first ?>"><span class="err"> <?php echo $firstErr ?></span> <br />
Last name: <input type='text' id='reglast' name="last" value="<?php echo $last ?>"><span class="err"> <?php echo $lastErr ?></span> <br />
Address: <input type='text' id='regaddr' name="addr" value="<?php echo $addr ?>"><span class="err"> <?php echo $addrErr ?></span> <br />
Phone number: <input type='text' id='regphone' name='phone' value="<?php echo $phone ?>"><span class="err"> <?php echo $phoneErr ?></span> <br />
Health Card ID: <input type='text' id='regid' name='id' value="<?php echo $id ?>"> <span class="err"> <?php echo $idErr ?></span> </br />
<input type="submit" id='regsubmit' value="Submit"> &nbsp; <input type="button" value="Reset" id="regreset"></span> <br />
</form>

<br />

<a href='index.php'>Home</a>

<p>&copy; Luxing Huang</p>
</body>
</html>
