<?php
// Get inputs from the form
$acno = $_GET['acno'];
$amt = $_GET['amt'];
$trn = $_GET['type'];

// Database connection
$db = pg_connect("host=localhost port=5433 dbname=postgres user=postgres password=devagiri");

// Perform the transaction
if ($trn == 'd') {
    pg_query($db, "UPDATE bankk SET balance = balance + $amt WHERE accno = '$acno'");
} elseif ($trn == 'w') {
    pg_query($db, "UPDATE bankk SET balance = balance - $amt WHERE accno = '$acno'");
}

// Fetch and display the updated account details
$result = pg_query($db, "SELECT * FROM bankk WHERE accno = '$acno'");
$row = pg_fetch_assoc($result);

echo "<div style='text-align:center;'>";
echo "<h1>Account Updated</h1>";
echo "<table border='1' align='center'>
        <tr><td>Account Number</td><td>{$row['accno']}</td></tr>
        <tr><td>Customer Name</td><td>{$row['cust_name']}</td></tr>
        <tr><td>Balance Amount</td><td>{$row['balance']}</td></tr>
      </table>";
echo "</div>";

// Close the connection
pg_close($db);
?>
