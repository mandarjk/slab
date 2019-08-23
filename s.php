<?php
	$servername = "localhost";
	$username = "root";
	$password = "shinchan";
	$dbname = "slab";

	$conn = new mysqli($servername, $username, $password , $dbname);

	if ($conn->connect_error) {
    	die("Connection failed: " . $conn->connect_error);
	} 
	echo "Connected successfully";
	$work="";
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
    	if (empty($_POST["name"])=="") {
	$work = $_POST["name"];    	
	}
    	else {
        $work = "Missing work name";
    	}
	}
	echo"<br><br>";
	echo"<font size =5><center>Work Name : $work </font></center>";
	echo"<hr>";

// take inputes 

	$noofslab = $_POST["num"];
	echo"<font size =4> Number of slab  : $noofslab </font>";

	echo"<br>";
	
	$slabno = $_POST["n"];
	echo"<font size =4> Number of slab  : $n </font>";
	
	echo"<br>";

	$slabt = $_POST["task"];
	echo"<font size =4> Slab Type : $slabt </font>";
	
	echo"<br>";

	$slabsl = $_POST["ssl"];
	echo"<font size =4> Slab S/s Length : $slabsl </font>";
	
	echo"<br>";

	$slabll = $_POST["sll"];
	echo"<font size =4> Slab L/s Length : $slabll </font>";
	
	echo"<br>";

	$lrlt = $_POST["cssl"];
	echo"<font size =4>  Left / Right  L/T  : $lrlt </font>";
	
	echo"<br>";

	$lrrb = $_POST["cssl1"];
	echo"<font size =4>  Left / Right R/B  : $lrrb </font>";
	
	echo"<br>";

	$tblt = $_POST["csll"];
	echo"<font size =4> Top / Bottom    : $tblt </font>";
	
	echo"<br>";

	$tbrb = $_POST["csll1"];
	echo"<font size =4> Top / Bottom    : $tbrb </font>";
	
	echo"<br>";

	$dss = $_POST["dss"];
	echo"<font size =4>  Short Span Dia: $dss </font>";
	
	echo"<br>";

	$sss = $_POST["sss"];
	echo"<font size =4>  Short Span speacing  : $sss </font>";
	
	echo"<br>";

	$dls = $_POST["dls"];
	echo"<font size =4> Long Span Dia   : $dls </font>";
	
	echo"<br>";

	$sls = $_POST["sls"];
	echo"<font size =4> Long Span speacing   : $sls </font>";
	
	echo"<br>";
//calculation part

	if ($slabt == "one way"){
	
	//number of bars along short span 

	$nsb = ($slabll / $sss) ;
	
	
	
	$a = round($nsb / 2) ;

	echo "number of bars along short span $a";
	//top extra 
	
	
	
	//number of top extra bar
	
	$ntex = $a ;

	echo "number of top extra bar = $ntex ";
		
	//no of bars along other span

	$nos = round(($slabsl / $sls) );

	echo "number of bars along other span = $nos";
	
	//length of bar
	
	
	//main bar towards continuous slab
		
		
	$lmbtcs = $slabsl + 0.25 * $lrrb + 0.21 ;

	echo "Main bar towards continuous slab = $lmbtcs";

	
	//main bar towards discontinuous slab
	
	$lmbtds = $slabsl + 0.21 ;

	echo "main bar towards discontinuous slab = $lmbtds";

	//top extra at discontinuous slab 

	$teds = ( $slabsl * 0.25 ) + 0.26 ;

	echo "Top extra at discontinuous slab = $teds ";

	//main span top support bar
	
	$mstsb = $slabll + 0.21 ;
	
	echo "main span top support = $mstsb";
	// no of main span top support bar 
	
	$nmstb = round( ($slabsl * 0.25 ) / ( $sss * 2 ) );
	
	
	//other span straight bar 
	
	//other span bottom straight 
	
	$osbs = $slabll + 0.21;
	
	echo "other span bottom straight = $osbs";
	
	//input data in database

	//main bar towards continuous slab

	$ans = round( $noofslab * $a * $lmbtcs ,2) ;

	if($dss == 8){
	
	$sql = "INSERT INTO slabsteel VALUES(1,'$slabno' , 'Main bar towards continuous slab' , 8 , '$noofslab x $a' , $lmbtcs , $ans ,NULL , 
						NULL , NULL  )";
	if ($conn->query($sql) === TRUE) {
    	//  echo "New record created successfully";
	} 
	else {
    	echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
	}

	if($dss == 10){
	
	$sql = "INSERT INTO slabsteel VALUES(1 ,'$slabno' , 'Main bar towards continuous slab' , 10 , '$noofslab x $a' , $lmbtcs , NULL ,$ans , 
							NULL , NULL  )";
	if ($conn->query($sql) === TRUE) {
    	//  echo "New record created successfully";
	} 
	else {
    	echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
	}

	if($dss == 12){
	
	$sql = "INSERT INTO slabsteel VALUES(1 ,'$slabno' , 'Main bar towards continuous slab' , 12 , '$noofslab x $a' , $lmbtcs , NULL , NULL , 
							$ans , NULL )";
	if ($conn->query($sql) === TRUE) {
    	//  echo "New record created successfully";
	} 
	else {
    	echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
	}

	if($dss == 16){
	
	$sql = "INSERT INTO slabsteel VALUES(1 ,'$slabno' , 'Main bar towards continuous slab' , 16 , ''$noofslab x $a' ' , $lmbtcs , NULL , 
							NULL , NULL , $ans)";
	if ($conn->query($sql) === TRUE) {
    	//  echo "New record created successfully";
	} 
	else {
    	echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
	}

	//main bar rowards discontinuous slab 
		
	$mb = $a -1 ;
	
	$ans1 =round( $noofslab * $mb * $lmbtds ,2);
	
	if($dss == 8){
	
	$sql = "INSERT INTO slabsteel VALUES(1,'$slabno' , 'Main bar towards discontinuous slab' , 8 , '$noofslab x $mb' , $lmbtds , $ans1 ,NULL , 
						NULL , NULL  )";
	if ($conn->query($sql) === TRUE) {
    	//  echo "New record created successfully";
	} 
	else {
    	echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
	}

	if($dss == 10){
	
	$sql = "INSERT INTO slabsteel VALUES(1 ,'$slabno' , 'Main bar towards discontinuous slab' , 10 , '$noofslab x $mb' , $lmbtds , NULL 
							,$ans1 , NULL , NULL  )";
	if ($conn->query($sql) === TRUE) {
    	//  echo "New record created successfully";
	} 
	else {
    	echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
	}

	if($dss == 12){
	
	$sql = "INSERT INTO slabsteel VALUES(1 ,'$slabno' , 'Main bar towards discontinuous slab' , 12 , '$noofslab x $mb' , $lmbtds, NULL, NULL , 
							$ans1 , NULL )";
	if ($conn->query($sql) === TRUE) {
    	//  echo "New record created successfully";
	} 
	else {
    	echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
	}

	if($dss == 16){
	
	$sql = "INSERT INTO slabsteel VALUES(1 ,'$slabno' , 'Main bar towards discontinuous slab' , 16 , '$noofslab x $mb' , $lmbtds , NULL , 
							NULL , NULL , $ans1)";
	if ($conn->query($sql) === TRUE) {
    	//  echo "New record created successfully";
	} 
	else {
    	echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
	}
		
	//top extra at discontinuous slab 

	$ans2 = round($noofslab * $a * $teds , 2) ;

	if($dss == 8){
	
	$sql = "INSERT INTO slabsteel VALUES(1,'$slabno' , 'Top extra at discontinuous edge' , 8 , '$noofslab x $a' , $teds , $ans2 ,NULL , 
						NULL , NULL  )";
	if ($conn->query($sql) === TRUE) {
    	//  echo "New record created successfully";
	} 
	else {
    	echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
	}

	if($dss == 10){
	
	$sql = "INSERT INTO slabsteel VALUES(1 ,'$slabno' , 'Top extra at discontinuous edge' , 10 , '$noofslab x $a' , $teds , NULL 
							,$ans2 , NULL , NULL  )";
	if ($conn->query($sql) === TRUE) {
    	//  echo "New record created successfully";
	} 
	else {
    	echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
	}

	if($dss == 12){
	
	$sql = "INSERT INTO slabsteel VALUES(1 ,'$slabno' , 'Top extra at discontinuous edge' , 12 , '$noofslab x $a' , $teds, NULL, NULL , 
							$ans2 , NULL )";
	if ($conn->query($sql) === TRUE) {
    	//  echo "New record created successfully";
	} 
	else {
    	echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
	}

	if($dss == 16){
	
	$sql = "INSERT INTO slabsteel VALUES(1 ,'$slabno' , 'Top extra at discontinuous edge' , 16 , '$noofslab x $a' , $teds , NULL , 
							NULL , NULL , $ans2)";
	if ($conn->query($sql) === TRUE) {
    	// echo "New record created successfully";
	} 
	else {
    	echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
	}

	//main span top support bars

	$ans3 = round($noofslab * $nmstb * $mstsb * 2, 2) ;

	if($dss == 8){
	
	$sql = "INSERT INTO slabsteel VALUES(1,'$slabno' , 'Main span top support bars' , 8 , '$noofslab x 2 x $nmstb ' ,$mstsb , $ans3 ,NULL , 
						NULL , NULL  )";
	if ($conn->query($sql) === TRUE) {
    	//  echo "New record created successfully";
	} 
	else {
    	echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
	}

	if($dss == 10){
	
	$sql = "INSERT INTO slabsteel VALUES(1 ,'$slabno' , 'Main span top support bars' , 10 , '$noofslab x 2 x $nmstb' , $mstsb , NULL 
							,$ans3 , NULL , NULL  )";
	if ($conn->query($sql) === TRUE) {
    	//  echo "New record created successfully";
	} 
	else {
    	echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
	}

	if($dss == 12){
	
	$sql = "INSERT INTO slabsteel VALUES(1 ,'$slabno' , 'Main span top support bars' , 12 , '$noofslab x 2 x $nmstb' , $mstsb, NULL, NULL , 
							$ans3 , NULL )";
	if ($conn->query($sql) === TRUE) {
    	//  echo "New record created successfully";
	} 
	else {
    	echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
	}

	if($dss == 16){
	
	$sql = "INSERT INTO slabsteel VALUES(1 ,'$slabno' , 'Main span top support bars' , 16 , '$noofslab x 2 x $nmstb' , $mstsb , NULL , 
							NULL , NULL , $ans3)";
	if ($conn->query($sql) === TRUE) {
    	// echo "New record created successfully";
	} 
	else {
    	echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
	}

	//other span 
 
	$ans4 = round($noofslab * $nos  * $osbs , 2) ;

	if($dss == 8){
	
	$sql = "INSERT INTO slabsteel VALUES(1,'$slabno' , 'Other span bottom bars' , 8 , '$noofslab x $nos ' ,$osbs , $ans4 ,NULL , 
						NULL , NULL  )";
	if ($conn->query($sql) === TRUE) {
    	//  echo "New record created successfully";
	} 
	else {
    	echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
	}

	if($dss == 10){
	
	$sql = "INSERT INTO slabsteel VALUES(1 ,'$slabno' , 'Other span bottom bars' , 10 , '$noofslab x $nos' , $osbs , NULL 
							,$ans4 , NULL , NULL  )";
	if ($conn->query($sql) === TRUE) {
    	//  echo "New record created successfully";
	} 
	else {
    	echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
	}

	if($dss == 12){
	
	$sql = "INSERT INTO slabsteel VALUES(1 ,'$slabno' , 'Other span bottom bars' , 12 , '$noofslab x $nos' , $osbs, NULL, NULL , 
							$ans4 , NULL )";
	if ($conn->query($sql) === TRUE) {
    	//  echo "New record created successfully";
	} 
	else {
    	echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
	}

	if($dss == 16){
	
	$sql = "INSERT INTO slabsteel VALUES(1 ,'$slabno' , 'Other span bottom bars' , 16 , '$noofslab x $nos' , $osbs , NULL , 
							NULL , NULL , $ans4)";
	if ($conn->query($sql) === TRUE) {
    	// echo "New record created successfully";
	} 
	else {
    	echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
	}

}

?>

<html>
<head><title></title></head>
<body>
<a href = "sf.php"> <input type = button value = "Next"name=submit style="font-size:25;color:white;background-color:#FF0000;border:1"> </a>
