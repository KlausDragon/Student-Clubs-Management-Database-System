<!doctype html>
<html>

<head>
    <title>Delete a record of a table</title>
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
        echo "<p style='color:red'> Connection Failed: " . $err . getMessage() . "</p>\r\n";
    }

    try {
        $sql = "DELETE FROM " . $dbname . ".Student WHERE DOB = :DOB";
        $stmnt = $conn->prepare($sql);     // read about prepared statement here: https://www.w3schools.com/php/php_mysql_prepared_statements.asp
        $stmnt->bindParam(':DOB', $_POST['DOB']);   // :stdId is the variable that we used in $sql, there must be a colon (:) in front of it.
        //  stdId in $_POST['stdId'] is the name of the element in HTML Form. Make sure it matches exactly the name of the form element in HTML 

        $stmnt->execute();
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "<p style='color:green'>Record Deleted Successfully</p>";
    } catch (PDOException $err) {
        echo "<p style='color:red'>Record Delete Failed: " . $err->getMessage() . "</p>\r\n";
    }
    // Close connection
    unset($conn);

    echo "<a href='../index.html'>Back to the homepage</a>";

    ?>

</body>

</html>