<html>
<head>
<?php
$eula = fopen("INSTRUCTIONS/EULA.txt", "r") or die("HET EULA BESTAND IS NIET GEVONDEN OF VERWIJDERD<br>HET START-UP PROCCES IS GESTOPT");
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
	
	$repeatcmd = false;
if (isset($_GET["repeat"])) {
	$linkto = '';
	$myfilerep = fopen("run/run.txt", "r") or die("Oeps... er is iets foutgegaan");
	// Output one line until end-of-file
	while(!feof($myfilerep)) {
		$date1=date_create(fgets($myfilerep). ":" . fgets($myfilerep));
		$t = time();
		$date2=date_create($t);
		$diff=date_diff($date1,$date2);
		if ($diff <= 0) {
			$linkto = fgets($myfilerep);
			header("refresh:0;url=$linkto");
		}
	}
	fclose($myfilerep);
	$repeatcmd = true;
}
if (isset($_POST["FILE"]) && $repeatcmd == false) {
	$currentmin=getdate(date("U"));
$filename = $_POST["FILE"];
$numb = $_POST["numb"];

$gelukt = false;

$filewriter = fopen("run/run.txt", "a+") or die("Er is iets mis met de run files...");
$txt = $currentmin['hours'] . "\n" . $currentmin['minutes'] . "\n" . $numb . "\n" . $filename . "\n";
fwrite($filewriter, $txt);
fclose($filewriter);
$gelukt = true;
if ($gelukt == true) {
	echo '<h1>Gelukt!</h1>';
	echo $currentmin['minutes'] . " ";
	echo $currentmin['hours'];
}
} else {
?>
</head>
<body>
<form method="POST">
<input name="FILE" type="text" placeholder="Bestandsnaam (vergeet niet de extentie)" />
In minuten <input type="number" name="numb" min="1" />
<input type="submit" value="automatiseer" />
</form>
</body>
</html>
<?php 
}
?>