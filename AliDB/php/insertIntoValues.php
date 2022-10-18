<!doctype html>
<html>
<head>
	<title>Insert Data Into a Database</title>
	<link rel="stylesheet" href="../css/style.css" />
</head>
<body>

<?php
$servername ="localhost";
$dbname = "student_clubs_management";
$username = "root";
$password = "";

try {
	$conn = new PDO("mysql:host=$servername;dbname=$dbname",$username, $password );
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	echo "<p style='color:green'>Connection Was Successful</p>";
}
catch (PDOException $err) {
	echo "<p style='color:red'>Connection Failed: " . $err->getMessage() . "</p>\r\n";
}


try {
	$sql="INSERT INTO Student (StudentID, DOB, Gender, FName, MName, LName) VALUES (:StudentID, :DOB, :Gender, :FName, :MName, :LName);";   // all the names variable names must start with colon (:)
	$stmnt = $conn->prepare($sql);    // read about prepared statement here: https://www.w3schools.com/php/php_mysql_prepared_statements.asp
	$stmnt->bindParam(':StudentID', $_POST['StudentID']);   // stdId in $_POST['stdId'] in the exact name of the input element in HTML. if any typo, your code does not work   
	$stmnt->bindParam(':DOB', $_POST['DOB']);   // note the single quotes, If you foregt to put single quotes, your code does not work.
	$stmnt->bindParam(':Gender', $_POST['Gender']);
	$stmnt->bindParam(':FName', $_POST['FName']);
	$stmnt->bindParam(':MName', $_POST['MName']);
	$stmnt->bindParam(':LName', $_POST['LName']);

	$stmnt->execute();

	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	echo "<p style='color:green'>Data Inserted Into Table Successfully</p>";
}
catch (PDOException $err ) {
	echo "<p style='color:red'>Data Insertion Failed: " . $err->getMessage() . "</p>\r\n";
}
// Close connection
unset($conn);

echo "<a href='../insertData.html'>Insert More Values</a> <br />";

echo "<a href='../index.html'>Back to the homepage</a>";

?>

</body>
</html>