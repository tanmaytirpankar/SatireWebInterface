<?php 
// read files from the server and
// send the content of the file back to
// javascript
$file = "/var/www/html/satire/examples/".$_REQUEST['fileName'];

// check if the file exist
if (file_exists($file))
{
	$data = file_get_contents($file);
	// The JSON standard MIME header.
	header('Content-type: application/json');
	echo json_encode($data);
}

?>
