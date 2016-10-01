<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>CS 3380 Lab2</title>
	</head>
	<body>
		<form action="lab2.php" method="POST">
		Name: 
		<br />
			<input type="text" name="name">
		<br />
		<br />
		Major:
		<br />
			<input type="radio" name="major" value="CS">Computer Science<br>
			<input type="radio" name="major" value="Other">Other<br>
		<br />
		Year:
			<select name="year">
				<option value="Freshman">Freshman</option>
				<option value="Sophomore">Sophomore</option>
				<option value="Junior">Junior</option>
				<option value="Senior">Senior</option>
			</select>
		<br />
		<br />
		<input type="submit" name="submit" value="Submit">
		</form>
		Name:<?php echo $_POST["name"]; ?><br>
		Major:<?php echo $_POST["major"]; ?><br>
		Year: <?php echo $_POST["year"]; ?><br>

	</body>
</html>

