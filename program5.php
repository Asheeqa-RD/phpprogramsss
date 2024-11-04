<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Number Classifier</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            text-align: center; /* Center align text */
        }
        input[type="number"] {
            padding: 5px;
            margin-bottom: 10px;
            width: 80%;
            box-sizing: border-box;
        }
        input[type="submit"] {
            padding: 5px 10px;
            cursor: pointer;
        }
        .result {
            margin-top: 20px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Check Number Type</h1>
    <form method="post">
        <label for="number">Enter a number:</label><br>
        <input type="number" id="number" name="number" required><br>
        <input type="submit" value="Check">
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

        echo "<div class='result'>$result</div>";
    }
    ?>
</body>
</html>
