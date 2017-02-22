<?php 

$brand 	= $_POST['brand'];
$name 	= $_POST['name'];
$year 	= $_POST['year'];
$type 	= $_POST['type'];
$engine = $_POST['engine'];
$rating = $_POST['rating'];

$id = file_get_contents('id.txt');
$prevRecords = file_get_contents("./records.json");

$new_records = json_decode($prevRecords);

$data = array(
	'id' => $id,
	'brand' => $brand,
	'name' => $name,
	'year' => $year,
	'type' => $type,
	'engine' => $engine,
	'rating' => $rating,
	'status' => '1'
);

$new_records[] = $data;



file_put_contents("./records.json", json_encode($new_records, JSON_PRETTY_PRINT));

file_put_contents("id.txt", $id + 1);

echo "Vehicle successfully saved. <a href='../basilio-abaquita/list.php'>go to list</a>";