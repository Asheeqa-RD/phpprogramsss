<!DOCTYPE html>
<html>
<head>
    <title>Marksheet</title>
</head>
<body>
    <h1>Marksheet</h1>
    <form method="POST" action="">
        Regno: <input type="text" name="txtreg" required />
        <input type="submit" value="Get Result">
    </form>

    <?php
    // Check if form is submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $rg = $_POST['txtreg'];

        // Connect to the database
        $con = mysqli_connect("localhost", "user", "password", "database");
        
        // Check connection
        if (!$con) {
            die("Connection failed: " . mysqli_connect_error());
        } else {
            echo "Successfully Connected.<br>";
        }

        // Escape user input to prevent SQL injection
        $rg = mysqli_real_escape_string($con, $rg);

        // Prepare the query
        $qry = "SELECT * FROM result WHERE regno = '$rg'"; // Use single quotes around $rg

        // Execute the query
        $result = mysqli_query($con, $qry);

        // Check if the query was successful
        if ($result) {
            // Check if any rows were returned
            if (mysqli_num_rows($result) > 0) {
                // Fetch and display results
                while ($row = mysqli_fetch_row($result)) {
                    echo "<br>Roll No: $row[0], Name: $row[1], Mark: $row[2], Grade: $row[3]";
                }
            } else {
                echo "No results found for Regno: $rg";
            }
        } else {
            echo "Error in query: " . mysqli_error($con);
        }

        // Close the database connection
        mysqli_close($con);
    }
    ?>
</body>
</html>
