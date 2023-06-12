<?php
session_start();
if (!array_key_exists("email", $_SESSION)) {
   header("Location: login.php?message=error-login");
}
?>
<html>

<head>

</head>

<body>
   <h1>Hello</h1>
   <h2>Welcome to your session based upon this mail adress : <?php echo ($_SESSION["email"]); ?></h2>
   <a href="logout.php">Log out !</a>
</body>

</html>