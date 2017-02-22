<!DOCTYPE html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>
<body>


<?php 


$records = file_get_contents("./records.json");

$records = json_decode($records, TRUE);


echo "<h1> Vehicle List: </h1>";
echo "<a href='update.php'>Update vehicles</a>";
echo "<br>";
echo "<br>";
echo "<table>";

echo "<tr>";
	echo "<th>Id</th>";
	echo "<th>Brand</th>";
	echo "<th>Name</th>";
	echo "<th>Year</th>";
	echo "<th>Type</th>";
	echo "<th>Engine</th>";
	echo "<th>Rating</th>";
	echo "<th></th>";
echo "</tr>";

foreach($records as $vehicle) {

	$id = $vehicle['id'];
	
	if ($vehicle['status'] != 0) {
		echo "<tr>";
			echo "<td>" . $id. "</td>";
			echo "<td>" . $vehicle['brand'] . "</td>";
			echo "<td>" . $vehicle['name'] . "</td>";
			echo "<td>" . $vehicle['year'] . "</td>";
			echo "<td>" . $vehicle['type'] . "</td>";
			echo "<td>" . $vehicle['engine'] . "</td>";
			echo "<td>" . $vehicle['rating'] . "</td>";
			echo "<td>" . '<button data-id="'.$id .'" >delete</button> ' . "</td>";
		echo "</tr>";
	}
}

echo "</table>";
?>

<script>

jQuery(document).ready(function() {

	$('button').click(function() {
		var id = $(this).data('id');

		var con = confirm("Are you sure to delete?");

		if (con) {
			$.ajax({
				url : 'delete.php',
				data: {id : id},
				type: 'post',
				success: function(data) {
					alert(data);
					// location.reload();
				}
			});
		}

	});

});

</script>
</body>
</html>