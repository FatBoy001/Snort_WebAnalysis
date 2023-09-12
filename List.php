<html>	
	<header>
		<title>Snort Log</title>
		<link href="css/main.css" rel="stylesheet"/>
	</header>
	<?php 
		include("Navibar.php");
		include("LinkToSQL.php");
	?>
	<body>
	<div class="container">
	<table class="logTable">
		<thead>
		<tr>
		<th>no</th><th>Package No</th><th>Time</th><th>Source</th><th>Destination</th><th>Protocol</th><th>Source Port(TCP)</th><th>Destination Port(TCP)</th>
		<th>Source Port(UDP)</th><th>Destination Port(UDP)</th><th>Package Length</th><th>Log Date</th>
		</tr>
		</thead>
		<tbody>
		<?php
		$SQLSearch = "SELECT * FROM a1083365";
		$result=mysqli_query($LinkToSQL,$SQLSearch);
		
		if($result){
			while($row=mysqli_fetch_assoc($result)){
				echo "<tr>";
				foreach($row as $value){
					echo "<td>".$value."</td>";
				}
				echo "</tr>";	
			}
		}
		?>
		</tbody>
	</table>
	<div>
	</body>
</html>

