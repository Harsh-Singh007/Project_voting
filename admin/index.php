<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script language="JavaScript" src="js/admin.js"></script>
    <title>Login or Sign up</title>
   
    <style>
         *{
    margin:0 ;
    padding: 0;
    box-sizing: border-box;
 }
 body{
   background :linear-gradient(to right, #e6dada, #274046);
 }
 .container{
    display: flex;
    height: 400px;
    width: 800px;
    /*border: 1px solid black;*/
    margin: auto;
    margin-top: 50px;
    box-shadow: 15px 15px 20px black ;
 } 
 .form{
   display: flex;
   flex-direction: column;
   width: 50%;
   align-items: center;
   background-color:whitesmoke;

 }
 .form h1{
   font-size: 2rem;
   font-family: 'Courier New', Courier, monospace;
   margin: 15px;
 }
 .box
 {
   padding: 12px;
   width: 65%;
    margin: 10px;
   border: 1px solid black;
   outline: none;
   border-radius: 20px;

 }
 #submit
{
padding: 12px 30px;
width: 40%;
margin-top: 30px;
background-color: black;
color: white;
font-weight: bold;
border: none;
outline: none;
border-radius: 20px;
}
#submit:hover{
cursor: pointer;
background-color: blue;

}


.side
{
   display: flex;
   justify-content: center;
   align-items: center;
   width: 50%;
   background-color:  #e6dada;
    
}
.side img{
   width: 450px;
   height: 400px;
}


 
 
    </style>
</head>
<body>
   <center> 
    <center><h1 style="color:white ; font-family: Courier New, Courier, monospace;">Online Voting System</h1></center>
    </center> 
    <div class="container">

        <form name="fortm1" method="post" action="checklogin.php" onSubmit="return loginValidate(this)" class="form">
            <img src="https://cdn-icons-png.flaticon.com/512/2633/2633863.png" height="50px" width="80px">
            <h1>ADMIN LOGIN</h1>
              <input type="text" class="box" placeholder="Enter Email"  name="myusername" id="myusername">
              <input type="password" class="box" placeholder="Enter password"  name="mypassword" id="mypassword">
              <input type="submit" value="Login" id="submit" name="Submit">
        </form>
        <div class="side">
            <img src="images\adminvec.avif" alt="admin vector">
        </div>
    </div>
    
</body>
</html>