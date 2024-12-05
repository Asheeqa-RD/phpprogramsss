<?php
// Get user input
$name = $_POST['uname'];
$password = $_POST['pswd'];

// Connect to the PostgreSQL database
$db = pg_connect("host=localhost port=5433 dbname=postgres user=postgres password=devagiri");

if (!$db) {
    die("Database connection failed: " . pg_last_error());
}

// Prepare a secure query to avoid SQL injection
$query = "SELECT * FROM logintble WHERE username = $1 AND password = $2";
$result = pg_prepare($db, "login_query", $query);

// Execute the query with parameters
$rs = pg_execute($db, "login_query", array($name, $password));

// Check if the query returns exactly one row
$count = pg_num_rows($rs);

echo "<div style='text-align:center;'>"; // Center the content

if ($count == 1) {
    echo "<h1>Welcome, $name. You have logged in successfully.</h1>";
} else {
    echo "<h1>Incorrect username or password</h1>";
}

echo "</div>"; // Close the div

// Close the database connection
pg_close($db);
?>
