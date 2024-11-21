<?php
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the roll_no from the form
    $rollno = $_POST['rollno'];

    // Database connection
    $db = pg_connect("host=localhost port=5433 dbname=postgres user=postgres password=devagiri");

    if (!$db) {
        die("Error in connection: " . pg_last_error());
    }

    // Query to get the student's details based on roll_no
    $query = "SELECT * FROM student WHERE rollno = $1";
    $result = pg_prepare($db, "student_query", $query);

    if (!$result) {
        die("Error in query preparation: " . pg_last_error());
    }

    // Execute the prepared query
    $result = pg_execute($db, "student_query", array($rollno));

    // Check if the student exists
    $count = pg_num_rows($result);
    if ($count == 1) {
        // Fetch student data
        $row = pg_fetch_assoc($result);
        echo "<h1>Student Mark List</h1>";
        echo "<p><strong>Roll No:</strong> " . $row['rollno'] . "</p>";
        echo "<p><strong>Name:</strong> " . $row['name'] . "</p>";
        echo "<p><strong>Marks:</strong> " . $row['marks'] . "</p>";
        echo "<p><strong>Grade:</strong> " . $row['grade'] . "</p>";
    } else {
        echo "<h1>No student found with Roll No: $rollno</h1>";
    }

    // Close the connection
    pg_close($db);
}
?>
