<?php
$SCRIPT=basename(getenv("SCRIPT_NAME"));
//$SCRIPT="index.php";
$base_url="crux/ports/mike";
$port = basename(getcwd());

function list_files_as_links($dir, $SCRIPT){
	$directory = dir($dir);
	$files = array();
	$i = "1";
	while ($file = $directory->read()) {		
	if (is_file($file) AND $file != ".")
		$files[] = $file;
	}
	sort($files);
	echo "<table cellspacing=\"0\"> ";
	echo "<tr class=\"header\">
	<td><b>Name</b></td>
	<td><b>Size</b></td>
	<td><b>Date</b></td>
	</tr>";
	foreach($files as $value) {
		if($value != $SCRIPT) {
			$filesize=filesize($value); 
			if($filesize > 1073741823){ $filesize = sprintf("%.1f",($filesize/1073741824))." GB"; }
			elseif($filesize > 1048575) { $filesize = sprintf("%.1f",($filesize/1048576))." MB"; }
			elseif($filesize > 1023){ $filesize = sprintf("%.1f",($filesize/1024))." kB"; }
			else{ $filesize = $filesize." byte"; }
		$oddness= $i % 2 ? "odd" : "even";
		++$i;
		echo "<tr class=\"$oddness\">
		<td><a href=\"$path$value\">$value</a></td>
		<td>$filesize</td>
		<td>".gmdate("d M Y H:i",filemtime($value))."</td>
		</tr>";
		}	 
	}
	echo "</table>";
}

echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.1//EN\"
\"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd\">
<html xmlns=\"http://www.w3.org/1999/xhtml\">
 <head>
 <link rel=\"stylesheet\" href=\"../mike_ports.css\" type=\"text/css\" />
 <title>Index of $base_url/$port</title>
 </head>
<body>
	<h2>$port</h2>
	<h3>Index of $base_url/$port</h3>
	<p>
	<a href=\"..\"><b> Parent Directory</b></a><br/></p>";

	list_files_as_links(getcwd(), $SCRIPT);

	echo "</body></html>";
?>
