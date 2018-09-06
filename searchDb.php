
<?php
	
	//connect to data base
	include 'connectDb.php';
	include("config.php");
	
	//get the searched string
	$search= $mysqli->real_escape_string(htmlspecialchars($_POST['search']));
	
	if($search==""){
		
		
		$query = "SELECT id,ticket,email,orderNum,module,serial,issue1,agent,solution,dateSetup,dateIn,dateOut,status  FROM `$dbTable`  WHERE `status` = 'Reparation' OR `status` = 'Reception' OR `status` ='pre-sent' ORDER BY dateIn ASC";
		
		
		}else{
		
		
		//create a sql query to search the string in database
		$query = "SELECT id,ticket,email,orderNum,module,serial,issue1,agent,solution,dateSetup,dateIn,dateOut,status  FROM `$dbTable` WHERE 
		`id`		 LIKE '%$search%' OR 
		`ticket`     LIKE '%$search%' OR 
		`email`      LIKE '%$search%' OR 
		`serial`     LIKE '%$search%' OR  
		`orderNum`   LIKE '%$search%' OR
		`module`	 LIKE '%$search%' OR
		`solution`	 LIKE '%$search%' OR
		`issue1`	 LIKE '%$search%' OR
		`agent`      LIKE '%$search%' OR 
		`technicien` LIKE '%$search%' OR
		`trackIn`    LIKE '%$search%' OR 
		`trackOut`   LIKE '%$search%' OR
		`status`     LIKE '%$search%'";
		
	}
	
	// get the query results to variable
	$result = $mysqli-> query($query);
	
	
	
	
	
	include("header.php");
?>


<body>
	
	
	<form id ="form" action="searchDb.php" method="post">
		
		<div id="topSearchRow" >
			
			<img src="img/smallLogo.png">
			<input id ="topSearchBox" type="text" name="search" autofocus="autofocus" value="<?php echo $search; ?>"/>
			
			<input id="button" type="submit" value="Search">
			<INPUT id="button" value="Create a new return" TYPE="button" onClick="parent.location = 'http://<?php echo $webAdress["ip"]; ?>/<?php echo $webAdress["dir"]; ?>/createReturn.php'">
			
		</div>
		
	</form>
	
	
	<?php   
		
		/* create a Dynamic table to show the result if the result is not null */
		if ($result->num_rows > 0) { 
			
			echo'	
			
			<table class="myTable"> 
			
			<thead>
			
			<tr>
			
			<th data-sort="int"> id </th>
			<th data-sort="string"> Ticket </th>
			<th data-sort="string"> Email </th>
			<th data-sort="int"> Order </th>
			<th data-sort="string"> Module </th>
			<th data-sort="string"> Serial </th>
			<th data-sort="string"> Issue </th>
			<th data-sort="string"> Agent </th>
			<th data-sort="string"> Solution </th>
			<th data-sort="string"> Setup Date </th>
			<th data-sort="string"> Date In </th>
			<th data-sort="string"> Date out </th>
			<th data-sort="string"> Status </th>
			
			</tr>
			
			</thead>
			
			<tbody > ';
			
			// create a coin with two sides	0/1			
			$coin=0;	
			//to count the list
			$countList=0;
			
			// output data of each row
			while($row = $result->fetch_assoc()) {
				
				// draw rows
				switch($row["status"]){
					
					case "Waiting": echo'<tr class="trWaiting" >';		break;
					case "Pre-sent": echo'<tr class="trEnCours" >';		break;
					case "Canceled": echo'<tr class="trDone" >';	break;
					case "Reception": echo'<tr class="trReception" >';	break;
					case "Refunded": echo'<tr class="trDone" >';	break;
					case "Reparation": echo'<tr class="trEnCours" >';	break;
					case "To Ship": echo'<tr class="trEnCours" >';	break;
					case "Done": echo'<tr class="trDone" >';	break;
					 
					
					
					default:				
				}
				
				//draw cells
				foreach ($row as $col => $cell){	
					
					echo'<td >' . $cell . '</td>';
					
				} 
				//count
				++$countList;
				
				// edit button added at the end or each line
				echo 
				'<td>
				
				<form method="post" action="editReturn.php">
				<input type="hidden" name="edit" value="'.$row["id"].'">
				<input id="icone" type="image" src="img/edit.png" alt="submit">
				</form>
				
				</td>';
				
			}
			
			echo 
			
			'</tr>
			
			</tbody>
			
			</table>';
			
			} else {  
			
			header('location:http://'.$webAdress["ip"].'/'.$webAdress["dir"].'/index.php?srch='.$search.''); 
			
		}
		
		// close data base connection
		$mysqli->close();
		
	?>
	
	<span id=count> <?php echo $countList; ?> </span>
	
</body>

</html>


