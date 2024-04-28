<?php
session_start();
$_SESSION['line'] = 1;
$_SESSION['vehicle'] = 1;
$_SESSION['station'] = 2;

require_once "monitor/connect.php";

$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);

if($polaczenie->connect_errno!=0)
{
	echo"Error: ".$polaczenie->connect_errno;
}
else
{
	$result = @$polaczenie -> query("SELECT * FROM `line`");
	$row = mysqli_fetch_array($result);
	
	$result2 = @$polaczenie -> query("SELECT * FROM `stations`");
	$row2 = mysqli_fetch_array($result2);
	$polaczenie->close();
}

?>

<html>

<head>
	<title> Rozkład jazdy </title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
	<div id = "container">
	
	<div id="frame_1">
		<div id="label"><img src="monitor/img/logo.png"></div>
		<div id="label_2">Rozkład jazdy</div>
	</div>
	<br>
	
	<div id="frame_2">
	
	<div id = "opcje">
	<div id="opis"> Linie </div>
	<div id="linie">
	
	<?php 
	while ($row = $result->fetch_assoc()) {
		echo $row['name']."<br>";
	} 
	?>
	
	</div>
	<div id="opis"> Przystanki </div>
	<div id="przystanki">
	
	<?php 
	while ($row2 = $result2->fetch_assoc()) {
		echo $row2['address']."<br>";
	} 
	?>
	
	</div>
	</div>
	
	<div id = "mapa">
	
	<!-- Google Maps -->
	<iframe src="https://www.google.com/maps/d/embed?mid=12BtZ4lWNgflS1-Kq3t_k-2tHMOwxPmU&ehbc=2E312F" width="100%" height="560"></iframe>
	
	</div>
	
	</div>
	
	<br>
	
	<div id="frame_3">
		<div id ="label_3"><br>&copy;Gabriel Malanowski 2022-2023</div>
	</div>
	
	</div>
</body>

</html>
