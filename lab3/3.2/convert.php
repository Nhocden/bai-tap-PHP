<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Radians and Degrees</title>
</head>
<body>
	<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="GET">
		<?php
			if(isset($_GET["choice"])){$choice=$_GET["choice"];}
			if (isset($_GET["number"])) {
				if(is_numeric($_GET["number"]))
					$number=$_GET["number"];
			}
		?>
		<input type="radio" name="choice" value="0" <?php if(isset($_GET["choice"])){if($_GET["choice"] == 0){echo "checked";}}?> />
		<label>Radians to Degrees</label>
		<input type="radio" name="choice" value="1" <?php if(isset($_GET["choice"])){if($_GET["choice"] == 1){echo "checked";}}?> />
		<label>Degrees to Radians</label>
		<br>
		<input type="text" name="number" value="<?php if(isset($number)){echo $number;}?>" required/>
		<input type="submit" value="Submit">
		<input type="submit" value="Reset" name="reset">
		<?php
			function toDeg($rad)
			{
				$_deg=$rad*180/M_PI;
				return $_deg;
			}
			function toRad($deg){
				$_rad=$deg*M_PI/180;
				return $_rad;
			}
			if(isset($_GET["choice"]) && is_numeric($_GET["number"])){
				echo "<br><hr><b>Result</b><br>";
				switch ($choice) {
					case 0:
						$temp=toDeg($number);
						echo "<br>$number <i>rad</i> ≈ " .number_format($temp,4)."°";
						echo "<br><mark>Formula</mark>: $number <i>rad</i> × 180/π ≈ " .number_format($temp,4)."°";						
						break;
					case 1:
						$temp=toRad($number);
						echo "<br>$number<i>°</i> ≈ " .number_format($temp,4). " <i>rad</i>";
						echo "<br><mark>Formula</mark>: $number<i>°</i> × π/180 ≈ " .number_format($temp,4)." <i>rad</i>";
						break;
					default:
						break;
				}
			}
			if(isset($_GET['reset'])){
				unset($_GET["number"]);
				header("Location: $_SERVER[PHP_SELF]");
				}
		?>
	</form>
</body>
</html>