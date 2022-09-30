<html>
  <head>
    <title>QR-Code Scanner</title>
    <link rel="icon" type="image/png" href="favicon.png">
    <link rel="stylesheet" href="style.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>
    <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
  </head>
  <body>
 
    <!--<a href="https://github.com/schmich/instascan"><img style="position: absolute; top: 0; right: 0; border: 0; z-index: 1" src="https://camo.githubusercontent.com/365986a132ccd6a44c23a9169022c0b5c890c387/68747470733a2f2f73332e616d617a6f6e6177732e636f6d2f6769746875622f726962626f6e732f666f726b6d655f72696768745f7265645f6161303030302e706e67" alt="Fork me on GitHub" data-canonical-src="https://s3.amazonaws.com/github/ribbons/forkme_right_red_aa0000.png"></a>-->
    <div id="app">
      <div class="sidebar">
        <section class="cameras">
          <h2>Cameras</h2>
          <ul>
            <li v-if="cameras.length === 0" class="empty">No cameras found</li>
            <li v-for="camera in cameras">
              <span v-if="camera.id == activeCameraId" :title="formatName(camera.name)" class="active">{{ formatName(camera.name) }}</span>
              <span v-if="camera.id != activeCameraId" :title="formatName(camera.name)">
                <a @click.stop="selectCamera(camera)">{{ formatName(camera.name) }}</a>
              </span>
            </li>
          </ul>
        </section>
        <section class="scans">
          <h2>Scans</h2>
          <ul v-if="scans.length === 0">
            <li class="empty">No scans yet</li>
          </ul>
          <transition-group name="scans" tag="ul">
            <li v-for="scan in scans" :key="scan.date" :title="scan.content"><a href="http://localhost/bootstrap2/dr_login.php"> {{scan.content}} </a></li>
			
          </transition-group>
        </section>
      </div>
	   
      <div class="preview-container">
	  
		 
	  <h1 style="color: yellow;margin-left:center;margin-bottom:220px;font-size:20px;font-family:Times New Roman;">Place Your Qr Code in front of the webcam to scan it properly.</h1>
	  <h1 style="color: yellow;margin-left:center;margin-top:-200px;font-size:20px;font-family:Times New Roman;">After Scannig the QR click on the ID under the cameras section.</h1>
      <transition-group name="scans" tag="ul">
          <li style="color: yellow;" v-for="scan in scans" :key="scan.date" :title="scan.content">{{ scan.content }}
            <form action="http://localhost/preclinic/medical_dashboard.php" method="post">
              <input style="color: yellow;"type="hidden" name="qr" :key="scan.date" :value="scan.content" />
              <input style="margin-left:200px;margin-top:-20px;"type="submit" value="Click here to Login"/>
            </form>
          </li>
</transition-group>
        <video id="preview"></video>
      </div>
    </div>
	
    <script type="text/javascript" src="app.js"></script>
	
	
  </body>
</html>
