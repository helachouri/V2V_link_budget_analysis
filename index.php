<!DOCTYPE html>
<html lang="en">
  	<head>
    	<meta charset="UTF-8">
    	<link rel="stylesheet" href="css/styleReset.css">
    	<link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
		  <link rel="stylesheet" href="css/style.css">
      <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
      <title>Development Project | INPT</title>
	</head>

	<body>
  <center>
    <div class="header">
  		<h1>V2X over 5G Technologies for Smarter Cities : Theory and Applications</h1>
		</div>

		<div class="form-module">
  			<div></div>
        
  			<div class="form">
    			<h2>Adjust the parameters to calculate the SINR having a target BLER (QoS)</h2>
    			<form method="post" action="interpolate.php">
            <div class='container'>
            <div class="row">
              <label class="col-md-6" for="frequency" >Frequency</label ><br>
              <select autofocus="autofocus" class="col-md-6" id="frequency" name="frequency" required>
                <option value="" selected></option>
                <option value="2">2 GHz</option>
                <option value="5.9">5.9 GHz</option>
              </select> 
            </div>

            <div class="row">
              <label class="col-md-6" for="paquet_size" >Packet size</label ><br>
              <select class="col-md-6" id="paquet_size" name="paquet_size" required>
                <option value="" selected></option>
                <option value="190">190 Byte</option>
                <option value="300">300 Byte</option>
              </select>
            </div>

            <div class="row">
              <label class="col-md-6" for="speed" >Relative speed</label ><br>
              <select class="col-md-6" id="speed" name="speed" required>
                <option value="" selected></option>
                <option value="30">30 Km/h</option>
                <option value="120">120 Km/h</option>
              </select>
            </div>

            <div class="row">
              <label class="col-md-6" for="target_BLER" >Target BLER</label ><br>
              <input class="col-md-6" class='input' name='target_BLER' type="number" max="1" min="0" step="0.0001" required/>
            </div>
      				
      			<button>Submit</button>
            </div>
    			</form>
  			</div>
		</div>

		<div class="logo_INPT">
			<img src="images/logo_inpt.png">
		</div>
    </center>
	</body>
</html>