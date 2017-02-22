<?php

$id = $_POST['id'];


$records = file_get_contents("./records.json");

$records = json_decode($records, TRUE);

foreach($records as $key => $vehicle) {

	$v_id = $vehicle['id'];

	if ($v_id == $id) {

		$records[$key]['status'] = "0";

		
		file_put_contents("./records.json", json_encode($records, JSON_PRETTY_PRINT));


		// $new_records[] = $data;


		echo "Successfully deleted!";
	}

}
