<?php
// read files from the server and
// send the content of the file back to
// javascript
// generate a unique id
$id = uniqid();

// get the file content from formula area
$fileContent = $_REQUEST['file'];
$abstraction = $_REQUEST["abstraction"];
$lowerbound = $_REQUEST["lower"];
$upperbound = $_REQUEST["upper"];
$parallel = $_REQUEST["parallel"];
$empiricalanalysis = $_REQUEST["emp"];
$empanalysisruns = $_REQUEST["emp_analysis_executions"];

// the path of generated uniquid.txt
$uniqidTxt = "outputs/".$id.".txt";

// generate a uniqid.txt file on the server
file_put_contents($uniqidTxt, $fileContent);

$output = 0;

$command = escapeshellcmd('./runSatire.sh '.$id.'.txt '.$abstraction.' '.$lowerbound.' '.$upperbound.' '.$parallel.' '.$empiricalanalysis.' '.$empanalysisruns);

$output = shell_exec($command);

unlink($uniqidTxt);
unlink("/home/tanmay/Satire/".$id);
unlink("/home/tanmay/Satire/".$id.".cpp");
unlink("/home/tanmay/Satire/".$id."_error_profile.csv");
$data = array();
array_push($data, 0);
array_push($data, $output);
// check if the file exist
// The JSON standard MIME header.
header('Content-type: application/json');
echo json_encode($data);

?>
