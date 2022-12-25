<?php
session_start();
require('../connection.php');
?>
<html lang="en">
<head>
  <title>Online Voting System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script language="JavaScript" src="js/admin.js"></script>
  <style>
    tr{
        height:30px;
    }
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 450px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;} 
    }
  </style>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Online voting Sytem </a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
         <li><a href="admin.php">Home</a></li>
        <li><a href="positions.php">Manage Positions</a></li>
        <li><a href="candidates.php">Manage Candidates</a></li>
       
        <li><a href="refresh.php">Poll Results</a></li>
		<li class="active"><a href="change-pass.php">Change Password</a></li>
		 <li><a href="logout.php">Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
  
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav">
    
    </div>
    <div class="col-sm-8 text-left"> 
       
	   <?php
//If your session isn't valid, it returns you to the login screen for protection
if(empty($_SESSION['admin_id'])){
 header("location:access-denied.php");
}

//fetch data for update file
$result=mysqli_query($con, "SELECT * FROM tbadministrators WHERE admin_id = '$_SESSION[admin_id]'");
if (mysqli_num_rows($result)<1){
    $result = null;
}
$row = mysqli_fetch_array($result);
if($row)
 {
 // get data from db
 $encPass = $row['password'];
 }

//Process
if (isset($_GET['id']) && isset($_POST['update']))
{
    $myId = addslashes( $_GET['id']);
    $mypassword = md5($_POST['oldpass']);
    $newpass= $_POST['newpass'];
    $confpass= $_POST['confpass'];
    if($encPass==$mypassword)
    {
        if($newpass==$confpass)
        {
        $newpass = md5($newpass); //This will make your password encrypted into md5, a high security hash
        $sql = mysqli_query($con, "UPDATE tbadministrators SET password='$newpass' WHERE admin_id = '$myId'" );
        echo "<script>alert('Your password updated');</script>";
        }
        else
        {
            echo "<script>alert('Your new pass and confirm pass not match');</script>";
        }    
    }
    else
    {
        echo "<script>alert('Your old pass not match');</script>";
    }
    
}
?>
<table align="center" >
<tr>
<td>
<form action="change-pass.php?id=<?php echo $_SESSION['admin_id']; ?>" method="post" onSubmit="return updateProfile(this)">
<table align="center">
<CAPTION><h4>CHANGE PASSWORD</h4></CAPTION>
<tr><td>Old Password:</td><td><input type="password" style=" font-weight:bold;" name="oldpass" maxlength="15" value=""></td></tr>
<tr><td>New Password:</td><td><input type="password" style=" font-weight:bold;" name="newpass" maxlength="15" value=""></td></tr>
<tr><td>Confirm Password:</td><td><input type="password" style=" font-weight:bold;" name="confpass" maxlength="15" value=""></td></tr>
<tr><td>&nbsp;</td><td><input type="submit" name="update" value="Update Account"></td></tr>
</table>
</form>
</td>
</tr>
</table>
	 
    </div>
      
    <div class="col-sm-2 sidenav">
  
    </div>
  </div>
</div>

<footer class="container-fluid text-center">
  <img src="https://media4.giphy.com/media/55m7McmQ9tcD26kQ3I/giphy.gif" alt="v" height="20px" width="50px" >
</footer>

</body>
</html>
