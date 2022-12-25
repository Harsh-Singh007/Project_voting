<?php
session_start();
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Log Out</title>

</head>
<body>


<center>
<h1>Logged Out Successfully </h1>

<?php
session_destroy();
?>
You have been successfully logged out.<br><br><br>
Return to <a href="index.php"><button>Login</button></a>
</center>
</body>
</html>