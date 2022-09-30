<html>
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

input[type=text], input[type=password] {
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

<h1>Graphical Analysis</h1>

<form  action="#" method="post">
  
  <div class="container">
    <label for="Area"><b>Area</b></label>
    <br><br>    
    <select name="area">
      
      <option value="district">district</option>
        <option value="state">State</option>
        <!-- <option value="country">Country</option>
       -->
      </select>
      <br><br>
      <label for="choice"><b>Choice</b></label>
      <br><br>
    <select name="choice">
        <option value="malaria">Cases of malaria</option>
        <option value="malaria_death">Deaths due to malaria</option>

        <option value="cancer">Cases of cancer</option>
        <option value="cancer_death">Deaths due to cancer</option>
        
        <option value="dengue">Cases of dengue</option>
        <option value="dengue_death">Deaths due to dengue</option>
          
        <option value="jaundice">Cases of jaundice</option>
        <option value="jaundice_death">Deaths due to jaundice</option>

        <option value="gbs">Cases of gbs</option>
        <option value="gbs_death">Deaths due to gbs</option>

        <option value="fever">Cases of fever</option>
        <option value="fever_death">Deaths due to fever</option>


    </select>
      <br><br>
      <label for="month"><b>Time Span</b></label>
      <br><br>
      <select name="month">
      
          <option value="1">January</option>
          <option value="2">February</option>
          <option value="3">March</option>
          <option value="4">April</option>
          <option value="5">May</option>
          <option value="6">June</option>
          <option value="7">July</option>
          <option value="8">August</option>
          <option value="9">September</option>
          <option value="10">October</option>
          <option value="11">November</option>
          <option value="12">December</option>
        <!--   <option value="13">All</option> -->
      </select>
      <select name="year">
    <option value="2019">2019</option>
    <!-- <option value="2020">2020</option>
    <option value="1">All</option>  -->    
      </select>
      <br><br> 
    <label for="Gender"><b>gender</b></label>
      <br><br>
       <select name="gender">
      
    <option value="male">male</option>
    <option value="female">female</option>
    <!-- <option value="other">other</option>       
    <option value="1">All</option>     --> 
        </select>
     <br><br> 
    <button type="submit" style="border-radius:10px" name="submit" >View</button>
    <br><br>
   
    </div>

  
</form>
    <?php
    if(isset($_POST['submit'])){
		
        session_start();
        echo $_POST['area']."<br>";
        echo $_POST['choice']."<br>";
        echo $_POST['month']."<br>";
        echo $_POST['year']."<br>";
        echo $_POST['gender']."<br>";
        $_SESSION['area'] = $_POST['area'];
		$_SESSION['choice'] = $_POST['choice'];
		$_SESSION['year'] = $_POST['year'];
		$_SESSION['gender'] = $_POST['gender'];
		$_SESSION['month'] = $_POST['month'];
		header("location:combo_chart.php");
        
    }
  
    ?>
    </body>
</html>