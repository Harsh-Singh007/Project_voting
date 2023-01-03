<?php
require('connection.php');

session_start();
//If your session isn't valid, it returns you to the login screen for protection
if(empty($_SESSION['member_id'])){
 header("location:access-denied.php");
}

?>
<?php
// retrieving positions sql query
$positions=mysqli_query($con, "SELECT * FROM tbPositions");
?> 
<?php
    // retrieval sql query
// check if Submit is set in POST
 if (isset($_POST['Submit']))
 {
 // get position value
 $position = addslashes( $_POST['position'] ); //prevents types of SQL injection
 
 // retrieve based on position
 $result = mysqli_query($con,"SELECT * FROM tbCandidates WHERE candidate_position='$position'");
 // redirect back to vote
 //header("Location: vote.php");
 }
 else
 // do something
  
?>
<html lang="en">
<head>
  <title>Online Voting System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script language="JavaScript" src="js/user.js">
</script>
<script type="text/javascript">
function getVote(int)
{
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }

	if(confirm("Your vote is for "+int))
	{
  var pos=document.getElementById("str").value;
  var id=document.getElementById("hidden").value;
  xmlhttp.open("GET","save.php?vote="+int+"&user_id="+id+"&position="+pos,true);
  xmlhttp.send();

  xmlhttp.onreadystatechange =function()
{
	if(xmlhttp.readyState ==4 && xmlhttp.status==200)
	{
  //  alert("dfdfd");
	document.getElementById("error").innerHTML=xmlhttp.responseText;
	}
}

  }
	else
	{
	alert("Choose another candidate ");
	}
	
}

function getPosition(String)
{
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }

xmlhttp.open("GET","vote.php?position="+String,true);
xmlhttp.send();
}
</script>
<script type="text/javascript">
$(document).ready(function(){
   var j = jQuery.noConflict();
    j(document).ready(function()
    {
        j(".refresh").everyTime(1000,function(i){
            j.ajax({
              url: "admin/refresh.php",
              cache: false,
              success: function(html){
                j(".refresh").html(html);
              }
            })
        })
        
    });
   j('.refresh').css({color:"green"});
});
</script>
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
        <li><a href="student.php">Home</a></li>
        <li class="active"><a href="vote.php">Current Polls</a></li>
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
      
    <table width="420" align="center" style="margin-top:30px" >
<form name="fmNames" id="fmNames" method="post" action="vote.php" onSubmit="return positionValidate(this)">
<tr>
    <td>Choose Position</td>
    <td><SELECT NAME="position" id="position" onclick="getPosition(this.value)">
    <OPTION VALUE="select">select
    <?php 
    //loop through all table rows
    while ($row=mysqli_fetch_array($positions)){
    echo "<OPTION VALUE=$row[position_name]>$row[position_name]"; 
    //mysql_free_result($positions_retrieved);
    //mysql_close($link);
    }
    ?>
    </SELECT></td>
    <td><input type="hidden" id="hidden" value="<?php echo $_SESSION['member_id']; ?>" /></td>
    <td><input type="hidden" id="str" value="<?php echo $_REQUEST['position']; ?>" /></td>
    <td><input type="submit" name="Submit" value="See Candidates" /></td>
</tr>
<tr>
    <td>&nbsp;</td> 
    <td>&nbsp;</td>
</tr>
</form> 
</table>
<table  width="270" align="center">
<form>
<tr>
    <th>Candidates:</th>
</tr>


<?php
//loop through all table rows
//if (mysql_num_rows($result)>0){
  if (isset($_POST['Submit']))
  {
while ($row=mysqli_fetch_array($result)){
echo "<tr>";
echo "<td>" . $row['candidate_name']."</td>";
echo "<td><input type='radio' name='vote' value='$row[candidate_name]' onclick='getVote(this.value)' /></td>";
echo "</tr>";
}
mysqli_free_result($result);
mysqli_close($con);
//}
  }
else
// do nothing
?>
<tr>
    <h4>Click a circle under a respective candidate to cast your vote. You can't vote more than once in a respective position. This process can not be undone so think wisely before casting your vote.</h4>
    <td>&nbsp;</td>
</tr>
</form>
</table>
     
    </div>
      
    <div class="col-sm-2 sidenav">
   <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQiVUm8u_K-XX2vJz3iEHOcXAkqVezLGUhyWrliTu7qwzx0TEsvDFz6UMxY-m6bmqHO10Q&usqp=CAU" class="img-rounded" alt="vote" width="180px" height="350px">
    </div>
  </div>
</div>
<center><span id="error"></span></center>
</div>
<div id="footer"> 
  <div class="bottom_addr"></div>
</div>
</div>
<footer class="container-fluid text-center">
  <img src="https://media4.giphy.com/media/55m7McmQ9tcD26kQ3I/giphy.gif" alt="v" height="20px" width="50px" >
</footer>

</body>
</html>
