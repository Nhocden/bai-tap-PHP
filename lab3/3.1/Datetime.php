<!DOCTYPE html>
<html>
<head>
	<title>Date and Time Processing</title>
</head>
<body>
	<p>Enter your Name and Time for the appointment</p>
	<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="get" accept-charset="utf-8">
		<table>
			<tbody>
				<tr>
					<td>Your Name</td>
					<td><input type="text" name="UrName"></td><br>
					<td>Day:</td>
					<td><select name="Day">
						<?php
							for ($i=1; $i <=31 ; $i++) { 
							 	print("<option>$i</option>");
							 } 
						?>
					</select></td>
					<td><select name="Month">
						<?php
							for ($i=1; $i <=12 ; $i++) { 
							 	print("<option>$i</option>");
							 } 
						?>
					</select></td>
					<td><select name="Year">
						<?php
							for ($i=1900; $i <=2100 ; $i++) { 
							 	print("<option>$i</option>");
							 } 
						?>
					</select></td>
					<td>Time:</td>
					<td><select name="Hour">
						<?php
							for ($i=0; $i <=23 ; $i++) { 
							 	print("<option>$i</option>");
							 } 
						?>
					</select></td>
					<td><select name="Minute">
						<?php
							for ($i=0; $i <=59 ; $i++) { 
							 	print("<option>$i</option>");
							 } 
						?>
					</select></td>
					<td><select name="Second">
						<?php
							for ($i=0; $i <=59 ; $i++) { 
							 	print("<option>$i</option>");
							 } 
						?>
					</select></td>
					<td><input type="submit" name="submit"></td>
					<td><button type="submit" href="<?php echo $_SERVER['PHP_SELF'] ?>">Reset</button></td>
				</tr>
			</tbody>
			
		</table>
			
	</form>
	<?php 
				if (isset($_GET['submit'])) {
					$name= $_GET['UrName'];
					$day= $_GET['Day'];
					$month= $_GET['Month'];
					$year= $_GET['Year'];
					$hour= $_GET['Hour'];
					$minute= $_GET['Minute'];
					$second= $_GET['Second'];
					echo "Hi $name!<br> ";
					echo "Today is $day/$month/$year<br> ";
					echo "Now is $hour:$minute:$second<br>";
					echo "More information<br>";
					if ($hour >11) {
						$hour = $hour-12;
						echo "In 12 hour, the time and date is $hour:$minute:$second PM , $day/$month/$year<br> ";
					}else echo "In 12 hour, the time and date is $hour:$minute:$second AM , $day/$month/$year<br>";
					if ($month==1||$month==3||$month==5||$month==7||$month==8||$month==10||$month==12) {
						echo "This month have 31 days";
					}elseif ($month==4||$month==6||$month==9||$month==11) {
						echo "This month have 30 days";
					}
					if ($month==2&&$year%100==0) {
						if ($year%400==0) {
							echo "This month have 29 days";
						}else echo "This month have 28 days";
					}elseif ($month==2&&$year%4==0) {
						echo "this month have 29 days";
					}elseif ($month==2) {
						echo "this month have 28 days";
					}
				}
			?>

</body>
</html>