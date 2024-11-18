<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Fruits</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .container {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Favorite Fruits</h1>
        
        <!-- Form to select fruits -->
        <form method="POST">
            <label for="fruits">Choose your fruits:</label><br>
            <select name="fruits[]" multiple>
                <option value="Apple" id="Apple">Apple</option>
                <option value="Banana" id="Banana">Banana</option>
                <option value="Orange" id="Orange">Orange</option>
                <option value="Grapes" id="Grapes">Grapes</option>
                <option value="Mango" id="Mango">Mango</option>
                <option value="Pineapple" id="Pineapple">Pineapple</option>
            </select><br><br>
            <input type="submit" value="Submit">
        </form>
        
        <?php
        // PHP script to handle form submission and display selected fruits
        if (isset($_POST['fruits'])) {
            $fruits = $_POST['fruits'];
            foreach ($fruits as $fruit) {
                echo "<p>Selected fruit: " . htmlspecialchars($fruit) . "</p>";
            }
        } else {
            echo "<p>No fruits selected.</p>";
        }
        ?>
    </div>
</body>
</html>
