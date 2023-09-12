<html>
	<header>
	<script type = "text/javascript">
		const startSnort =()=>{
			alert("Start running snort!\nPress [End snort] for stopping snort.");
			location.href='SnortAlertCapture.php?start=true';
		}	
	</script> 	
	</header>
	<?php
	shell_exec("sudo -S bash ./bashFile/StopSnort.sh 2>&1");
	include("Navibar.php");
	?>
	<body>
	<div style="
	margin:10px;
	display:flex;
	justify-content:center;
	">
	<input type="button"
	onclick="startSnort()"
	value="Start snort"/>
	
	<input type="button"
	onclick="location.href='SnortAlertCapture.php?end=true'"
	value="End snort"/>

	<input type="button"
	onclick="location.href='SnortAlertCapture.php'"
	value="Clear page"/>

	<input type="button"
	onclick="location.href='SnortAlertCapture.php?delete=true'"
	value="Delete log"/>

	</div>
	<br/>
	<?php
		if($_GET["end"]==true){
		$myfile = fopen("./log/alert","r") or die("Can not open");
		while(!feof($myfile)){
			echo fgets($myfile);
			echo "<br/>";
		}
		fclose($myfile);
	}
	?>
	<div id="content">
	</div>
	     
	</body>
<?php
	if($_GET["start"]==true){
		shell_exec("sudo -S bash ./bashFile/StartSnort.sh 2>&1");
	}	
	if($_GET["end"]==true){
		shell_exec("sudo -S bash ./bashFile/StopSnort.sh 2>&1");
	}
	if($_GET["delete"]==true){
		shell_exec("sudo -S bash ./bashFile/DeleteSnortLog.sh 2>&1");
	}	
	
?>
</html>
