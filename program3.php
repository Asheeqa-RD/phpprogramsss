<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $fields = [
        'name' => $_POST['name'],
        'age' => $_POST['age'],
        'dob' => $_POST['dob'],
        'gender' => $_POST['gender'],
        'father_name' => $_POST['father_name'],
        'mother_name' => $_POST['mother_name'],
        'email' => $_POST['email'],
        'address' => $_POST['address'],
        'hobby' => $_POST['hobby'],
        'qualifications' => $_POST['qualifications'],
        'experience' => $_POST['experience'],
    ];

    // Display data in a table
    echo "<h2 style='text-align: center;'>Bio Data</h2>";
    echo "<table border='1' cellpadding='10' style='width: 80%; margin: 20px auto; border-collapse: collapse;'>";
    foreach ($fields as $label => $value) {
        echo "<tr><td><strong>$label:</strong></td><td>" . htmlspecialchars($value) . "</td></tr>";
    }
    echo "</table>";
}
?>
