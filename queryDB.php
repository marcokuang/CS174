<!DOCTYPE html>

<body>
<h1>Automobile DB Query Result</h1>
<p>
<?php
	$manu = filter_input(INPUT_GET, "Manufacturer");
	$model = filter_input(INPUT_GET, "Model");
	$location = filter_input(INPUT_GET, "Location");

	try{
		// Connect to the database
		$con = new PDO("mysql:host=localhost;dbname=Developers", "Developers", "marco1991");
		$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$query = "SELECT * FROM Automobile";

		print "<table border='1'>\n";

		//fetch the database field names.
		$result = $con->query($query);
		$row = $result->fetch(PDO::FETCH_ASSOC);

		//construct the header row of the HTML table
		print "
		<tr>
		\n";
			foreach ($row as $field => $value) {
				print "
				<th>$field</th>\n";
			}
			print "
			<tr>\n";

			// Constrain the query if we got manufacturer, model and location info
			if ((strlen($manu) > 0) && (strlen($model) >0) && (strlen($location) >0) ) {		
				$query = "SELECT * FROM Automobile WHERE Manufacturer = '$manu' AND Model = '$model' AND Location = '$location'";
			}

			//Fetch the matching database table rows
			$data = $con->query($query);
			$data -> setFetchMode(PDO::FETCH_ASSOC);

			// constructed the HTML table row by row
			foreach ($data as $row) {
				print "<tr>
				\n";
				foreach ($row as $name => $value) {
					print"
					<td>$value</td>\n";
				}
				print "
				</tr>\n";
			}
			print"</table>\n";
		}
		catch(PDOException $ex){
			echo 'ERROR:'.$ex->getMessage();
		
		}
	?>
</p>
</body>
</html>