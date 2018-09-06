

<?php
	//connect to data base
	include 'connectDb.php';
	include 'config.php';
	
	//to keep the search string available
	$srch = isset($_GET['srch']) ? $mysqli->real_escape_string(htmlspecialchars($_GET['srch'])) : '';
	
	include("header.php"); //include header 
	
?>

<body>
	
	<img id="mainLogo" src="img/logo.png">
	
	<form id="form" action="searchDb.php" method="post">
	
		
		
		<input id ="mainSearchBox" type="text" name="search" autofocus="autofocus" value="<?php echo $srch; ?>"/>
		
		
		<p id="buttonsRow">
			<input id="button" type="submit" value="Search Database">
			<INPUT id="button" value="Create a new return" TYPE="button" onClick="parent.location = 'http://<?php echo $webAdress["ip"]; ?>/<?php echo $webAdress["dir"]; ?>/createReturn.php'">
		</p>
		
	</form>
	
</body>

</html>