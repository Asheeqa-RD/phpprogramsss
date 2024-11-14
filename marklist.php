<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marksheet</title>
</head>
<body>
    <h1>Marksheet</h1>
    <form method="POST" action="">
        <label for="txtreg">Regno:</label>
        <input type="text" name="txtreg" id="txtreg" required />
        <input type="submit" value="Get Result" />
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Fetch user input and sanitize it
        $rg = mysqli_real_escape_string($con, $_POST['txtreg']);

        // Establish the connection to the database
        $con = mysqli_connect("localhost", "root", "root", "phpdatabase");

        // Check connection
        if (!$con) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Query to fetch the student record based on rollno
        $qry = "SELECT * FROM student WHERE rollno = '$rg'";

        // Execute the query
        $result = mysqli_query($con, $qry);

        // Check if any results were returned
        if (mysqli_num_rows($result) > 0) {
            // Output each row of results
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<br>\n";
                echo "Roll No: " . htmlspecialchars($row['rollno']) . "<br>";
                echo "Name: " . htmlspecialchars($row['name']) . "<br>";
                echo "Marks: " . htmlspecialchars($row['mark']) . "<br>";
                echo "Grade: " . htmlspecialchars($row['grade']) . "<br>";
            }
        } else {
            echo "No results found for Regno: " . htmlspecialchars($rg);
        }

        // Close the database connection
        mysqli_close($con);
    }
    ?>
</body>
</html>
