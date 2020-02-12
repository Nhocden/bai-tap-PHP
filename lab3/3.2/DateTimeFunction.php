<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Date time Function</title>
</head>
<body>
	<?php 
		if(isset($_GET['reset'])){
		unset($_GET["name1"]);
		unset($_GET["bday1String"]);
		unset($_GET["name2"]);
		unset($_GET["bday2String"]);
		header("Location: $_SERVER[PHP_SELF]");} 
	?>

	<?php
		function checkBirth($day, $month, $year){
			if(!checkdate($month, $day, $year)){
				echo "<br>The date $day/$month/$year isn't exist!";
				return 0;
			}	

			$today = date("Y-m-d");
			$t_date = mktime(0, 0, 0, $month, $day, $year);
			$tdate = date("Y-m-d", $t_date);

			if(strtotime($tdate) > strtotime($today)) {
				echo "<br>The date $day/$month/$year is later than today.";
				return 0;
			}
			return 1;
		}

		function dayOfDate($day, $month, $year){
			$year=1900+($year % 1900);

			if ($month < 3) {
				$month = $month+12;
				$year = $year-1;
			}

			$t_day=($day + 2*$month + intdiv((3*($month+1)),5) + $year + intdiv($year,4)) % 7;
			switch ($t_day) {
				case 0: $strDay = "Sunday";	return $strDay;
				case 1: $strDay = "Monday"; return $strDay;
				case 2: $strDay = "Tuesday"; return $strDay;
				case 3: $strDay = "Wednesday"; return $strDay;
				case 4: $strDay = "Thursday"; return $strDay;
				case 5: $strDay = "Friday"; return $strDay;
				case 6: $strDay = "Saturday"; return $strDay;
				default: break;
			}
		}

		function letter($month){
			switch ($month) {
				case 1: $t_month = "January"; break;
				case 2: $t_month = "February"; break;
				case 3: $t_month = "March"; break;
				case 4: $t_month = "April"; break;
				case 5: $t_month = "May"; break;
				case 6: $t_month = "June"; break;
				case 7: $t_month = "July"; break;
				case 8: $t_month = "August"; break;
				case 9: $t_month = "September"; break;
				case 10: $t_month = "October"; break;
				case 11: $t_month = "November"; break;
				case 12: $t_month = "December"; break;
				default: break;
			}
			return $t_month;
		}

		function DifferentDate($d1,$m1,$y1,$d2,$m2,$y2){
		    $m1 = ($m1 + 9) % 12;
		    $y1 = $y1 - intdiv($m1, 10);
		    $x1= 365*$y1 + intdiv($y1,4) - intdiv($y1,100) + intdiv($y1,400) + intdiv(($m1*306 + 5),10) + ( $d1 - 1 );
		    $m2 = ($m2 + 9) % 12;
		    $y2 = $y2 - intdiv($m2, 10);
		    $x2= 365*$y2 + intdiv($y2,4) - intdiv($y2,100) + intdiv($y2,400) + intdiv(($m2*306 + 5),10) + ( $d2 - 1 );
		    return abs($x2 - $x1);
	    }
	    function howold($d1,$m1,$y1){
	    	$d2=date("d");
	    	$m2=date("m");
	    	$y2=date("Y");
	    	$_day=DifferentDate($d1,$m1,$y1,$d2,$m2,$y2);
	    	$_year= intdiv($_day,365);
	    	return $_year;
	    }

	?>

	<h2><center>Date Time Function</center></h2><hr>
	<center>
		<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="GET">
		<?php 
			if(isset($_GET["name1"])){
				$name1= $_GET["name1"];} 
			if(isset($_GET["name2"])){
				$name2= $_GET["name2"];}
			if(isset($_GET["bday1String"])){
				$bday1String= $_GET["bday1String"];}
			if(isset($_GET["bday2String"])){
				$bday2String= $_GET["bday2String"];}
		?>
		<table>
			<tr>
				<td>User 1: </td>
				<td><input type="text" name="name1" placeholder="Enter name:" value="<?php echo $name1;?>" required/></td>
				<td><input type="text" name="bday1String" placeholder="dd/mm/yyyy" pattern="(0[1-9]|1[0-9]|2[0-9]|3[01])/(0[1-9]|1[012])/[0-9]{4}" title="Must be dd/mm/yyyy look like this: 29/05/1998" value="<?php echo $bday1String;?>" required/></td>
			</tr>
			<tr>
				<td>User 2: </td>
				<td><input type="text" name="name2" placeholder="Enter name:" value="<?php echo $name2;?>" required/></td>
				<td><input type="text" name="bday2String" placeholder="dd/mm/yyyy" pattern="(0[1-9]|1[0-9]|2[0-9]|3[01])/(0[1-9]|1[012])/[0-9]{4}" title="Must be dd/mm/yyyy look like this: 29/05/1998" value="<?php echo $bday2String;?>" required/></td>
			</tr>
		</table>
		<br>
		<input type="submit" value="Submit" style="background-color: red; color: white">
		<input type="submit" value="Reset" name="reset" style="background-color: blue; color: white">
		<?php	
			if(isset($_GET["bday1String"]) && isset($_GET["bday1String"])){
				$day1=(int)strtok($bday1String,"/");
				$month1=(int)strtok("/");
				$year1=(int)strtok("/");
				$day2=(int)strtok($bday2String,"/");
				$month2=(int)strtok("/");
				$year2=(int)strtok("/");

				if(checkbirth($day1,$month1,$year1) && checkbirth($day2,$month2,$year2)){
					echo "<hr><br><b>More information</b><br>";
					echo "<br> $name1's date of birth: " .dayofdate($day1,$month1,$year1). ", " .letter($month1). " $day1, $year1";
					echo "<br> $name2's date of birth: " .dayofdate($day2,$month2,$year2). ", " .letter($month2). " $day2, $year2";
					echo "<br> The different days between two date: " .DifferentDate($day1,$month1,$year1,$day2,$month2,$year2). " days (not including the end date)";
					$h = intdiv(DifferentDate($day1,$month1,$year1,$day2,$month2,$year2),365);
					echo "<br> $name1 is " .howold($day1,$month1,$year1). " years old";
					echo "<br> $name2 is " .howold($day2,$month2,$year2). " years old";
					echo "<br> The different years: $h";
				}

			}
		?>

	</form>
	</center>

</body>
</html>