

<?php include("connectDb.php");?>
<?php include("config.php");?>

<?php
	
	
	// permet de récuperer les donnés du client depuis le lien de LiveAgent
	$mail = isset($_GET['mail']) ? $mysqli->real_escape_string(htmlspecialchars($_GET['mail'])) : '';
	$order = isset($_GET['order_id']) ? $mysqli->real_escape_string(htmlspecialchars($_GET['order_id'])) : '';
	$dateSetup = isset($_GET['date_setup']) ? $mysqli->real_escape_string(htmlspecialchars($_GET['date_setup'])) : '';
	$serial = isset($_GET['mac']) ? $mysqli->real_escape_string(htmlspecialchars($_GET['mac'])) : '';
	
?>

<?php include("header.php");?>


<body>
	
	<form class="myForm" action="createReturnDb.php" method="post">
		
		<h1>
			New Return
			<span>Please fill all the fields</span>
		</h1>
		
		<label>
			<span>Client Ticket :</span>
			<input  name="ticket" type="text" autofocus="autofocus" required>
		</label>
		
		<label>
			<span>Client E-mail :</span>
			<input name="email" type="email" value="<?= $mail ?>" required>
		</label>
		
		<label>
			<span>Order Number :</span>
			<input  name="order" type="text" value="<?= $order ?>"  required>
		</label>
		
		<label>
			<span>Setup Date :</span>
			<input  name="dateSetup" type="date" value="<?= $dateSetup ?>" required>
		</label>
		
		<label>
			<span>Under warenty :</span>
			<select name="guarenty">
				<option selected disabled value=""></option>
				<option value="yes">yes</option>
				<option value="no">no</option>
			</select>
		</label>
		
		<label>
			<span>Module :</span>
			<select id="module" name="module">
				<option selected disabled value=""></option>
				
				<?php
					foreach($moduleTypes as $key => $value):
					echo '<option value="'.$key.'">'.$value.'</option>'; 
					endforeach;
				?>
				
			</select>
		</label>
		
		<label>
			<span>Serial :</span>
			<input  name="serial" type="text" value="<?= $serial ?>" required>
		</label>
		
		<label class="issue">
			<span>Issue :</span>
			
			
			<?php
				// the most beautifull code yet, enjoy the decoding			
				foreach($issueList as $key => $value):
				
				echo '<div id="'.$key.'">';
				
				for ($i=0; $i<$numberOfIssues; $i++) {
					
					$j=$i+1;
					
					echo '<select id="issue'.$j.'" name="issue'.$j.'">
					<option selected disabled value=""></option>';
					
					foreach($$value as $value2):
					echo '<option value="'.$value2.'">'.$value2.'</option>'; 
					endforeach;
					
					echo'
					</select>'	;
					
				}
				
				echo '</div>';
				
				endforeach;
				
			?>
			
			
		</label>
		
		<label>
			<span>Remark :</span>
			<textarea  name="remark" type="text" > </textarea>
		</label>
		
		<input type="hidden" name="dateReturn" value="curdate()">
		
		<label>
			<span>Track In :</span>
			<input  name="trackIn" type="text"  required>
		</label>
		
		<label>
			<span>Agent :</span>
			<select id="agent" name="agent">
				<option selected disabled value=""></option>
				
				<?php
					foreach($agentName as $value):
					echo '<option value="'.$value.'">'.$value.'</option>'; 
					endforeach;
				?>
				
			</select>
		</label>
		
		<label id=bottomButton >
			
			<input class="button" type="submit" value="Save">
			<input class="button" type="button" value="Cancel"  onClick="history.go(-1)">
		</label>	
		
	</form>
	
	<script>
		
		
		
		$(document).ready( 		
		
		function(){ 
			
			$( ".issue" ).hide();
			
		}
		
		);
		
		
		$(document).ready( 	
		
		$("#module").on("change",function () {
			
			$( ".issue" ).show();
			
			switch($( "#module" ).val()){
				
				case "NHC" : showTheIssuesOf(1); break;
				
				case "NWS" : showTheIssuesOf(1); break;
				
				case "NMM" : showTheIssuesOf(1); break;
				
				case "NOM" : showTheIssuesOf(1); break;
				
				case "NIM" : showTheIssuesOf(1); break;
				
				case "NRG" : showTheIssuesOf(2); break;
				
				case "NWG" : showTheIssuesOf(3); break;		
				
				case "NTH" : showTheIssuesOf(4); break;
				
				case "TPG" : showTheIssuesOf(4); break;
				
				case "THM" : showTheIssuesOf(4); break;
				
				case "NJB" : showTheIssuesOf(5); break;
				
				case "NSC" : showTheIssuesOf(6); break;
				
				case "NOC" : showTheIssuesOf(6); break;
				
				case "NDT" : showTheIssuesOf(6); break;
				
			}
			
		})
		
		);
		
		function showTheIssuesOf(a){ 
			
			$( "#station" ).hide();
			$( "#rain" ).hide();
			$( "#wind" ).hide();
			$( "#thermostat" ).hide();
			$( "#june" ).hide();
			$( "#welcome" ).hide();
			
			switch(a){
			
			case 1 :  $( "#station" ).show(); break;
			case 2 :  $( "#rain" ).show(); break;
			case 3 :  $( "#wind" ).show(); break;
			case 4 :  $( "#thermostat" ).show(); break;
			case 5 :  $( "#june" ).show(); break;
			case 6 :  $( "#welcome" ).show(); break;
			
			}
		}
		
	</script>
	
	
</form>
</body>
</html>
