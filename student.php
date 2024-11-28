<?php
$rn = $_GET['rollno'];  // Get roll number from the form
$db = pg_connect("host=localhost port=5433 dbname=postgres user=postgres password=devagiri");

// Fetch student data by roll number
$rs = pg_query($db, "SELECT * FROM students WHERE rollno = '$rn'");

echo "<h1 align='center'>Mark Sheet</h1>";
if ($row = pg_fetch_assoc($rs)) {
    // Display student details
    echo "<table border='2' align='center' width='30%'>
            <tr><td>Roll Number</td><td>{$row['rollno']}</td></tr>
            <tr><td>Student Name</td><td>{$row['name']}</td></tr>
            <tr><td>Mark</td><td>{$row['mark']}</td></tr>
            <tr><td>Grade</td><td>{$row['grade']}</td></tr>
          </table>";
} else {
    echo "<h2 align='center'>No record found for Roll No: $rn</h2>";
}

pg_close($db);  // Close database connection
?>
