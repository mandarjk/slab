<?php
	$servername = "localhost";
	$username = "root";
	$password = "shinchan";
	$dbname = "slab";

	$conn = new mysqli($servername, $username, $password , $dbname);

	if ($conn->connect_error) {
    	die("Connection failed: " . $conn->connect_error);
	} 
//	echo "Connected successfully";

?>
<html>
<head> <title> result </title></head>
	<body>

	


<?php
	echo"<br>";
	$sql = "SELECT * FROM slabsteel";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	// output data of each row

?>
<center>
	<table border=2 >
	<tr>	
		<th align="center"> Sr.No.</th>
	 	<th width="12" align="center">Slab no</th><th align="center"> Discription</th><th width="12" align="center">Diameter of bar
		</th>
		<th align="center">No of bars</th><th align="center">Length</th><th align="center">8mm</th>
		<th align="center">10mm</th><th align="center">12mm</th><th align="center">16mm</th>
	</tr>
	
<?php
    	while($row = $result->fetch_assoc()) {
?>	
	
	<tr width="10">	
		<td align="center"><?php echo  $row['srno']; ?></td>
		<td align="center"><?php echo  $row['Slab_No'];?></td>
		<td align="justify"><?php echo  $row['Discription']; ?></td> 
		<td align="center"><?php echo  $row['Dia_of_bar']; ?></td> 
		<td align="center"><?php echo  $row['no_of_bar']; ?></td>
		<td align="center"><?php echo  $row['Length']; ?></td>
		<td align="center"><?php echo  $row['8mm']; ?></td>
		<td align="center"><?php echo  $row['10mm']; ?></td> 
		<td align="center"><?php echo  $row['12mm']; ?></td>
		<td align="center"><?php echo  $row['16mm']; ?></td>
		

        </tr>

<?php	
	
    	}
	} 	
	else {
    	echo "0 results";
	}
	

	
	

?>
	<tr>
	<td></td><td></td><td></td><td></td><td></td><td align="center">TOTAL</td><td align="center"><?php $sql = "SELECT SUM(8mm) FROM slabsteel";
						$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	    while($row = $result->fetch_assoc()) {
		$a=$row["SUM(8mm)"];
		$a8=round($a,2);
		echo"$a8";
	        //echo $row["SUM(8mm)"];
    }
} 

 ?>
</td><td align="center"><?php $sql = "SELECT SUM(10mm) FROM slabsteel";
						$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	    while($row = $result->fetch_assoc()) {
		$a=$row["SUM(10mm)"];
		$a10=round($a,2);
		echo"$a10";
	        //echo $row["SUM(8mm)"];
    }
} 

 ?></td><td align="center"><?php $sql = "SELECT SUM(12mm) FROM slabsteel";
						$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	    while($row = $result->fetch_assoc()) {
		$a=$row["SUM(12mm)"];
		$a12=round($a,2);
		echo"$a12";
	        //echo $row["SUM(8mm)"];
    }
} 

 ?></td><td align="center"><?php $sql = "SELECT SUM(16mm) FROM slabsteel";
						$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	    while($row = $result->fetch_assoc()) {
		$a=$row["SUM(16mm)"];
		$a16=round($a,2);
		echo"$a16";
	        //echo $row["SUM(8mm)"];
    }
} 


 ?></td>

	<tr>
	<td></td><td></td><td></td><td></td><td align="center">Wt/Rmt</td><td align="center">=</td><td>0.395</td><td>0.617</td>
	<td>0.888</td><td>1.580</td>
</tr>
<?php
	$id8=round($a8 * 0.395,2); $id10=round ($a10 * 0.617,2); $id12 =round( $a12 * 0.888 ,2); $id16 =round( $a16 * 1.580 ,2);

	$tw = ($id8 + $id10 + $id12 + $id16 ) /1000;
	$tws = round($tw,2);
	
?>
<tr> 	<td></td><td></td><td></td><td></td><td></td><td></td>
	<td align="center"><?php echo  $id8; ?></td><td align="center"><?php echo  $id10; ?></td><td align="center"><?php echo  $id12; ?></td>
	<td align="center"><?php echo  $id16; ?></td>
</tr>
<tr>
	<td></td><td></td><td></td><td></td><td></td><td align="center">TOTAL</td><td align="center"><?php echo $tws ;?></td><td>Mt</td>

</tr>

</table>
</center> 

jkmandar@gmail.com
</body>
</html>
<?php
	$sql = "TRUNCATE TABLE slabsteel";
	if ($conn->query($sql) === TRUE) {
	//	echo"table truncated";
	}
?>
