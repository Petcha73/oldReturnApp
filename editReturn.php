
<?php
	
	//connect to data base
	
	include 'connectDb.php';
	include("config.php"); //include config file
	
	$edit = isset($_POST['edit']) ? $mysqli->real_escape_string(htmlspecialchars($_POST['edit'])) : '';
	
	$query = "SELECT * FROM `$dbTable` WHERE `id`='$edit'";
	
	$result = $mysqli-> query($query);
	
	// get all data from database
	if ($result->num_rows > 0) {
		
		// output data of each row
		while($row = $result->fetch_assoc()) {
			
			$id= $row["id"];
			$ticket= $row["ticket"];
			$email=$row["email"];
			$order=$row["orderNum"];
			$guarenty= $row["guarenty"];
			$module= $row["module"];
			$serial= $row["serial"];
			$issue1=$row["issue1"];
			$issue2=$row["issue2"];
			$issue3=$row["issue3"]; 
			$remark=$row["remark"];
			$agent=$row["agent"];
			$technicien= $row["technicien"];
			$complete= $row["complete"];   
			$observation=$row["observation"];
			$correction=$row["correction"];
			$solution= $row["solution"];
			$commentry=$row["commentry"];
			$dateSetup= $row["dateSetup"];
			$dateReturn=$row["dateReturn"];
			$dateIn=$row["dateIn"];
			$dateOut=$row["dateOut"];
			$trackIn=$row["trackIn"];
			$trackOut=$row["trackOut"];
			$status=$row["status"];
			
		}
	} 
	else {
		echo $result->num_rows;
		
	}
	
	
	include("header.php");
	
	
?>

<body>
	
	
	<form class="myForm" action="editReturnPrintDb.php" method="post">
		
		
		
		<h1>
			
			<label>#<?= $id ?></label>
			Edit Return 
			
			<span>Please fill all the fields</span>
			
		</h1>
		
		
		<input type="hidden" name="id" value="<?= $id ?>">
		
		<div>
		
		
		
			
			<label>
				<span>Status :</span>
				<select id="status"name="status" >
					
					<?php
						foreach($statusList as $value):
						echo'<option'; if($status==$value){ 
						echo' selected="selected" '; } 
						echo' value="'.$value.'">'.$value.'</option>';
						endforeach;
					?>
					
				</select>
			</label> 
			
			<label>
				<span>Remark :</span>
				<textarea  name="remark" type="text" ><?=$remark ?> </textarea>
			</label>
			
			<hr id="myHr">
			
		</div>
		
		
		
		
		
		
		<div  class="waitingDiv">
			
			
			
			<label>
				<span>Client Ticket :</span>
				<input  name="ticket" type="text" value="<?= $ticket ?>" required>
			</label>
			
			<label>
				<span>Client E-mail :</span>
				<input name="email" type="email" value="<?= $email ?>" required>
			</label>
			
			<label>
				<span>Order Number :</span>
				<input  name="orderNum" type="text" value="<?= $order ?>" required>
			</label>
			
			<label>
				<span>Setup Date :</span>
				<input  name="dateSetup" type="date" value="<?= $dateSetup ?>" required>
			</label>
			
			<label>
				<span>Under Guarenty :</span>
				<input  name="guarenty" type="text" value="<?= $guarenty ?>" required>
			</label>
			
			<label>
				<span>Module :</span>
				<input  name="module" type="text" value="<?= $module ?>" required>
			</label>
			
			<label>
				<span>Serial :</span>
				<input  name="serial" type="text" value="<?= $serial ?>" required>
			</label>
			
			<label>
				<span>Issue :</span>
				
				
				<input  name="issue1" type="text" value="<?= $issue1 ?>" required>
				<input  name="issue2" type="text" value="<?= $issue2 ?>" >
				<input  name="issue3" type="text" value="<?= $issue3 ?>" >
				
			</label>
			
			<label>
				<span>Return Date :</span>
				<input  name="dateReturn" type="date" value="<?= $dateReturn ?>" required>
			</label>
			
			<label>
				<span>Track In :</span>
				<input  name="trackIn" type="text" value="<?= $trackIn ?>" required>
			</label>
			
			<label>
				<span>Agent :</span>
				<input name="agent" type="text" value="<?= $agent ?>" required>
			</label>
			<hr id="myHr">
			
		</div>
		
		
		
		<div  class="receptionDiv">
			
			
			
			<label class="reception" >
				<span>Date In :</span>
				<input  class="receptionI" name="dateIn" type="date" value="<?= $dateIn ?>">
			</label>
			
			<hr id="myHr"> 
			
		</div>
		
		
		<div  class="reparationDiv">
			
			<label>
				
				<span>Complete :</span>
				<select class="reparationI" name="complete" >
					<option selected disabled value="">Please select</option>
					<option <?php if($complete=="yes"){ ?> selected="selected"<?php ; } ?> value="yes">yes</option>
					<option <?php if($complete=="no"){ ?> selected="selected"<?php ; } ?> value="no">no</option>
				</select>
			</label>
			
			<label>
				<span>Observation :</span>
				<textarea    name="observation" type="text" ><?=$observation ?></textarea>
			</label>
			
			<label>
				<span>Correction :</span>
				<textarea class="reparationI"  name="correction" type="text" ><?=$correction ?> </textarea>
				<img  onclick="showHelp()" src="img/help.png" style="height: 30px;	width: 30px; opacity:0.7; padding:1px; position:relative; bottom:55px;">
			</label>
			
			<label>
				<span>Solution :</span>
				<select class="reparationI" name="solution" >
					<option selected disabled value="">Please select</option>
					
					<?php
						foreach($solutionList as $value):
						echo'<option'; if($solution==$value){ 
						echo' selected="selected" '; } 
						echo' value="'.$value.'">'.$value.'</option>';
						endforeach;
					?>
					
				</select>
			</label>
			
			<label>
				<span>Commentry :</span>
				<textarea    name="commentry" type="text" ><?=$commentry ?></textarea>
			</label>
			
			<label>
				<span>Technicien :</span>
				<select class="reparationI" name="technicien" >
					<option selected disabled value="">Please select</option>
					
					<?php
						foreach($technicienList as $value):
						echo'<option'; if($technicien==$value){ 
						echo' selected="selected" '; } 
						echo' value="'.$value.'">'.$value.'</option>';
						endforeach;
					?>
					
				</select>
			</label>
			
			<hr id="myHr">
			
		</div>
		
		
		
		
		
		<div class="shipmentDiv">
			
			
			<label>
				<span>Track Out :</span>
				<input class="shipmentI" name="trackOut" type="text" value="<?= $trackOut ?>"  >
			</label>
			
			<label>
				<span>Date Out :</span>
				<input  class="shipmentI" name="dateOut" type="date" value="<?= $dateOut ?>" >
			</label>
			
		</div>
		
		
		
		
		
		<label id="saveChange">
			<span>&nbsp;</span>
			<input class="button" type="submit" value="Save Changes">
			<input class="button" type="button" value="Cancel"  onClick="history.go(-1)">
		</label>	
		
	</form>
	
	
	
	
	
	<script>
		
		function showHelp(){
			window.open("pdf/main_chauffe.pdf");
		}
		
		function showTheSectionOf(a){ 
			
			$( ".waitingDiv" ).hide();
			$( ".receptionDiv" ).hide();
			$( ".reparationDiv" ).hide();
			$( ".shipmentDiv" ).hide();
			
			
			$( ".receptionI" ).removeAttr("required");
			$( ".reparationI" ).removeAttr("required");
			$( ".shipmentI" ).removeAttr("required");
			
			
			switch(a){
				
				case 1 : 
				
				$( ".waitingDiv" ).show();
				
				break;
				
				case 2 : 
				
				$( ".waitingDiv" ).show();
				$( ".receptionDiv" ).show();				
				
				$( ".receptionI" ).attr("required","required");  

				
				break;
				
				case 3 : 

				$( ".reparationDiv" ).show();
			
				$( ".reparationI" ).attr("required","required"); 
				
				break;
				case 4 : 

				$( ".shipmentDiv" ).show();
			
				$( ".shipmentI" ).attr("required","required"); 
				
				break;
				case 5 : 

				$( ".reparationDiv" ).show();
				$( ".shipmentDiv" ).show();
				
				$( ".reparationI" ).attr("required","required"); 
				$( ".shipmentI" ).attr("required","required"); 
				
				break;
				case 6 : 
				$( ".waitingDiv" ).show();
				$( ".receptionDiv" ).show();
				$( ".reparationDiv" ).show();
				$( ".shipmentDiv" ).show();
				
				$( ".receptionI" ).attr("required","required");  
				$( ".reparationI" ).attr("required","required"); 
				$( ".shipmentI" ).attr("required","required"); 
				
				break;
			}
			
		}
		
		$(document).ready( 		
		function(){ //execute a function
			
			switch($( "#status" ).val()){
				
				case "Waiting" : showTheSectionOf(1); break;
				
				case "Canceled" : showTheSectionOf(1); break;
				
				case "Reception" : showTheSectionOf(2); break;
				
				case "Refunded" : showTheSectionOf(2); break;
				
				case "Reparation" : showTheSectionOf(3); break;
				
				case "To Ship" : showTheSectionOf(4); break;
				
				case "Pre-sent" : showTheSectionOf(5); break;
				
				case "Done" : showTheSectionOf(6); break;
				
			}
			
		}
		);
		
		$(document).ready( 		
		$("#status").on("change",function () {
			
			switch($( "#status" ).val()){
				
				case "Waiting" : showTheSectionOf(1); break;
				
				case "Canceled" : showTheSectionOf(1); break;
				
				case "Reception" : showTheSectionOf(2); break;
				
				case "Refunded" : showTheSectionOf(2); break;
				
				case "Reparation" : showTheSectionOf(3); break;
				
				case "To Ship" : showTheSectionOf(4); break;
				
				case "Pre-sent" : showTheSectionOf(5); break;
				
				case "Done" : showTheSectionOf(6); break;
				
			}
			
		})
		);
		
	</script>
	
	
</body>
</html>
