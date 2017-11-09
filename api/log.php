<?php 
/** 
@author heting
*/

require_once 'config.php';

try{

	$pgIndex = $_GET['pgIndex'] ? $_GET['pgIndex'] :1;
	$pgSize = $_GET['pgSize'] ? $_GET['pgSize'] : 15;

	$data = $database->select("attampt_log", [
	'time',
	'src',
	'dst',
	'type',
	'attampt',
	],[
	'ORDER'=>['time'=>'DESC'],
	'LIMIT'=>[($pgIndex-1) * $pgSize + 1, $pgIndex * $pgSize]
	]);

	$count = $database->count("attampt_log");

	echo json_encode([
		'status' => 0,
		'data' => $data,
		'count' => $count
	]);
}catch(Exception $err){
	echo json_encode([
	'status' => -1,
	'msg' => $err
	]);
}


?>