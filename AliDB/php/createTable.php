<!doctype html>
<html>

<head>
	<title>Create a Table</title>
	<link rel="stylesheet" href="../css/style.css" />
</head>

<body>

	<?php

	$servername = "localhost";
	$dbname = "student_clubs_management";
	$username = "root";
	$password = "";

	try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		echo "<p style='color:green'>Connection Was Successful</p>";
	} catch (PDOException $err) {
		echo "<p style='color:red'>Connection Failed: " . $err->getMessage() . "</p>\r\n";
	}

	$sql = "CREATE TABLE Student (
		StudentID INT PRIMARY KEY,
		DOB DATE NOT NULL,
		Gender CHAR(8) NOT NULL,
		FName CHAR(25) NOT NULL,
		MName CHAR(25),
		LName CHAR(25)
		);";

	try {
		$conn->exec($sql);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		echo "<p style='color:green'>Table Created Successfully</p>";
	} catch (PDOException $err) {
		echo "<p style='color:red'>Connection Failed: " . $err->getMessage() . "</p>\r\n";
	}

	// Close connection
	unset($conn);

	echo "<a href='../index.html'>Back to the homepage</a>";

	?>

</body>

</html>