<!DOCTYPE html>
<!--
Created by: Joshua Green
Date: 9/20/2016
This lab collects a username and password from the user. It then requires the user to select a query. The selected query is performed on a connected database. 
The results are delivered in the form of an HTML table.
 -->
<html>
<head>
	<title>Lab4</title>
	
	<style>
		table, th, td{border:1px solid black;}
	</style>		
</head>
<body>
	<form method="POST" action="#">	
	<h1>Which query would you like to perform?</h1>
            <select id="queries" name="queries">
		<option value="" selected>Select one</option>
                <option value="records">Show all records in the table</option>
                <option value="startTime">Start Time</option>
                <option value="MATH">Show classes from the MATH department</option>
		<option value="IT">Show classes from the IT department</option>
		<option value="CS">Show classes from the CS department</option>
                <option value="MWF">MWF Classes</option>
                <option value="classLength">Length of All Classes</option>
            </select>
		<br>
		Enter your username:
		<input type="text" name="username">
		<br>
		Enter your password:
		<input type="password" name="pw">
                <br>
		<input type="submit" name="submit" value="Submit">
	</form>
</body>

<?php

if(isset($_POST['submit']))
{
        $serverName = "localhost";
        $username = $_POST['username'];
        $password = $_POST['pw'];
        $database = $_POST['username'];

        $conn = mysqli_connect($serverName, $username, $password, $database);

        if($conn == false)
        {
                echo "Connection failed: ". mysqli_connect_error();
        }
        else
        {
                echo "Connection successful! ";
        }
	$selected_val =$_POST['queries'];
	
	//this is to test and show the selected value from the list
	echo "You chose the query: ";
	echo $selected_val;

	if($selected_val == "records"){
		$sql = "SELECT * FROM classes"; 
	}
	if($selected_val == "startTime"){
                $sql = "SELECT start FROM classes";
        }
	if($selected_val == "IT"){
                $sql = "SELECT * FROM classes WHERE department = 'IT'";
        }
	if($selected_val == "MATH"){
		$sql = "SELECT * FROM classes WHERE department = 'MATH'";
	}
	if($selected_val == "CS"){
		$sql = "SELECT * FROM classes WHERE department = 'CS'";
	}
	if($selected_val == "MWF"){
                $sql = "SELECT name, course_id FROM classes WHERE days = 'MWF'";
        }
	if($selected_val == "classLength"){
                $sql = "SELECT name,TIMEDIFF(end, start) FROM classes;";
        }

	//this function performs the chosen query on the database and stores the result in $result	
	$result = mysqli_query($conn, $sql);

	function printTable( $result ){
		echo "<table>";

		while($row = mysqli_fetch_field($result)){
			echo "<th>".$row->name."</th>";
		}
		
		//for each row
		while($row = mysqli_fetch_array($result, MYSQLI_NUM)){
			//set up table row
			echo "<tr>";
			//for each column in row
			foreach($row as $val){
				//echo table data
				echo "<td>$val</td>";
			}
		}
		echo "</tr>";
		echo "</table>";
	}

	printTable( $result );

	mysqli_close($conn);
}
?>
</html>

