	<!DOCTYPE HTML>

	<html>
	<head>
	<link rel="stylesheet" href="mainstyle7.css" type="text/css" />
	<title> ..:: Student database ::.. </title>
	<link rel="shortcut icon" href="./images/NULogoRound.png" type="NULogoRound.png">
	</head>

	<body>

	<header>
	<h1>
	<img class="movie" src="./images/nu.png" />
	 FAST Students database </h1>

	</header>
<p style="top:70px; left:920px; position:absolute;">Welcome to i12-0394 </p><!-- dynamic -->

	<p style="top:90px;left:240px; position:absolute;">Semester: Semester 2014</p> <!-- dynamic -->
	<p style="top:90px;left:900px; position:absolute;">15/01/2014 to 15/05/2014 </p><!-- dynamic -->
	

	<main style="overflow:scroll">
	<ul class="courses" style="left:40px; top:10px;position:relative;"> 
		<?php
		session_start();
$c_id=$_SESSION['C_ID'];
$sec=$_SESSION['sec'];
$name = $_POST["name"];
$_SESSION['name']=$name;
$no = $_POST["no"];
$_SESSION['no']=$no;
$marks = $_POST["marks"];
$weightage = $_POST["weightage"];
echo"$name $no <br>Total Marks: $marks <br>Weightage: $weightage<br><br>";
$conn = oci_connect("system","123","localhost/xe");
 $sql2 = oci_parse($conn,"INSERT INTO assesment VALUES
        ('$name',  $no, $marks,  $weightage,  '$sec',$c_id)");
oci_execute($sql2);
oci_commit($conn);
		$sql2 = oci_parse($conn,"select roll_no from stakec where c_id='$c_id' and sec='$sec'");
		oci_execute($sql2);
		echo "<form action='add_mrks.php' method='post'>";
		echo "<table border=1 >";
			echo "<tr><th>Roll No</th><th>Name</th><th>Marks</th></tr>";
		while($row=oci_fetch_array($sql2))
		{
		echo "<tr>";
			$sql = oci_parse($conn,"select * from student where roll_no='$row[0]'");
			oci_execute($sql);	
			$row2=oci_fetch_array($sql);
			echo "<tr><th>$row2[0]</th><th> $row2[1] $row2[2]</th><th> <input type='text' name='MyArray[]' ></th></tr>";
			echo "</tr>";
		}
		echo "</table>";
		echo "<br>";
		
		
		
		?>
	</ul>

	</main>
	<input type="submit" value="Save" style="left:500px;top:560px; position:absolute;">
	</form>
	<footer>
	<p style="text-align:center;font-family:Courier New;color:#707070;font-size:15px;"> Copyrights &copy; 2013-2014,NUCES. All Rights Reserved  </p>
	</footer>


	</body>



	</html>