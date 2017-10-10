<script>
	function update(){
		var vote;
		var len = document.survey_form.team.length; 

		for(var i = 0; i < len; i++){
			if(document.survey_form.team[i].checked == true){
				vote = document.survey_form.team[i].value;
				break;
			}
		}

		if(i == len){
			alert('You should check one of answers');
			return;
		}


		window.open("survey_update.php?team="+vote,"","left=150, top=100, width=350, height=450");
	}

	function result(){
		window.open("survey_result.php","","left=150, top=100, width=350, height=450");
	}

</script>

<form name="survey_form" method="post"> 
<table border=0 cellpadding=4 cellspacing=1 align=center width="300">
	<tr>
		<td bg color = "#fafafa" align="center">
			<table width="98%" cellpadding="3">
				<tr><td>Who is the 2018 Russian World Cup Winners ?</td></tr>
				<tr><td><input type = "radio" name="team" value="ans1">Brazil</td></tr>
				<tr><td><input type = "radio" name="team" value="ans2">Germany</td></tr>
				<tr><td><input type = "radio" name="team" value="ans3">Italy</td></tr>
				<tr><td><input type = "radio" name="team" value="ans4">Portugal</td></tr>
				<tr><td height="1" bgcolor="#cccccc" width="100%"></tr>
				<tr><td height="3"></td></tr>
				<tr><td align="center">
						<button type="button" name="vote" id="vote" onclick="update()">VOTE</button>&nbsp;&nbsp;
						<button type="button" onclick="result()">RESULT</button>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
</form>

