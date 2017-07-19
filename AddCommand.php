<html>
<head>
<?php
$eula = fopen("Commands/INSTRUCTIONS/EULA.txt", "r") or die("HET EULA BESTAND IS NIET GEVONDEN OF VERWIJDERD<br>HET START-UP PROCCES IS GESTOPT");
// Output one line until end-of-file
while(!feof($eula)) {

		fgets($eula);
		fgets($eula);
		fgets($eula);
		fgets($eula);
		fgets($eula);
		fgets($eula);
		fgets($eula);
		fgets($eula);
		$eulaacc = fgets($eula);
		if ($eulaacc == 'true') {
			
		} else {
			echo 'De EULA is nog niet geaccepteerd ga naar <a href="INSTRUCTIONS/EULA.txt">INSTRUCTIONS/EULA.txt</a> en volg de instructies op.<br>';
			die ('<b>MAATREGEL:</b> HET START-UP PROCCES IS BEINDIGD!');
			
		}
		
	}	fclose($eula);
$cmd = $_GET["COMMAND"];

if ($cmd == 'RUN') {
	header("refresh:0;url=Commands/run.php");
}
?>
</head>
<body>
<form method="GET">

<input name="COMMAND" type="text" placeholder="Commando" />
<input type="submit" value="automatiseer">

</form>
</body>
</html>