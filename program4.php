<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>String Reverser</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            text-align: center; /* Center align text */
        }
        input[type="text"] {
            padding: 5px;
            margin-bottom: 10px;
            width: 80%; /* Reduced width for better alignment */
            box-sizing: border-box;
        }
        input[type="submit"] {
            padding: 5px 10px;
            cursor: pointer;
        }
        .result {
            margin-top: 20px;
            font-weight: bold; /* Make result text bold */
        }
    </style>
</head>
<body>
    <h1>String Reverser</h1>
    <form method="post">
        <label for="inputString">Enter a string:</label><br>
        <input type="text" id="inputString" name="inputString" required><br>
        <input type="submit" value="Reverse">
    </form>

    <?php
    // Initialize the reversed string variable
    $reversedString = "";

    // Check if the form has been submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $inputString = $_POST['inputString'];

        function reverseString($str) {
            return strrev($str);
        }

        // Get the reversed string
        $reversedString = reverseString($inputString);
    }
    ?>

    <?php if ($reversedString): ?>
        <div class='result'>Reversed String: <?php echo $reversedString; ?></div>
    <?php endif; ?>
</body>
</html>
