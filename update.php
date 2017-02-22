<!DOCTYPE html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>
<body>
 
	<div class="content">
		<h1>Update Vehicle</h1>

		<select>
			<option>SElECT VEHICLE</option>
			<?php 
			
			include('get_records.php');

			foreach ($records as $vehicle) {
				if ($vehicle['status'] != 0) {
					echo '<option value='. $vehicle['id'] .' >' . $vehicle['brand'] . ' ' . $vehicle['name']. '</option>';
				}
			}

			?>

		</select>
		<br>
		<br>
		<form action='#' method="POST">
			<input type="text" id="brand" placeholder="brand"><br>
			<input type="text" id="name" placeholder="name"><br>
			<input type="text" id="year" placeholder="year"><br>
			<input type="text" id="type" placeholder="type"><br>
			<input type="text" id="engine" placeholder="engine"><br>
			<input type="text" id="rating" placeholder="rating"><br>
			<br>
			<button type='submit' id="update">Update Records</button>

		</form>
	</div>

	<script>

	jQuery(document).ready(function($) {

		var id = "";

		$('select').on('change', function() {
			
			id = $(this).val();
			
			$.ajax({
				url : 'select.php',
				data : {id: id},
				type: 'post',
				dataType: 'json',
				success: function(data) {
					$('#brand').val(data.brand);
					$('#name').val(data.name);
					$('#year').val(data.year);
					$('#type').val(data.type);
					$('#engine').val(data.engine);
					$('#rating').val(data.rating);
				}
			});

		});

		$('#update').click(function(e) {

			e.preventDefault();
			
			$.ajax({
				url : 'do_update.php',
				data : {
					id: id,
					brand : $('#brand').val(),
					name : $('#name').val(),
					year : $('#year').val(),
					type : $('#type').val(),
					engine : $('#engine').val(),
					rating : $('#rating').val()
				},
				type: 'post',
				success: function(data) {
					alert(data);
				}
			});
		});

	});
	</script>

</body>
</html>