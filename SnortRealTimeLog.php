<html>
	<head>
		<title>Snort Log</title>
		<link href="css/table.css" rel="stylesheet"/>
		<script>
		const startSnort=()=>{
			alert("Start running snort!\nPress [End Snort] for stopping snort.")
			location.href='SnortRealTimeLog.php?start=true';	
		}
		</script>
	</head>
	<?php
		include("Navibar.php");
		include("LinkToSQL.php");
	?>
	<body>
	<input type="button"
	onclick="startSnort()"
	value="Start snort">
	<input type="button"
	onclick="location.href='SnortRealTimeLog.php?end=true'"	
	value="End snort">
	<input type="button"
	onclick="location.href='SnortRealTimeLog.php?clear=true'"	
	value="Clear log">
	<table style="line-height:40px;"align="center">
	<thead>
		<tr>
			<th>No</th><th>Time</th><th>Source</th><th>Destination</th><th>Protocol</th><th>Source Port(TCP)</th><th>Destination Port(TCP)</th><th>Source Port(UDP)</th><th>Destination Port(UDP)</th><th>Package Length</th>
		</tr>
	</thead>
	<tbody>
	<?php
	if($_GET["end"]==true){
		shell_exec("sudo -S bash ./bashFile/SetDataToCsv.sh 2>&1");
		$file = fopen("./log/formatLog.csv","r") or die ("Can not open");
		$today = date ("Y-m-d H:i:s" ) ;
		while(($row=fgetcsv($file))!==false){
			echo "<tr>";
			foreach($row as $value){
				echo"<td>".$value."</td>";
			}
			echo "</tr>";
			$SQL="INSERT INTO a1083365 (no,RelativeTime,PackageNo, SourceAddress, DestinationAddress, Protocol,SourcePortTCP,DestinationPortTCP,SourcePortUDP,DestinationPortUDP,Length,Date) VALUES (NULL,'$row[0]','$row[1]','$row[2]','$row[3]','$row[4]','$row[5]','$row[6]','$row[7]','$row[8]','$row[9]','$today')";
mysqli_query($LinkToSQL,$SQL);
		}
	}
	?>	
	</tbody>
	</table>
	</body>
<?php
	if($_GET["clear"]==true){
		echo "Clear!";
	}
	if($_GET["start"]==true){
		shell_exec("sudo -S bash ./bashFile/StartSnortLog.sh 2>&1");
	}
?>
</html>
