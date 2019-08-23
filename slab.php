<html>
<head> 
	<title> calculation </title> 
	<style type="text/css">
	.mad {
	background-color:white;
	}
	body {
	margin: 0;
	padding:0;
	width: 100%;
	height: 100%;
	}

	.mad input[type=number] {
	   	position: relative;
    		width: 60px; 
	}
	table{
	width:50%; 
	background-color: #f1f1c1;
	text-align: justify;
	}	
    </style>
<head>
	<body bgcolor="#qwe">
		<font color=white><center><u><i><h1> SLAB  </h1></u></i></center></font>
		<div class="mad"><br>
		<form  method="post" action=s.php name="fs">									
		<hr>
		&nbsp;&nbsp;&nbsp;&nbsp;<font size = 5 > Name of Work :</font><input type="text" size="50" style="font-size:25" name="name"><br>
		<hr>
		<font color="darkblue">
		&ensp; Slab Type =	<select  name="task">		
					<option value="one way">one way</option>
  					<option value="two way">two way</option>
  					<option value="cantilever">cantilever</option>
					</select>&ensp;&ensp;
		Slab Numbers :<input type="text" size="20" name="n">&ensp;&ensp;
		&ensp; Number of Slab :<input type="number"  width="100" hight ="50" name="num"><br><br>
		&ensp; Slab S/s Length = <input type="number"  width="100" hight ="50" name="ssl"><br><br>
		&ensp; Slab L/s Length = <input type="number"  width="100" hight ="50" name="sll"><br><br> 	
		&ensp; Left / Right Continious slab along S/s = <input type="number"  width="100" hight ="50" name="cssl" 
								placeholder="L/T">&nbsp;mt
		&ensp;&ensp; <input type="number"  width="100" hight ="50" name="cssl1" placeholder="R/B">&nbsp;mt<br><br>
		&ensp; Top / Bottom Continious slab along L/s = <input type="number"  width="100" hight ="50" name="csll"
								 placeholder="L/T">&nbsp;mt
		&ensp;&ensp; <input type="number"  width="100" hight ="50" name="csll1" placeholder="R/B">&nbsp;mt<br><br>
		<center>
		<table border=1>
			<tr>
			<th>Discription</th><th> Dia of Bar </th><th>Speacing</th>
			</tr>
			<tr>
			<th>Short Span</th><td><select  name="dss">
					<option value="8">8</option>
					<option value="10">10</option>
  					<option value="12">12</option>
					<option value="16">16</option>
					</select>&nbsp;mm </td>
			<td><input type="number" step="0.001" size="20" name="sss">m&ensp;C/C</td>
			</tr>
			<tr>
			<th>Long Span</th><td><select  name="dls">
					<option value="8">8</option>
					<option value="10">10</option>
  					<option value="12">12</option>
					<option value="16">16</option>
					</select>&nbsp;mm </td>
			<td><input type="number" step="0.001" size="20" name="sls">m&ensp;C/C</td>
			</tr>	
		</table><br><br>
		<center><input type = submit name=submit style="font-size:25;color:white;background-color:#FF0000;border:1">			
		</form>				
		</div>		
	</body>
	
</html>		

<?php
	$servername = "localhost";
	$username = "root";
	$password = "shinchan";

	$conn = new mysqli($servername, $username, $password);

	if ($conn->connect_error) {
    	die("Connection failed: " . $conn->connect_error);
	} 
	echo "Connected successfully";

	$sql = "CREATE DATABASE slab";			
	if ($conn->query($sql) === TRUE) {
    	echo "Database created successfully";
	} 
	else{
    	echo "Error creating database: " . $conn->error;
	}
	$sql = "USE slab";
	if ($conn->query($sql) === TRUE) {
    	echo "Using successfully";
	} 
	else{
    	echo "Not using " . $conn->error;
	}
	
	$sql =" CREATE TABLE slabsteel(srno INT ,Slab_No VARCHAR(200) , Discription VARCHAR(100) ,Dia_of_bar INT,no_of_bar VARCHAR(10),
						 Length FLOAT , 8mm FLOAT , 10mm FLOAT ,12mm FLOAT , 16mm FLOAT )";

	if ($conn->query($sql) === TRUE) {
    	echo "Table created successfully";
	} 
	else{
	echo "Error creating table: " . $conn->error;
	}
	
?>

