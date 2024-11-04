<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Armstrong Number Checker</title>
</head>
<body><center>
    <h1>Armstrong Number Checker</h1>
    <form method="post">
        <label for="number">Enter a number:</label>
        <input type="number" id="number" name="number" required>
        <input type="submit" value="Check">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $number = $_POST['number'];

        function isArmstrong($number) {
            $digits = str_split($number);
            $numDigits = count($digits);
            $sum = 0;

            foreach ($digits as $digit) {
                $sum += pow((int)$digit, $numDigits);
            }

            return $sum === (int)$number;
        }

        if (isArmstrong($number)) {
            echo "<p>$number is an Armstrong number.</p>";
        } else {
            echo "<p>$number is not an Armstrong number.</p>";
        }
    }
    ?>
</center>
</body>
</html>
