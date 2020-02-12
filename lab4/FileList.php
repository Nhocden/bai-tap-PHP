<html>
<head>
	<meta charset="UTF-8">
	<title>FileList</title>
</head>
<body>
	<?php
		function FileSizeConvert($bytes){
			if($bytes==0){
				$result = "0 B";
				return $result;
			}
			$bytes = floatval($bytes);
			$arBytes = array(
				0 => array("UNIT" => "TB","VALUE" => pow(1024, 4)),
				1 => array("UNIT" => "GB","VALUE" => pow(1024, 3)),
				2 => array("UNIT" => "MB","VALUE" => pow(1024, 2)),
				3 => array("UNIT" => "KB","VALUE" => 1024),
				4 => array("UNIT" => "B","VALUE" => 1));
			foreach($arBytes as $arItem){
				if($bytes >= $arItem["VALUE"]){
					$result = $bytes / $arItem["VALUE"];
					$result = str_replace(".", "," , strval(round($result, 2)))." ".$arItem["UNIT"];
					break;
				}
			}
			return $result;
		}
		function orderBy($data, $field){
			$code = "return strnatcmp(\$a['$field'], \$b['$field']);";
			usort($data, create_function('$a,$b', $code));
			return $data;
		}

		$array_fname = array_slice(scandir('./upload'), 2);
		chdir('./upload');
		$i=0;
		//Array files's information
		foreach ($array_fname as $value) {
			$files[$i++] = array('name' => $value, 'type' => finfo_file(finfo_open(FILEINFO_MIME_TYPE), $value), 'date' => date('d/m/Y H:i:s',filectime($value)), 'size' => FileSizeConvert(filesize($value)));
		}
		$sorted_files_date = orderBy($files, 'date');
	?>
	<h2 align="center">File List</h2>
	<table align="center" style="table-layout:fixed; width: 80%">
		<tr>
			<td align="center">Sort by Name</td>
			<td align="center">Sort by Date</td>
		</tr>
		<tr>
			<td>
				<?php
					foreach ($files as $var){
						print "<hr>";
						print "File Name: " .$var['name'];
						print "<br>Type: " .$var['type'];
						print "<br>Date: " .$var['date'];
						print "<br>Size: " .$var['size'];
					}
				?>
			</td>
			<td>
				<?php
					foreach ($sorted_files_date as $var){
						print "<hr>";
						print "File Name: " .$var['name'];
						print "<br>Type: " .$var['type'];
						print "<br>Date: " .$var['date'];
						print "<br>Size: " .$var['size'];
					}
				?>
			</td>
		</tr>
	</table>
</body>
</html>

