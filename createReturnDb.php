<?php
	//connect to data base
	include 'connectDb.php';
	include 'config.php';
	
	//*****GET POST*******GET POST*******GET POST*******GET POST*******GET POST*******GET POST*******GET POST*******GET POST*******GET POST*******GET POST*******GET POST
	
	$ticket= $mysqli->real_escape_string(htmlspecialchars($_POST['ticket']));
	$email= $mysqli->real_escape_string(htmlspecialchars($_POST['email']));
	$order= $mysqli->real_escape_string(htmlspecialchars($_POST['order']));
	$dateSetup= $mysqli->real_escape_string(htmlspecialchars($_POST['dateSetup']));
	$guarenty= $mysqli->real_escape_string(htmlspecialchars($_POST['guarenty']));
	$module= $mysqli->real_escape_string(htmlspecialchars($_POST['module']));
	$issue1= $mysqli->real_escape_string(htmlspecialchars($_POST['issue1']));
	$issue2= $mysqli->real_escape_string(htmlspecialchars($_POST['issue2']));
	$issue3= $mysqli->real_escape_string(htmlspecialchars($_POST['issue3']));
	$serial= $mysqli->real_escape_string(htmlspecialchars($_POST['serial']));
	$remark= $mysqli->real_escape_string(htmlspecialchars($_POST['remark']));
	$trackIn= $mysqli->real_escape_string(htmlspecialchars($_POST['trackIn']));
	$agent= $mysqli->real_escape_string(htmlspecialchars($_POST['agent']));
	$status= "Waiting";
	
	
	//*****DO ACTION**********DO ACTION**********DO ACTION**********DO ACTION**********DO ACTION**********DO ACTION**********DO ACTION**********DO ACTION*****
	try
	{
		$query = "INSERT INTO `sav`.`$dbTable` VALUES ('','$ticket','$email','$order','$guarenty','$module','$serial','$issue1','$issue2','$issue3','$remark','$agent','','','','','','','$dateSetup',curdate(),'','','$trackIn','','$status')";
		$mysqli -> query($query);
		
		if(mysql_errno()){
			echo "MySQL error ".mysql_errno().": "
			.mysql_error()."\n<br>When executing <br>\n$query\n<br>";
		}
				
		header('location:http://'.$webAdress["ip"].'/'.$webAdress["dir"].'/index.php'); 
		
			
	}catch(NAClientException $ex)
	{
		echo "Action failed\n";
	}
		
?>

