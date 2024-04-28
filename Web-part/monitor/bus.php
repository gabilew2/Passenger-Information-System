<?php

session_start();
require_once "connect.php";

$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);

if($polaczenie->connect_errno!=0)
{
	echo"Error: ".$polaczenie->connect_errno;
}
else
{
	$result = @$polaczenie -> query("SELECT `name` FROM `line` WHERE ID=".$_SESSION['line']);
	$line = mysqli_fetch_array($result);
	
	$result = @$polaczenie -> query("SELECT stations.address
FROM stations INNER JOIN (line INNER JOIN route ON line.ID = route.lineID) ON stations.ID = route.stationID
WHERE (((line.ID)=".$_SESSION['line']."))
ORDER BY route.orderNumber DESC LIMIT 1;");
	$destination = mysqli_fetch_array($result);
	
	$result = @$polaczenie -> query("SELECT stations.address FROM ((vehicles INNER JOIN line ON vehicles.line = line.ID) INNER JOIN route ON vehicles.nextStation = route.orderNumber) INNER JOIN stations ON route.stationID = stations.ID WHERE (((line.ID)=".$_SESSION['line'].") AND ((vehicles.ID)=".$_SESSION['vehicle']."));");
	$nextStation = mysqli_fetch_array($result);
	
	$polaczenie->close();
	
}

?>

<html>

<!--<SCRIPT LANGUAGE= "JavaScript" type= "text/javascript">
var timerID = null
function wyswietlDate()
{
  var data = new Date();
  var miesiac = data.getMonth() + 1;
  if (miesiac = 1){
      miesiac = "styczeń";
  }
  if (miesiac = 2){
      miesiac = "luty";
  }
  if (miesiac = 3){
      miesiac = "marzec";
  }
  if (miesiac = 4){
      miesiac = "kwiecień";
  }
  if (miesiac = 5){
      miesiac = "maj";
  }
  if (miesiac = 6){
      miesiac = "czerwiec";
  }
  if (miesiac = 7){
      miesiac = "lipiec";
  }
  if (miesiac = 8){
      miesiac = "sierpień";
  }
  if (miesiac = 9){
      miesiac = "wrzesień";
  }
  if (miesiac = 10){
      miesiac = "październik";
  }
  if (miesiac = 11){
      miesiac = "listopad";
  }
  if (miesiac = 10){
      miesiac = "grudzień";
  }
  var dzien = data.getDate();
  var rok = data.getYear();
  if (rok < 1000){
      rok = 2000 + rok - 100;
  }
  var dzisiaj = dzien + " " + miesiac + " " + rok;
  document.write(dzisiaj);
}

function wyswietlGodzine()
{
	var data = new Date();
	var godzina = data.getHours();
	var minutes = data.getMinutes();
	var teraz = godzina + ":" + minutes;
	document.write(teraz);
}

</script>-->

<head>
	<title>Web Bus Monitor by Gabriel Malanowski</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.cdnfonts.com/css/technology" rel="stylesheet">
	<meta charset = "utf-8">
</head>

<body>
	<div id="container">
	
	<div id="frame_3">
		<div id="label_5"><img src="img/logo.png"></div>
		<div id="label">Linia: <?php echo $line['name']; ?>&nbsp; Kierunek: <?php echo $destination['address']; ?></div>
	</div>
	
	<br>
	
	<div id="frame_2">
	
	<div id = "opcje">
	<div id="opis"> Data </div>
	<div id = "date"> <br><br> <b><i><!--<script>wyswietlDate();</script>--> <?php echo date('l, d F Y'); ?></b></i></div>
	<div id="opis"> Godzina </div>
	<div id = "godzina"><b><i><!--<script>wyswietlGodzine();</script>--> <?php echo date('H:i') ?> </b></i></div>
	<div id="opis"> Opóźnienie </div>
	<div id = "godzina"><b><i><!--<script>wyswietlGodzine();</script>--> +0:00 </b></i></div>
	</div>
	
	<div id = "lista">
	<ul>
	<?php
	
	$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);

	if($polaczenie->connect_errno!=0)
	{
		echo"Error: ".$polaczenie->connect_errno;
	}
	else
	{
		$result = @$polaczenie -> query("SELECT stations.address FROM (route INNER JOIN (vehicles INNER JOIN line ON vehicles.line = line.ID) ON route.lineID = line.ID) INNER JOIN stations ON route.stationID = stations.ID WHERE (((vehicles.ID)=".$_SESSION['vehicle'].") AND ((vehicles.line)=".$_SESSION['line'].")) ORDER BY route.orderNumber;");
		$list = mysqli_fetch_array($result);
		$polaczenie->close();
		
		echo "<li style='list-style-image: url(img/dot1.png);'>".$list['address']."</li>";
		while ($list = $result->fetch_assoc()) {
			echo "<li>".$list['address']."</li>";
		}
		
	}
	
	?>
	</ul>
	</div>
	
	</div>
	
	<br>
	
	<div id="frame_3">
		<div id ="label_2"><br>Następny przystanek</div>
		<div id="label_3"><?php echo $nextStation['address']; ?></div>
	</div>
	
	</div>
</body>

</html>