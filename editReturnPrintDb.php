<?php
	//connect to data base
	include 'connectDb.php';
	include("config.php");
	
	
	//*****GET POST*******GET POST*******GET POST*******GET POST*******GET POST*******GET POST*******GET POST*******GET POST*******GET POST*******GET POST*******GET POST
	
	
	$id= $mysqli->real_escape_string(htmlspecialchars($_POST['id']));
	$ticket= $mysqli->real_escape_string(htmlspecialchars($_POST['ticket']));
	$email= $mysqli->real_escape_string(htmlspecialchars($_POST['email']));
	$orderNum= $mysqli->real_escape_string(htmlspecialchars($_POST['orderNum']));
	$guarenty= $mysqli->real_escape_string(htmlspecialchars($_POST['guarenty']));
	$module= $mysqli->real_escape_string(htmlspecialchars($_POST['module']));
	$serial= $mysqli->real_escape_string(htmlspecialchars($_POST['serial']));
	$issue1= $mysqli->real_escape_string(htmlspecialchars($_POST['issue1']));
	$issue2= $mysqli->real_escape_string(htmlspecialchars($_POST['issue2']));
	$issue3= $mysqli->real_escape_string(htmlspecialchars($_POST['issue3']));
	$remark= $mysqli->real_escape_string(htmlspecialchars($_POST['remark']));
	$agent= $mysqli->real_escape_string(htmlspecialchars($_POST['agent']));
	$technicien= $mysqli->real_escape_string(htmlspecialchars($_POST['technicien']));
	
	
	
	$observation= $mysqli->real_escape_string(htmlspecialchars($_POST['observation']));
	$correction= $mysqli->real_escape_string(htmlspecialchars($_POST['correction']));
	
	$observationTxt= nl2br(htmlspecialchars($_POST['observation']));
	$correctionTxt= nl2br(htmlspecialchars($_POST['correction']));
	
	$commentry= $mysqli->real_escape_string(htmlspecialchars($_POST['commentry']));
	$dateSetup= $mysqli->real_escape_string(htmlspecialchars($_POST['dateSetup']));
	$dateReturn= $mysqli->real_escape_string(htmlspecialchars($_POST['dateReturn']));
	$dateIn= $mysqli->real_escape_string(htmlspecialchars($_POST['dateIn']));
	$dateOut= $mysqli->real_escape_string(htmlspecialchars($_POST['dateOut']));
	$trackIn= $mysqli->real_escape_string(htmlspecialchars($_POST['trackIn']));
	$trackOut= $mysqli->real_escape_string(htmlspecialchars($_POST['trackOut']));
	$status= $mysqli->real_escape_string(htmlspecialchars($_POST['status']));
	
	if (!empty($_POST["complete"])) {
		
		$complete= $mysqli->real_escape_string(htmlspecialchars($_POST['complete']));
		
		}else{  
		$complete ="";
	}
	
	if (!empty($_POST["solution"])) {
		
		$solution= $mysqli->real_escape_string(htmlspecialchars($_POST['solution']));
		
		}else{  
		$solution ="";
	}
	
	
	If($status=="To Ship"){
		
		$status="Done";
		
		}
	
	//*****DO ACTION**********DO ACTION**********DO ACTION**********DO ACTION**********DO ACTION**********DO ACTION**********DO ACTION**********DO ACTION*****
	try
	{
		
		//insert data to the database table
		$query = "UPDATE $dbTable SET ticket='$ticket', email='$email', orderNum='$orderNum', guarenty='$guarenty', module='$module', serial='$serial', issue1='$issue1',issue2='$issue2',issue3='$issue3', remark='$remark', agent='$agent',technicien='$technicien', complete='$complete', observation='$observation', correction='$correction', solution='$solution',commentry='$commentry', dateSetup='$dateSetup', dateReturn='$dateReturn', dateIn='$dateIn', dateOut='$dateOut', trackIn='$trackIn', trackOut='$trackOut', status='$status' WHERE id='$id'";
		$mysqli -> query($query);
		
		//Traduction en français
		if($guarenty=="yes"){ $guarentyFr = "oui";}else{ $guarentyFr = "non";}
		if($complete=="yes"){  $completeFr ="oui";}else{ $completeFr ="non";}
		if($solution=="Repaired"){ $solutionFr="Réparé" ;}
		if($solution=="Swapped(new)"){ $solutionEn="Swapped with new"; $solutionFr="Echange à neuf" ;} 
		if($solution=="Swapped(ref)"){ $solutionEn="Swapped with refurbished"; $solutionFr="Echangé avec reconditionné" ;}
		if($solution=="Returned"){ $solutionEn="No reparation required"; $solutionFr="Aucune réparation" ;} 
		
		
		//Print the Repair Form
		if ($mysqli->query($query) === TRUE) {
			
			If ($status=="Reparation"){
				
				echo '
				
				<html>
				<head>
				
				<meta charset="UTF-8">
				<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
				
				<style>
				
				#main {
				
				border-style: solid;
				border-width: 1px;
				
				}
				
				#top {
				
				
				border-style: solid;
				border-width: 0px;
				
				
				}
				
				#client {
				padding: 10px;
				width:48%;
				border-style: 0px;
				border-width: 1px;
				float:left;
				
				
				}
				
				#product {
				
				padding: 10px;
				width: 45%;
				border-style: solid;
				border-width: 0 0 0 1px;
				float:left;
				}
				
				#correction {
				
				border-style: solid;
				border-width: 1 0 0 0px;
				
				padding:10px;
				
				}
				
				#technicien {
				
				border-style: solid;
				border-width: 1 0 0 0px;
				padding: 10px;
				
				}
				.clear{
				clear:both;
				
				}
				
				
				</style>
				
				</head>
				
				<body>
				
				
				
				<img src="img/banner.png" style="width:244px; height:57px"></img> 
				
				<div id="english">
				
				<h2 align="center">Repair Form</h2>
				
				<div id="main">
				
				<div id="top">
				<div id="client">
				<p>Reference : '.$ticket.'</p>
				<p>Email : '.$email.'</p>
				<p>Agent : '.$agent.'</p>
				<p style="color:white"> .</p>
				<p>RMA Date : '.$dateReturn.'</p>
				<p>Reception Date : '.$dateIn.'</p>
				</div>
				
				<div id="product">
				<p>Returned Product : '.$module.'</p>
				<p>Product Serial : '.$serial.'</p>
				<p>Order Number : '.$orderNum.'</p>
				<p>Under Warranty : '.$guarenty.'</p>
				<p>Complete : '.$complete.'</p>
				<p>Solution : '.$solution.'</p>
				</div>
				<div class="clear"></div>
				</div>
				
				<div id="correction">
				<p style="height:70px">Issue : '.$issue1.' '.$issue2.' '.$issue3.'</p>
				<p style="height:70px">Observation : '.$observationTxt.'</p>
				<p style="height:70px">Correction : '.$correctionTxt.'</p>
				<p style="height:70px">Comments : '.$commentry.'</p>
				
				</div>
				+
				
				<div id="technicien">
				<p style="height:20px">Technician : '.$technicien.'</p>
				<p style="height:40px">Date : '.$dateOut.'</p>
				</div>
				
				</div>
				
				</div>
				
				
				<div id="french">
				
				<h2 align="center">Fiche de r&eacuteparation</h2>
				
				<div id="main">
				
				<div id="top">
				<div id="client">
				<p>R&eacute;f&eacute;rence : '.$ticket.'</p>
				<p>Email : '.$email.'</p>
				<p>Agent : '.$agent.'</p>
				<p style="color:white"> .</p>
				<p>La date d&#39;accord du retour : '.$dateReturn.'</p>
				<p>La date de r&eacuteception : '.$dateIn.'</p>
				</div>
				
				<div id="product">
				<p>Produit renvoy&eacute : '.$module.'</p>
				<p>N&deg;  de s&eacuterie du produit : '.$serial.'</p>
				<p>N&deg;  de commande : '.$orderNum.'</p>
				
				<p>Sous Garantie : '.$guarentyFr.'</p>
				<p>Complet : '.$completeFr.'</p>
				
				<p>Solution : '.$solutionFr.'</p>
				</div>
				<div class="clear"></div>
				</div>
				
				<div id="correction">
				<p style="height:70px">Probl&egrave;me : '.$issue1.' '.$issue2.' '.$issue3.'</p>
				<p style="height:70px">Observation : '.$observationTxt.'</p>
				<p style="height:70px">Correction : '.$correctionTxt.'</p>
				<p style="height:70px">Commentaires : '.$commentry.'</p>
				
				</div>
				
				<div id="technicien">
				<p style="height:20px">Technicien : '.$technicien.'</p>
				<p style="height:40px">Date : '.$dateOut.'</p>
				</div>
				
				</div>
				
				</div>
				
				
				<div style="position:absolute; height: 100px; width: 150px;top: 3%;right: 0%;">
				
				<img  onclick="changeLanguage()" src="img/world.png" style="height: 30px;	width: 30px; opacity:0.7; padding:5px;">
				<img  onclick="window.print()" src="img/print.png" style="height: 30px;	width: 30px; opacity:0.7; padding:5px;">
				<img  onclick="history.go(-2)" src="img/return.png" style="height: 30px;	width: 30px; opacity:0.7; padding:5px;">
				
				</div>
				
				
				<p align="center" style="font-size:8; opacity:0.8" >Netatmo | SAS au Capital de 2 808 971 Euros | R.C.C : Nanterre 532 501 848 | TVA intracommunautaire : FRA43 532 501 848</p>
				
				
				<script>
				
				$(document).ready( 
				
				function() {
				
				$( "#english" ).hide();
				$( "#french" ).show();
				
				}
				)
				
				function changeLanguage() {
				
				if (!$("#french").is(":visible")) {
				
				
				$( "#english" ).hide();
				$( "#french" ).show();
				
				}else if (!$("#french").is(":hidden")) {
				
				$( "#english" ).show();
				$( "#french" ).hide();
				}
				
				
				}
				
				
				
				</script>
				
				</body>
				
				
				
				</html>';	
				}else{
				
				header('location:http://'.$webAdress["ip"].'/'.$webAdress["dir"].'/index.php'); 
				header('location:http://'.$webAdress["ip"].'/'.$webAdress["dir"].'/index.php'); 
				
			}
			
			} else {
			
			echo "Error updating record: " . $mysqli->error;
		}
		// close data base connection
		$mysqli->close();
		
	}catch(NAClientException $ex)
	{
		echo "Action failed\n";
	}
	
?>

