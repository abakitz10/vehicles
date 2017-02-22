<?php

$records = file_get_contents("./records.json");

$records = json_decode($records, TRUE);


$id = $_POST['id'];

$result = [];

foreach ($records as $vehicle) {
	
	if ($vehicle['id'] == $id) {
		$result['brand'] = $vehicle['brand'];
		$result['name'] = $vehicle['name'];
		$result['year'] = $vehicle['year'];
		$result['type'] = $vehicle['type'];
		$result['engine'] = $vehicle['engine'];
		$result['rating'] = $vehicle['rating'];
	}
}

echo json_encode($result);

