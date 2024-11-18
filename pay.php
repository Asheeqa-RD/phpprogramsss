<?php
// Function to calculate salary details
function calculateSalary($basic, $designation) {
    $allowances = [
        'Manager' => ['conveyance' => 1000, 'extra' => 500],
        'Supervisor' => ['conveyance' => 750, 'extra' => 200],
        'Clerk' => ['conveyance' => 500, 'extra' => 100],
        'Peon' => ['conveyance' => 250, 'extra' => 0]
    ];
    
    // Calculate HRA (25% of basic)
    $hra = $basic * 0.25;
    
    // Get allowances based on designation
    $conveyance = $allowances[$designation]['conveyance'];
    $extra = $allowances[$designation]['extra'];
    
    // Calculate gross salary
    $gross = $basic + $hra + $conveyance + $extra;
    
    // Calculate income tax
    if ($gross <= 2500) {
        $tax = 0;
    } elseif ($gross <= 4000) {
        $tax = $gross * 0.03;
    } elseif ($gross <= 5000) {
        $tax = $gross * 0.05;
    } else {
        $tax = $gross * 0.08;
    }
    
    // Calculate net salary
    $net = $gross - $tax;
    
    return [
        'hra' => $hra,
        'conveyance' => $conveyance,
        'extra' => $extra,
        'gross' => $gross,
        'tax' => $tax,
        'net' => $net
    ];
}

// Ensure data is received from the form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $basic = $_POST['basic'];
    $designation = $_POST['designation'];
    $salary = calculateSalary($basic, $designation);
} else {
    // If no data is posted, redirect to the form page
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pay Slip</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
        }

        .container {
            width: 80%;
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f4f4f9;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Pay Slip</h2>
        <table>
            <tr>
                <th>Employee Name</th>
                <td><?php echo htmlspecialchars($name); ?></td>
            </tr>
            <tr>
                <th>Designation</th>
                <td><?php echo htmlspecialchars($designation); ?></td>
            </tr>
            <tr>
                <th>Basic Salary</th>
                <td>₹<?php echo number_format($basic, 2); ?></td>
            </tr>
            <tr>
                <th>HRA (25% of Basic)</th>
                <td>₹<?php echo number_format($salary['hra'], 2); ?></td>
            </tr>
            <tr>
                <th>Conveyance Allowance</th>
                <td>₹<?php echo number_format($salary['conveyance'], 2); ?></td>
            </tr>
            <tr>
                <th>Extra Allowance</th>
                <td>₹<?php echo number_format($salary['extra'], 2); ?></td>
            </tr>
            <tr>
                <th>Gross Salary</th>
                <td>₹<?php echo number_format($salary['gross'], 2); ?></td>
            </tr>
            <tr>
                <th>Income Tax</th>
                <td>₹<?php echo number_format($salary['tax'], 2); ?></td>
            </tr>
            <tr>
                <th>Net Salary</th>
                <td>₹<?php echo number_format($salary['net'], 2); ?></td>
            </tr>
        </table>
    </div>
</body>
</html>
