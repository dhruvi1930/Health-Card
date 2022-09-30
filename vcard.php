<!DOCTYPE html>
<html>
    <?php


define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'project');

$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
if(!$con){
    die("Connection Failed".mysqli_connect_error());
}
?>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
  h1
  {
    color:#00ccff;
    text-align:center;
    margin-top:50px;
  }
body {font-family: Arial, Helvetica, sans-serif;}
form 
{
  border: 2px solid #00ccff;
  width:500px;
  border-radius:10%;
  margin-left:470px;
  margin-top:100px;
  padding:10px;
}

input[type=text], input[type=password] ,input[type=email]{
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
    border-radius:10px;
}

button {
  background-color:#0099ff;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

img.avatar {
  width:100px;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
 
}
a
{
  color:#0099ff;
}
</style>
</head>
<body>

<h1>V-CARD</h1>
<form action="show_vcard.php" method="post">
  <div class="imgcontainer">
    <img src="img/dr_login.png" class="avatar">
  </div>

  <div class="container">
    

    <label for="u_id"><b>Enter your your unique id</b></label>
    <input type="text" placeholder="Id..." name="u_id" required>
    
   
       
    <button type="submit" style="border-radius:10px" name="submit">See V-CARD</button> 
      
  </div>
</form>
    </body>
</html>