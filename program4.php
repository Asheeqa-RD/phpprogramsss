<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>String Reverser</title>
</head>
<body style="text-align: center;">

    <h1>String Reverser</h1>

    <form method="post" align="center">
        <label for="inputString">Enter a string:</label><br><br>
        <input type="text" id="inputString" name="inputString" required><br><br>
        <input type="submit" value="Reverse"><br><br>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $inputString = $_POST['inputString'];

        // Reverse the string using strrev
        $reversedString = strrev($inputString);
    }
    ?>

    <?php if (isset($reversedString)): ?>
        <div><strong>Reversed String: </strong><?php echo $reversedString; ?></div>
    <?php endif; ?>

</body>
</html>
