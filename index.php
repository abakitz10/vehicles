<!DOCTYPE html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<style>
input,select,button {margin: 5px 0; padding: 5px;}
</style>
</head>
<body>

	<div class="content">
		<h1>Register Vehicle</h1>
		<form action='save.php' method="POST">

			<input type="text" name="brand" id="brand" placeholder="brand" required><br>
			<input type="text" name="name" id="name" placeholder="name" required><br>
			<input type="text" name="year" id="year" placeholder="year"><br>
			<select id="type">
				<option value="">Type</option>
				<option value="car">car</option>
				<option value="pick-up">pick-up</option>
				<option value="van">van</option>
				<option value="bus">bus</option>
				<option value="truck">truck</option>
				<option value="suv">suv</option>
			</select><br>
			<select id="engine">
				<option value="">Engine</option>
				<option value="gas">gas</option>
				<option value="diesel">diesel</option>
			</select><br>
			<input type="number" min="1" max="10" name="rating" id="rating" placeholder="rating"><br>
			<button type='submit'>Submit</button>

		</form>
		<div class="errors"></div>
	</div>

	<script>
		jQuery(document).ready(function($) {

			$('button').click(function(e) {
				e.preventDefault();

				var name = $('#name').val(),
					brand = $('#brand').val(),
				    year = $('#year').val(),
				    type = $('#type').val(),
				    engine = $('#engine').val(),
				    rating = $('#rating').val();

				var date = new Date();
				var current_year = date.getFullYear();

				var error = "";

				if (year != "") {		

					if (year < 1900 || year > current_year) {			
						error = '<p>Please add year between 1900 - ' + current_year + "\n" + "</p>";
					}
					
				}

				// if (type == "") {
				// 	error += '<p>Please select type.</p>';
				// }
				// if (engine == "") {
				// 	error += '<p>Please select engine.</p>';
				// }
				// if (rating == "") {
				// 	error += '<p>Please add rating.</p>';
				// }
		

				if (error) {
					$('div.errors').append(error);
				} else {
					$('form').submit();
				}

			});
		});
	</script>

</body>
</html>