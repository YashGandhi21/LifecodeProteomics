<?php
$error = "";
$con = mysqli_connect('localhost','root','','iwp');
if (!$con)
{
	die("Connection failed:".mysqli_connect_error());
}
else if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$user = mysqli_real_escape_string($con,$_POST['userid']);
	$pass = mysqli_real_escape_string($con,$_POST['password']);

	$sql = "select * from login where username = '$user' and password = '$pass'";
	$result = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);
    if($count == 1 || $count == 2 || $coount == 3)
    {
        header("location: welcome.php");
	}
	else
	{
		$error = "Your login name or password is invalid";
	}
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Administrator Login Page</title>
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link href="css/fontawesome-all.css" rel="stylesheet" />

</head>
<body>
<br><br><br><br>
    <div class=" w3l-login-form">
        <h2>Administrator Login</h2>
        <form name="loginform"  method="post" action = "welcome.php">
            <div class=" w3l-form-group">
                <label>Username:</label>
                <div class="group">
                    <i class="fas fa-user"></i>
                    <input type="text" name="userid" id="userid" placeholder="Username" required>
                </div>
            </div>
            <div class=" w3l-form-group">
                <label>Password:</label>
                <div class="group">
                    <i class="fas fa-unlock"></i>
                    <input type="password" name="password" id="password" placeholder="Password" required>
                </div>
            </div>
            <?php
            echo '<span style="color: red;" />'.$error.'</span>';
             ?>
            <br>
            <br>
            <input id="loginbutton" type="submit" value="Login">
            <br>
            <br>
            <br>
            <a href="../index.php" id="homepage">Homepage</a>

            
        </form>
    </div>
</body>
</html>
