<?php
require('connection.php');

session_start();
//If your session isn't valid, it returns you to the login screen for protection
if(empty($_SESSION['member_id'])){
 header("location:access-denied.php");
}
?>
<html lang="en">
<head>
  <title>Online Voting System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
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
        <li class="active"><a href="student.php">Home</a></li>
        <li><a href="vote.php">Current Polls</a></li>
        
        <li><a href="changepass.php">Change Password</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
  
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav">
     <img src="https://marketplace.canva.com/EAE5Ba7chRw/1/0/1131w/canva-blue-red-and-white-modern-and-clean-election-illustrated-event-poster-XGQpDCt4ICw.jpg" class="img-rounded" alt="vote" width="180px" height="350px">
    </div>
    <div class="col-sm-8 text-left"> 
      <center><img src="https://blog.1mission.org/wp-content/uploads/2017/07/welcome-blog-1-1.gif" width="300px"></center>
      <br>
      <br>
      <p>The word “vote” means to choose from a list, to elect or to determine. The main goal of voting 
        is to come up with leaders of the people’s choice. Most places have to face a lot of problems 
        when it comes to voting. Some of the problems involved include ridging votes during election, 
        insecure or inaccessible polling stations, inadequate polling materials and also inexperienced 
        personnel. This online/polling system seeks to address the above issues. It should be noted that 
        with this system in place, the users, citizens in this case shall be given ample time during the 
        voting period. They shall also be trained on how to vote online before the election.
         </p>
     
    </div>
      
    <div class="col-sm-2 sidenav">
   <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQiVUm8u_K-XX2vJz3iEHOcXAkqVezLGUhyWrliTu7qwzx0TEsvDFz6UMxY-m6bmqHO10Q&usqp=CAU" class="img-rounded" alt="vote" width="180px" height="350px">
    </div>
  </div>
</div>

<footer class="container-fluid text-center">
  <img src="https://media4.giphy.com/media/55m7McmQ9tcD26kQ3I/giphy.gif" alt="v" height="20px" width="50px" >
</footer>

</body>
</html>
