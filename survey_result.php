<?php

	include('./connect_db.php');
		
	//db connect
	$conn = new mysqli($host_name, $db_user, $db_pw, $db_name);
	if($conn->connect_error){
		die('Connection failed: '. $conn->connect_error);
	}

	$sql = "select * from survey";
	$result = $conn->query($sql);

	//$row = mysql_fetch_array($result);
	
	if($result->num_rows > 0){
		
		while($row = $result->fetch_assoc()){
			$total = $row['ans1'] + $row['ans2'] + $row['ans3'] + $row['ans4'];
		
			$ans1 = $row['ans1'];
			$ans2 = $row['ans2'];
			$ans3 = $row['ans3'];
			$ans4 = $row['ans4'];

			$ans1_per = $ans1/$total * 100;
			$ans2_per = $ans2/$total * 100;
			$ans3_per = $ans3/$total * 100;
			$ans4_per = $ans4/$total * 100;

			$ans1_per = floor($ans1_per);
			$ans2_per = floor($ans2_per);
			$ans3_per = floor($ans3_per);
			$ans4_per = floor($ans4_per);
	
		}
	}

?>

<form name="survey_form" method="post"> 
<table border=0 cellpadding=4 cellspacing=1 align=center width="300" bgcolor="#cccccc">
	<tr>
		<td bg color = "#fafafa" align="center">
			<table width="98%" cellpadding="3">
				<tr><td><font color="red">Total number of Votes : <?php echo $total?>&nbsp;people</font></td></tr>
				<tr><td><strong><font color = "gray">Who is the 2018 Russian World Cup Winners ?</font></strong></td></tr>
				<tr><td bgcolor="green"></td></tr>

				<tr>
					<td>
						Brazil ---- <?php echo $ans1_per?>%<font color=green>&nbsp;&nbsp;&nbsp; Voters: <?php echo $ans1; ?></font>
					</td>
				</tr>
				<tr>
					<td>
						<table>
							<tr>
								<td width="<?php echo $ans1_per ?>%" height="7" bgcolor="yellow"></td>
								<td width="<?php echo $rest = 100 - $ans1_per ?>" height="7" bgcolor="gray"></td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td>
						Germany ---- <?php echo $ans2_per?>%<font color=green>&nbsp;&nbsp;&nbsp; Voters: <?php echo $ans2; ?>
					</td>
				</tr>
				<tr>
					<td>
						<table>
							<tr>
								<td width="<?php echo $ans2_per ?>%" height="7" bgcolor="red"></td>
								<td width="<?php echo $rest = 100 - $ans2_per ?>" height="7" bgcolor="gray"></td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td>
						Italy ---- <?php echo $ans3_per?>%<font color=green>&nbsp;&nbsp;&nbsp; Voters: <?php echo $ans3; ?>
					</td>
				</tr>
				<tr>
					<td>
						<table>
							<tr>
								<td width="<?php echo $ans3_per ?>%" height="7" bgcolor="blue"></td>
								<td width="<?php echo $rest = 100 - $ans3_per ?>" height="7" bgcolor="gray"></td>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td>
						Portugal ---- <?php echo $ans4_per?>%<font color=green>&nbsp;&nbsp;&nbsp; Voters: <?php echo $ans4; ?>
					</td>
				</tr>
				<tr>
					<td>
						<table>
							<tr>
								<td width="<?php echo $ans4_per ?>%" height="7" bgcolor="brown"></td>
								<td width="<?php echo $rest = 100 - $ans4_per ?>" height="7" bgcolor="gray"></td>
							</tr>
						</table>
					</td>
				</tr>
				<tr height="10"></tr>
				<tr><td height="5" width="100%" align="center"><b>The result of Votes</b></td></tr>
				<tr>
					<table>
						<tr>
							<td width="<?php echo $ans1_per*1.2 ?>%" height="7" align="center"><?php echo $ans1_per ?>%</td>
							<td width="<?php echo $ans2_per*1.2 ?>%" height="7" align="center"><?php echo $ans2_per ?>%</td>
							<td width="<?php echo $ans3_per*1.2 ?>%" height="7" align="center"><?php echo $ans3_per ?>%</td>
							<td width="<?php echo $ans4_per*1.2 ?>%" height="7" align="center"><?php echo $ans4_per ?>%</td>
						</tr>
						<tr>
							<td width="<?php echo $ans1_per*1.2 ?>%" height="7" bgcolor="yellow" align="center">Brazil</td>
							<td width="<?php echo $ans2_per*1.2 ?>%" height="7" bgcolor="red" align="center">Germany</td>
							<td width="<?php echo $ans3_per*1.2 ?>%" height="7" bgcolor="blue" align="center">Italy</td>
							<td width="<?php echo $ans4_per*1.2 ?>%" height="7" bgcolor="brown" align="center">Portugal</td>
						</tr>
					</table>
				</tr>	


				<tr><td height="3"></td></tr>
				<tr><td align="center">
						<button type="button" style="cursor:hand" onfocus = this.blur(); onclick="window.close()">CLOSE</button>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
</form>