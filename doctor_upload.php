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
    <title>Capture Image</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
    
    <style type="text/css">
        #results { 
		padding:20px;
		border:1px solid; background:#ccc; 
		margin-left: 00px;
		text-align: center;
		
		}
		#my_camera{
 width: 500px;
 height: 380px;
 border: 1px solid black;
 border-radius: 50px;
 margin-left: 500px;
 padding: 10px;
 
}

    </style>
</head>
<body>
   <!--<video width="320" height="240" autoplay controls>
    <source src="%StreamURL%" type="video/mp4">
    <object width="320" height="240" type="application/x-shockwave-flash" data="http://releases.flowplayer.org/swf/flowplayer-3.2.5.swf">
        <param name="movie" value="http://releases.flowplayer.org/swf/flowplayer-3.2.5.swf" /> 
        <param name="flashvars" value='config={"clip": {"url": "https://www.youtube.com/watch?v=vOsdfRbrNdk", "autoPlay":true, "autoBuffering":true}}' /> 
        <p><a href="https://www.youtube.com/watch?v=vOsdfRbrNdk">view with external app</a></p> 
    </object>
</video>-->
<div class="container">
   
   
    <form method="Post" action="#"
        <div class="row">
            <div class="col-md-6">
                <div id="my_camera"></div>
                <br/>
                <input  style="margin-left: 680px;margin-bottom: 10px;"type=button value="Take Snapshot" onClick="take_snapshot()">
                <input type="hidden" name="image" class="image-tag">
            </div>
            <div class="col-md-6">
                <div id="results">Your captured image will appear here...</div>
            </div>
            <div class="col-md-12 text-center">
                <br/>
                <button type ="submit" name="submit" style="margin-left:680px;width: 110px;">Submit</button>
            </div>
        </div>
    </form>
</div>


  
<!-- Configure a few settings and attach camera -->
<script language="JavaScript">
    Webcam.set({
        width: 400,
        height: 400,
        image_format: 'png',
        jpeg_quality: 90
    });
  
    Webcam.attach( '#my_camera' );
  
    function take_snapshot() {
        Webcam.snap( function(data_uri) {
            $(".image-tag").val(data_uri);
            document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';
        } );
    }
</script>
<?php
  if(isset($_POST['submit'])){
	  session_start();
    
    $img = $_POST['image'];
    $folderPath = "img/doctor/img/";
    $image_parts = explode(";base64,", $img);
    $image_type_aux = explode("image/", $image_parts[0]);
    $image_type = $image_type_aux[1];
    $image_base64 = base64_decode($image_parts[1]);
	$id=$_SESSION["did"];
    $fileName = $id.'.png';
    $file = $folderPath . $fileName;
    file_put_contents($file, $image_base64);
    $update_query = "UPDATE doctor SET image='$file'  WHERE doctor_id='$id'";
    $a = mysqli_query($con,$update_query);
    header("location:Dr_Generate_card.php");
  }
  
?>

</body>
</html>