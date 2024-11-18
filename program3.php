<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Collecting form data
        $name = $_POST['name'];
        $age = $_POST['age'];
        $dob = $_POST['dob'];
        $gender = $_POST['gender']; // New gender field
        $father_name = $_POST['father_name'];
        $mother_name = $_POST['mother_name'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $hobby = $_POST['hobby'];
        $qualifications = $_POST['qualifications'];
        $experience = $_POST['experience'];

        // Displaying the data in a table
        echo "<div class='bio-data'>";
        echo "<h2><center>Bio Data</center></h2>";
        echo "<table border='1' cellpadding='10' cellspacing='0' style='width: 80%; margin: 20px auto; border-collapse: collapse;'>";
        echo "<tr><th>Field</th><th>Information</th></tr>";
        echo "<tr><td><strong>Name:</strong></td><td>" . htmlspecialchars($name) . "</td></tr>";
        echo "<tr><td><strong>Age:</strong></td><td>" . htmlspecialchars($age) . "</td></tr>";
        echo "<tr><td><strong>Date of Birth:</strong></td><td>" . htmlspecialchars($dob) . "</td></tr>";
        echo "<tr><td><strong>Gender:</strong></td><td>" . htmlspecialchars($gender) . "</td></tr>"; // Added gender field
        echo "<tr><td><strong>Father's Name:</strong></td><td>" . htmlspecialchars($father_name) . "</td></tr>";
        echo "<tr><td><strong>Mother's Name:</strong></td><td>" . htmlspecialchars($mother_name) . "</td></tr>";
        echo "<tr><td><strong>Email:</strong></td><td>" . htmlspecialchars($email) . "</td></tr>";
        echo "<tr><td><strong>Address:</strong></td><td>" . htmlspecialchars($address) . "</td></tr>";
        echo "<tr><td><strong>Hobby:</strong></td><td>" . htmlspecialchars($hobby) . "</td></tr>";
        echo "<tr><td><strong>Qualifications:</strong></td><td>" . htmlspecialchars($qualifications) . "</td></tr>";
        echo "<tr><td><strong>Experience:</strong></td><td>" . htmlspecialchars($experience) . "</td></tr>";
        echo "</table>";
        echo "</div>";
    }
?>
