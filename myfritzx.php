<?php
// DynDNS über Fritzbox
//
// Passwort und Port nach belieben anpassen.
//
// In der Fritzbox das Script z.b. so aufrufen:
// Update Url: www.MeineDomain.de/ordner/filename.php?pass=Passwort&meineip=<ipaddr>
// Domainname: MeineDomain.de/
//
// Dieses Beispiel leitet zu der "IP:8080/cgi-bin/filemanager/" weiter...

$pwort = 'a71f03ae36f5d27c656d426ee5bbfa21'; // Hier sollte man sein persönliches Passwort für die Erneuerung der IP eintragen.
$port = ''; // Diese legt nur den "Port" und evtl Parameter fest. Kann auch leer bleiben

$dyntxt = "homeIP.txt";
$pworttest = $_GET["passwd"];
$IP = $_GET["meineip"];

if (file_exists($dyntxt)) {
	if ($pworttest === $pwort) {
		if (!empty($IP)) {
			$a = fopen($dyntxt, "w");
			fwrite($a, $IP);
			fclose($a);
		} else {
			$a = fopen($dyntxt, "r");
			$dynamicip = fread($a, filesize($dyntxt));
			fclose($a);
			#$url = "http://".$dynamicip . $port;
			#header("Location: $url");
			echo $dynamicip;
		}
	}
}
