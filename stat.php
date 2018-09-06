
<?php
	
	//connect to data base
	include('connectDb.php');
	include('header.php'); 
	include('config.php'); 
	
	$month = isset($_POST['month']) ? $mysqli->real_escape_string(htmlspecialchars($_POST['month'])) : '';
	$year = isset($_POST['year']) ? $mysqli->real_escape_string(htmlspecialchars($_POST['year'])) : '';
	$monthName='';
	$yearName='';
	
	If ( isset($month)){
		If ( isset($year)){
		$queryModule="SELECT `module`,COUNT(`id`) FROM `$dbTable` WHERE month(`dateIn`)=".$month." AND year(`dateIn`)=".$year."  AND `Issue1`!= 'Refund' GROUP BY `module`";
		$resultModule = $mysqli-> query($queryModule);
		
		$queryIssue="SELECT  `module`,`issue1`,COUNT(`id`) FROM `$dbTable` WHERE month(`dateIn`)=".$month." AND year(`dateIn`)=".$year."  GROUP BY `module`";
		$resultIssue = $mysqli-> query($queryIssue);
		
		$dateReturn="SELECT COUNT(`id`) FROM `$dbTable` WHERE month(`dateReturn`)=".$month." AND year(`dateReturn`)=".$year."  AND `Issue1`!= 'Refund'";
		$resultDateReturn = $mysqli-> query($dateReturn);
		
		$dateIn="SELECT COUNT(`id`) FROM `$dbTable` WHERE month(`dateIn`)=".$month." AND year(`dateIn`)=".$year."  AND `Issue1`!= 'Refund'";
		$resultDateIn = $mysqli-> query($dateIn);
		
		$dateOut="SELECT COUNT(`id`) FROM `$dbTable` WHERE month(`dateOut`)=".$month." AND year(`dateOut`)=".$year."  AND `Issue1`!= 'Refund'";
		$resultDateOut = $mysqli-> query($dateOut);
			}
	}
?>


<body>
	
	<form id="form" action="stat.php" method="post">
		
		<div id="topSearchRow" >
			
			<img src="img/smallLogo.png">
			
			<label id="topSearchBox">
				
				<select id="topStatSearchBox" name="month" Required>
					<option selected disabled value=""></option>
					
					<?php
						foreach($months as $key => $value):
						echo '<option value="'.$key.'">'.$value.'</option>'; 
						endforeach;
					?>
					
				</select>
				
				<select id="topStatSearchBox" name="year" Required>
					<option selected disabled value=""></option>
					
					<?php
						foreach($years as $key => $value):
						echo '<option value="'.$key.'">'.$value.'</option>'; 
						endforeach;
					?>
					
				</select>
			</label>
			
			
			
			<input id="button" type="submit" value="Search">
			
			
		</div>
		
	</form>
	
	<?php // display the month name
		foreach($months as $key => $value):
		 
		if ($key==$month){
			
			$monthName = $value;
			
		}
		endforeach;
		
		foreach($years as $key => $value):
		 
		if ($key==$year){
			
			$yearName = $value;
			
		}
		endforeach;
	?>
	
	
	<span id=mainTitle > <?php echo $monthName." ".$yearName; ?></span>
	
	
	<p> Number of Return Arranged this month : 	<?php If ( $monthName!="") {while($row = $resultDateReturn->fetch_assoc()) { foreach ($row as $col => $cell){ echo  $cell;} } }?> </p>
	<p> Number of Return Recieved this month : 	<?php If ( $monthName!="") {while($row = $resultDateIn->fetch_assoc()) { foreach ($row as $col => $cell){ echo  $cell;} } }?> </p>
	<p> Number of Return Sent Back this month : <?php If ( $monthName!="") {while($row = $resultDateOut->fetch_assoc()) { foreach ($row as $col => $cell){ echo  $cell;} } }?> </p>
	
	<?php   //module table  
		
		/* create a Dynamic table to show the result if the result is not null */
		
		If ( $monthName!="") {
		
		if ($resultModule->num_rows > 0) { 
			
			echo'	
			
			<table class="pure-table" style="width:300px; margin:0 auto;" > 
			
			<thead>
			
			<tr>
			
			<th data-sort="string"> Module </th>
			<th data-sort="int"> Returns </th>
			
			
			</tr>
			</thead>
			
			<tbody > ';
			
			// create a coin with two sides		0/1			
			$coin=0;	
			
			// output data of each row
			while($row = $resultModule->fetch_assoc()) {
				
				if ($coin==0){
					
					echo '	<tr> ';
					$coin=1;
					
					}else{
					
					echo '<tr class="pure-table-odd">';	
					$coin=0;
					
				}
				
				foreach ($row as $col => $cell){	
					
					echo '<td >' . $cell . '</td>';
					
				} 
				
			}
			
			echo '</tr>
			
			</tbody>
			
			</table>';
			
		} }
		
		
		
	?>
	
	<?php   //issue table  
		
		/* create a Dynamic table to show the result if the result is not null */
		/*
		if ($resultIssue->num_rows > 0) { 
			
			echo'	
			
			<table class="pure-table" style="width:500px; margin:0 auto;"> 
			
			<thead>
			
			<tr> 
			
			<th data-sort="string"> Module </th>
			<th data-sort="string"> Issue1 </th>
			<th data-sort="string"> Issue2 </th>
			<th data-sort="string"> Issue3 </th>
			<th data-sort="int"> Returns </th>
			
			
			</tr>
			</thead>
			
			<tbody > ';
			
			// create a coin with two sides		0/1			
			$coin=0;	
			
			// output data of each row
			while($row = $resultIssue->fetch_assoc()) {
				
				if ($coin==0){
					
					echo '	<tr> ';
					$coin=1;
					
					}else{
					
					echo '<tr class="even">';	
					$coin=0;
					
				}
				
				foreach ($row as $col => $cell){	
					
					echo '<td >' . $cell . '</td>';
					
				} 
				
			}
			
			echo '</tr>
			
			</tbody>
			
			</table>';
			
		} else {  echo "conatct prashanth: trouble module table display"; }
		
		// close data base connection
		
		*/
	?>
	
	
</body>

</html>
