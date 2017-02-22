<?php

$id = $_POST['id'];
$brand = $_POST['brand'];
$name = $_POST['name'];
$year = $_POST['year'];
$type = $_POST['type'];
$engine = $_POST['engine'];
$rating = $_POST['rating'];

include('get_records.php');

foreach($records as $key => $vehicle) {

	$v_id = $vehicle['id'];

	if ($v_id == $id) {

		$records[$key]['brand'] = $brand;
		$records[$key]['name'] = $name;
		$records[$key]['year'] = $year;
		$records[$key]['type'] = $type;
		$records[$key]['engine'] = $engine;
		$records[$key]['rating'] = $rating;

		
		file_put_contents("./records.json", json_encode($records, JSON_PRETTY_PRINT));

	}

}

echo "Successfully updated!";