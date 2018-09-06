<?php
	
	$dbTable = "return3"; 
	$numberOfIssues = 3;
	
	$webAdress=Array(
	
	"ip" => "10.3.8.101",
	"dir" => "sav"	
		
		);
	
	$technicienList = array
	(
	
	"Adrian",
	"Alexis",
	"Axel",
	"Brieuc",
	"Clémence",
	"Clément",
	"Florian",
	"Guillaume",
	"Kevin",
	"Prashanth",
	"Sanjeevan",
	"Sendy",
	"Yannick"                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              
		
	);
	
	$solutionList = array
	(
	
	"Repaired",
	"Returned",
	"Swapped(new)",
	"Swapped(ref)"
	
	);
	
	$statusList = array
	(
	
	"Waiting",
	"Canceled",
	"Reception",
	"Refunded",
	"Reparation",
	"To Ship",
	"Pre-sent",
	"Done"
		
	);			
	
	$issueList = array
	(
	
	"station" => "nwsIssues",
	//"homecoach" => "nhcIssues",
	"thermostat" => "nthIssues",
	"rain" => "nrgIssues",
	"wind" => "nwgIssues",
	"june" => "njbIssues",
	"welcome" => "nscIssues"
	
	);
	
	$months = array
	(
	
	"1" => "January",
	"2" => "February",
	"3" => "March",
	"4" => "April",
	"5" => "May",
	"6" => "June",
	"7" => "July",
	"8" => "August",
	"9" => "September",
	"10" => "October",
	"11" => "November",
	"12" => "December"
	
	);
	
	$years = array
	(
	
	"2015" => "2015",
	"2016" => "2016",
	"2017" => "2017"

	
	);
	
	$moduleTypes = array
	(
	"NHC" => "Home Coach",
	"NWS" => "Weather station",
	"NMM" => "Indoor unit",
	"NOM" => "Outdoor unit",
	"NIM" => "Additional Indoor unit",
	"NRG" => "Rain Gauge",
	"NWG" => "Wind Gauge",
	"NWM" => "Mount",
	"NTH" => "Thermostat",
	"TPG" => "TPG",
	"THM" => "THM",
	"NJB" => "June",
	"NSC" => "Welcome",
	"NOC" => "Presence",
	"NDT" => "Tag",
	//
	
	);
	
	
	$agentName = array
	(
	
	"Adrian",
	"Aurélie",
	"Ayaz",
	"Alessandra",
	"Bilal",
	"Brieuc",
	"Cédric",
	"Clémence",
	"Florian",
	"Frédéric",
	"irene",
	"Maxime",
	"Meri",
	"Nathalie",
	"Olivier",
	"Pablo",
	"Prashanth",
	"Sendy",
	"Tyler",
	"Valdemar"	
	);
	
/*
	$nhcIssues = array
	(
	
	"Bleutooth",
	"Co2",
	"Dead",
	"Energy",
	"Humidity",
	"Mechanical",
	"Mesure",
	"Pressure",
	"Refund",
	"Sono",
	"Temperature",
	"Touch",
	"USB",
	"Wifi"
	
	);
*/	
	$nwsIssues = array
	(
	
	"Bleutooth",
	"Co2",
	"Dead",
	"Energy",
	"Humidity",
	"Mechanical",
	"Mesure",
	"Pressure",
	"Radio",
	"Refund",
	"Sono",
	"Temperature",
	"Touch",
	"USB",
	"Wifi"
	
	);
	
	$nthIssues = array
	(
	
	"Buttons",
	"cosmetic",
	"Dead",
	"Energy",
	"LDO",
	"Led",
	"Mechanical",
	"Pins",
	"Power Supply",
	"Radio",
	"Refund",
	"Screen",
	"Switching Relay",
	"Temperature",
	"Wifi"
	
	);
	
	$nrgIssues = array
	(
	
	"Battey Contact",
	"Dead",
	"Energy",
	"Measure",
	"Mechanical",
	"Radio",
	"Refund",
	"Wifi"
	
	);
	
	$nwgIssues = array
	(
	
	"Battey Contact",
	"Dead",
	"Energy",
	"Measure",
	"Mechanical",
	"Radio",
	"Refund",
	"Wifi"
	
	);
	
	$njbIssues = array
	(
	
	"Battey Contact",
	"Dead",
	"Energy",
	"Measure",
	"Mechanical",
	"Radio",
	"Refund",
	"Wifi"
	
	);
	
	
	$nscIssues = array
	(
	
	"Bleutooth",
	"Boot",
	"Camera",
	"Dead",
	"Energy",
	"Filter",
	"InfraRed",
	"Mechanical",
	"Mic",
	"Other",
	"Radio",
	"Refund",
	"SDcard",
	"Sound",
	"Update",
	"Wifi"
	
	);
	
?>
