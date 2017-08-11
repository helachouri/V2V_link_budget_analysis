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
    <div class="header">
  		<h1>V2X over 5G Technologies for Smarter Cities : Theory and Applications</h1>
		</div>
		<div class="form-module">
    <div></div>
  			<div class="form">
    			<h2>Output results</h2>
            <div class='container'>
            <?php 
               $paquet_size = $_POST['paquet_size'];
               $speed = $_POST['speed'];
               $frequency = $_POST['frequency'];
               $target_BLER = $_POST['target_BLER'];  
               $inputDir  = "C:\\wamp64\\www\\interpolate";
               $command = "matlab -sd ".$inputDir." -r interpolate(".$paquet_size.",".$speed.",".$frequency.",".$target_BLER.")";
               exec($command);
            ?>
            <div class="row">
              <p><strong>Output SINR :</strong>
                <span class="bg-primary"> 
                <?php 
                  $myfile = fopen("Output.txt", "r") or die("Unable to open file!");
                  echo fgets($myfile);
                  fclose($myfile);
                 ?>
                 </span>
              </p>
            </div>
            <div class="row">
                <?php 
                  $Pnoise = -129.85; // Thermal noise (dB) = 10log(BT)+10log(BP)+NF(dB) NF=4
                  $IM = 2; // Interference Margin (dB)
                  $Gtma = 0; // Tower Mounted Amplifier (dB)
                  $BPL = 0; // Indoor Building Penetration Loss (dB)
                  $SFM = 0; // Slow Fading Margin (dB)
                  $Gr = 0; //Receive Antenna Gain (dB)
                  $Pch = 33; // Channel Maximum Power (dBm)
                  $Gtx = 0; // Tx Antenna Gain (dBi)
                  $Ltx = 2; //Antenna System Losses (dB)
                  $Lb = 0; //Body Loss (dB)
                  $myfile = fopen("Output.txt", "r") or die("Unable to open file!");
                  $Pr = fgets($myfile) + $Pnoise + $IM - $Gr - $Gtma + $BPL + $SFM;
                  $EIRP = $Pch + $Gtx - $Ltx - $Lb;
                  $MAPL = $EIRP - $Pr;
                  $r = (10^(($MAPL-32.45)/20))/$frequency;
                  fclose($myfile);
                 ?>
              <p><strong>Power at the receive (dBm) : </strong>
                <span class="bg-primary"> 
                  <?php echo $Pr; ?>
                </span>
              </p>
              <p><strong>Equivalent Isotropically Radiated Power (dBm) : </strong>
                <span class="bg-primary"> 
                  <?php echo $EIRP; ?>
                </span>
              </p>
              <p><strong>Maximum Allowable Path Loss (dB) : </strong>
                <span class="bg-primary"> 
                  <?php echo $MAPL; ?>
                </span>
              </p>
              <p><strong>Maximum cell radius (Km) : </strong>
                <span class="bg-primary"> 
                  <?php echo $r; ?>
                </span>
              </p>
            </div>
            <a href="index.php"><button>Retry</button></a>
            </div>

  			</div>
        </div>
		<div class="logo_INPT">
			<img src="images/logo_inpt.png">
		</div>
	</body>
</html>