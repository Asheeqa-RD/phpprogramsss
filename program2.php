<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fibonacci Series Generator</title>
    <style>
        body{
            text-align :center;
        }
    </style>
</head>

<body>
    <h1>Fibonacci Series Generator</h1>
    <form method="post">
        <label for="number">Enter a number:</label>
        <input type="number" id="number" name="number" required>
        <input type="submit" value="Generate">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $number = $_POST['number'];

        function fibonacciSeries($n) {
            $series = [];
            $a = 0;
            $b = 1;

            while ($a <= $n) {
                $series[] = $a;
                $next = $a + $b;
                $a = $b;
                $b = $next;
            }

            return $series;
        }

        $fibonacci = fibonacciSeries($number);
        echo "<h2>Fibonacci Series up to $number:</h2>";
        echo "<p>" . implode(", ", $fibonacci) . "</p>";
    }
    ?>
</body>
</html>
