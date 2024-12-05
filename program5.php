<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Number Classifier</title>
</head>
<body style="text-align: center;">

    <h1>Check Number Type</h1>

    <form method="post" align="center">
        <label for="number">Enter a number:</label><br><br>
        <input type="number" id="number" name="number" required><br><br>
        <input type="submit" value="Check"><br><br>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $number = $_POST['number'];
        $sumOfDivisors = 0;

        // Calculate the sum of proper divisors
        for ($i = 1; $i <= $number / 2; $i++) {
            if ($number % $i == 0) {
                $sumOfDivisors += $i;
            }
        }

        // Determine if the number is perfect, abundant, or deficient
        if ($sumOfDivisors == $number) {
            $result = "The number $number is a Perfect number.";
        } elseif ($sumOfDivisors > $number) {
            $result = "The number $number is an Abundant number.";
        } else {
            $result = "The number $number is a Deficient number.";
        }

        echo "<div><strong>$result</strong></div>";
    }
    ?>

</body>
</html>
