<!doctype html>
<html>

<head>
    <title>Display Records of a table</title>
    <link rel="stylesheet" href="../css/style.css" />
</head>

<body>

    <?php
    $servername = "localhost";
    $dbname = "Student_Clubs_Management";
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
        $sql = "SELECT  StudentID,DOB,Gender,FName,MName,LName FROM Student WHERE DOB = '" . $_POST['DOB'] . "'";

        $stmnt = $conn->prepare($sql);

        $stmnt->execute();
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $row = $stmnt->fetch();
        if ($row) {
            echo '<table>';
            echo '<tr> <th>StudentID</th> <th>Date Of Birth</th> <th>Gender</th> <th>First Name</th> <th>Middle Name</th> <th>Last Name</th> </tr>';
            do {
                echo '<tr><td>' . $row['StudentID'] . '</td><td>' . $row['DOB'] . '</td><td>' . $row['Gender'] . '</td><td>' . $row['FName'] . '</td><td>' . $row['MName'] . '</td><td>' . $row['LName'] . '</td></tr>';
            } while ($row = $stmnt->fetch());     // fetches another row from the query result, until we reach to the end of the result
            echo '</table>';
        } else {
            echo "<p> No Record Found!</p>";
        }
    } catch (PDOException $err) {
        echo "<p style='color:red'>Record Delete Failed: " . $err->getMessage() . "</p>\r\n";
    }
    // Close connection
    unset($conn);

    echo "<a href='../index.html'>Back to the homepage</a>";

    ?>
</body>

</html>