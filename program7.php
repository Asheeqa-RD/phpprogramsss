<?php
// Database connection parameters
$hostname = "localhost"; // Usually 'localhost'
$username = "root"; // Default username
$password = "root"; // Default password, change if necessary
$dbname = "phpdatabase"; // Name of your database


// Establish the database connection
$connection = mysqli_connect($hostname, $username, $password, $dbname);

// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Initialize result variable
$resultText = "";

// Check if the form is submitted
if (isset($_POST['rollno'])) {
    $rollno = mysqli_real_escape_string($connection, $_POST['rollno']); // Escape input for security

    // Setup the query
    $query = "SELECT * FROM student WHERE rollno = '$rollno'";

    // Run the query
    $result = mysqli_query($connection, $query);

    // If the query returned results, loop through each result
    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                $name = $row["name"];
                $marks = $row["marks"];
                $grade = $row["grade"];
                $resultText .= "Roll No: $rollno<br>Name: $name<br>Marks: $marks<br>Grade: $grade<br><br>";
            }
        } else {
            $resultText = "No student found with Roll Number: $rollno";
        }
    } else {
        $resultText = "Query Error: " . mysqli_error($connection);
    }
}

// Close the connection
mysqli_close($connection);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Marks</title>
</head>
<body>
    <h1>Enter Roll Number</h1>
    <form method="post">
        <input type="text" name="rollno" required>
        <input type="submit" value="Get Marks">
    </form>
    <div>
        <?php echo $resultText; ?> <!-- Display results here -->
    </div>
</body>
</html>
