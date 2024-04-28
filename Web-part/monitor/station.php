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
	$result = @$polaczenie -> query("SELECT stations.address FROM stations WHERE ID=".$_SESSION['station'].";");
	$address = mysqli_fetch_array($result);
		
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
	<title>Web Station Monitor by Gabriel Malanowski</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.cdnfonts.com/css/technology" rel="stylesheet">
	<meta charset = "utf-8">
</head>

<body>
	<div id="container">
	
	<div id="frame_3">
		<div id="label_5"><img src="img/logo.png"></div>
		<div id="label">Przystanek: <?php echo $address['address']; ?> </div>
	</div>
	
	<br>
	
	<div id="frame_2">
	
	<div id = "opcje">
	<div id="opis"> Data </div>
	<div id = "date"> <br><br> <b><i><!--<script>wyswietlDate();</script>--> <?php echo date('l, d F Y'); ?></b></i></div>
	<div id="opis"> Godzina </div>
	<div id = "godzina"><b><i><!--<script>wyswietlGodzine();</script>--> <?php echo date('H:i') ?> </b></i></div>
	</div>
	
	<div id = "lista">
	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce elementum diam dolor, sit amet vehicula velit efficitur nec. In in quam at quam finibus facilisis et non dui. Duis faucibus orci lacus, a mollis neque condimentum in. Vivamus congue pellentesque elit, eu semper elit tincidunt tincidunt. Aliquam congue hendrerit enim vitae tincidunt. In fringilla tincidunt ex, eu varius augue fringilla eu. Ut aliquet eu libero vitae semper. Mauris mi quam, ornare sit amet tellus ut, consectetur laoreet quam. Fusce ut blandit turpis. Mauris posuere lobortis justo, ac tincidunt orci tristique in.

Morbi suscipit purus eget leo commodo vehicula. In et dolor porta nunc tempor eleifend nec et dolor. Praesent tempor aliquet ipsum, quis eleifend arcu luctus at. Suspendisse vestibulum ornare tincidunt. Morbi at posuere lectus. Nulla volutpat eu metus dapibus rhoncus. Aenean nisi metus, suscipit ut mauris non, condimentum efficitur mi. Quisque venenatis dolor id volutpat mattis. Cras a libero leo. Praesent sit amet sagittis risus, nec congue risus. Vestibulum nec aliquet lorem. Sed sed ultricies diam. Sed finibus orci et lobortis bibendum. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Morbi luctus mollis turpis nec tristique.

Aliquam magna nunc, vestibulum et augue at, fringilla condimentum metus. Vivamus ac ante neque. Duis venenatis elementum aliquet. Cras ornare odio eu mauris sagittis tincidunt. Vivamus diam orci, ullamcorper pellentesque sodales sollicitudin, venenatis at tellus. Nulla facilisi. Donec vitae tempor ligula. In iaculis vitae dolor vel iaculis. Etiam luctus sem eget sem pharetra, non gravida velit mollis. Fusce eget vehicula eros. Nullam et velit sapien. Sed sagittis pulvinar massa, nec varius ante auctor id. Aliquam erat volutpat. Donec sit amet leo pulvinar, pretium ligula blandit, iaculis nisl. Vestibulum laoreet rutrum erat, ut faucibus dui fermentum quis. Sed lobortis id dui eu lacinia.

Proin vitae pulvinar libero. Etiam aliquam tincidunt turpis in hendrerit. Sed ultrices nulla eros, eu semper enim ornare ut. Integer aliquet neque mi, rutrum varius ipsum ultricies id. Maecenas facilisis lacinia efficitur. Nam sit amet nisl luctus, venenatis tellus euismod, sagittis ipsum. In placerat condimentum ipsum, fringilla laoreet dolor vehicula sed. Nulla sed suscipit ipsum. Nullam dolor risus, bibendum vel dui rutrum, vestibulum suscipit magna. Etiam vulputate nisl vel tortor tempor, at commodo augue ultricies.

Ut eu metus tellus. Fusce porta vitae nisi vel tincidunt. Suspendisse ex arcu, volutpat non tortor nec, elementum elementum nisi. Ut vel justo aliquet, faucibus eros a, posuere leo. Maecenas id dapibus tellus. Donec sagittis nec ante at pharetra. Integer vel odio ipsum.
	</div>
	
	</div>
	
	<br>
	
	<div id="frame_3">
		<div id ="label_2"><br>Następna linia: </div>
		<div id="label_3">1 </div>
	</div>
	
	</div>
</body>

</html>