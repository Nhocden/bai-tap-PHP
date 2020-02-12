<html>
<?php	
	if(isset($_POST["sort_type"])){
			$sort_type=$_POST["sort_type"];
		}
	function user_sort($a, $b) {
	// smarts is all-important, so sort it first
		if($b == 'smarts') {
			return 1;
		}
		else if($a == 'smarts') {
			return -1;
		}
		return ($a == $b) ? 0 : (($a < $b) ? -1 : 1);
	}
	$values = array('name' => 'Buzz Lightyear','email_address' => 'buzz@starcommand.gal','age' => 32,'smarts' => 'some');
	$avalues = $values;
	if(isset($_POST["sort_type"])) {
		if($sort_type == 'usort' || $sort_type == 'uksort' || $sort_type == 'uasort') {
			$sort_type($avalues, 'user_sort');
		}else {
			$sort_type($avalues);
		}
	}
?>
<form action="UserSorting.php" method="post">
<p><table style="width:100%">
	<tr>
		<td><input type="radio" name="sort_type" value="sort" <?php if($sort_type == "sort"){print "checked";}?>/>Standard sort<br />
		<input type="radio" name="sort_type" value="rsort" <?php if($sort_type == "rsort"){print "checked";}?>/> Reverse sort<td />
		<td><input type="radio" name="sort_type" value="usort" <?php if($sort_type == "usort"){print "checked";}?>/> User-defined sort<br />
		<input type="radio" name="sort_type" value="ksort" <?php if($sort_type == "ksort"){print "checked";}?>/> Key sort<td />
		<td><input type="radio" name="sort_type" value="krsort" <?php if($sort_type == "krsort"){print "checked";}?>/> Reverse key sort<br />
		<input type="radio" name="sort_type" value="uksort" <?php if($sort_type == "uksort"){print "checked";}?>/> User-defined key sort<td/>
		<td><input type="radio" name="sort_type" value="asort" <?php if($sort_type == "asort"){print "checked";}?>/> Value sort<br />
		<input type="radio" name="sort_type" value="arsort" <?php if($sort_type == "arsort"){print "checked";}?>/> Reverse value sort<br />
		<input type="radio" name="sort_type" value="uasort" <?php if($sort_type == "uasort"){print "checked";}?>/> User-defined value sort<br/>
	</tr>
</p></table>
<p align="center"><input type="submit" value="Sort" name="submitted" /></p>
<table style="table-layout: fixed; width: 100%">
	<td><p>Values <?= $submitted ? "sorted by $sort_type" : "unsorted"; ?>:</p></td>
	<td><ul>
	<?php
		foreach($values as $key=>$value) {
			print "<li><b>$key</b>: $value</li>";
		}
	?>
	<?php
		print "<td>"; 
		if(isset($_POST["sort_type"])) {
			print "<p>Value sorted by $sort_type: </<p></td><td><ul>"; 
			foreach($avalues as $key=>$value) {
				print "<li><b>$key</b>: $value</li>";
			}
			print "</ul></td>";
		}
	?>
	</ul></td>
</table>
</form>
</html>
