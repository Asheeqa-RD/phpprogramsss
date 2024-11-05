<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Fruits</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 20px;
        }
        label {
            font-weight: bold;
        }
        select {
            width: 200px;
            height: 100px;
        }
        ul {
            margin-top: 20px;
        }
        li {
            list-style-type: square;
        }
    </style>
</head>
<body>
    <h1>Select Your Favorite Fruits</h1>
    
    <!-- Form to select fruits -->
    <form method="POST">
        <label for="fruits">Choose your fruits:</label><br>
        <select name="fruits[]" multiple>
            <option value="Apple">Apple</option>
            <option value="Banana">Banana</option>
            <option value="Orange">Orange</option>
            <option value="Grapes">Grapes</option>
            <option value="Mango">Mango</option>
            <option value="Pineapple">Pineapple</option>
        </select><br><br>
        <input type="submit" value="Submit">
    </form>
    
    <?php
    // PHP script to handle form submission and display selected fruits
    if (isset($_POST['fruits'])) {
        $fruits = $_POST['fruits'];
        echo "<ul>";
        foreach ($fruits as $fruit) {
            echo "<li>" . htmlspecialchars($fruit) . "</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>No fruits selected.</p>";
    }
    ?>

</body>
</html>
