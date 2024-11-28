<?php
// Get inputs from the form
$acno = $_GET['acno'];
$amt = $_GET['amt'];
$trn = $_GET['type'];

// Database connection
$db = pg_connect("host=localhost port=5433 dbname=postgres user=postgres password=devagiri");

if (!$db) {
    die("Error in connection: " . pg_last_error());
}

// Validate inputs
if (empty($acno) || empty($amt) || empty($trn)) {
    echo "<h1 align='center'>All fields are required!</h1>";
    exit;
}

// Ensure amount is treated as a number
$amt = floatval($amt);

// Perform the transaction based on the type
if ($trn == 'd') {
    // Deposit
    $query = "UPDATE bankk SET balance = balance + $amt WHERE accno = '$acno'";
} elseif ($trn == 'w') {
    // Withdrawal
    $query = "UPDATE bankk SET balance = balance - $amt WHERE accno = '$acno'";
} else {
    echo "<h1 align='center'>Invalid transaction type!</h1>";
    exit;
}

// Execute the query
$result = pg_query($db, $query);

// Check if the query was successful
if ($result) {
    echo "<h1 align='center'>Transaction successful!</h1>";
    
    // Fetch and display the updated account details
    $result = pg_query($db, "SELECT * FROM bankk WHERE accno = '$acno'");
    echo "<table border='2' align='center' width='30%'>";
    while ($row = pg_fetch_row($result)) {
        echo "<tr><td>Account Number</td><td>".$row[0]."</td></tr>";
        echo "<tr><td>Customer Name</td><td>".$row[1]."</td></tr>";
        echo "<tr><td>Balance Amount</td><td>".$row[2]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "<h1 align='center'>Error in transaction!</h1>";
}

// Close the connection
pg_close($db);
?>
