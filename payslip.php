<?php
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $basic = $_POST['basic'];
    $designation = $_POST['designation'];
    $salary = calculateSalary($basic, $designation);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Employee Pay Slip Generator</title>
    <style>
        .payslip {
            width: 600px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
        }
        .field {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <h2>Employee Pay Slip Generator</h2>
    <form method="post">
        <div>
            <label>Employee Name:</label><br>
            <input type="text" name="name" required>
        </div>
        <div>
            <label>Basic Salary:</label><br>
            <input type="number" name="basic" required>
        </div>
        <div>
            <label>Designation:</label><br>
            <select name="designation" required>
                <option value="Manager">Manager</option>
                <option value="Supervisor">Supervisor</option>
                <option value="Clerk">Clerk</option>
                <option value="Peon">Peon</option>
            </select>
        </div>
        <input type="submit" value="Generate Pay Slip">
    </form>

    <?php if(isset($salary)): ?>
    <div class="payslip">
        <h3>Pay Slip</h3>
        <div class="field">Employee Name: <?php echo $name; ?></div>
        <div class="field">Designation: <?php echo $designation; ?></div>
        <div class="field">Basic Salary: ₹<?php echo number_format($basic, 2); ?></div>
        <div class="field">HRA: ₹<?php echo number_format($salary['hra'], 2); ?></div>
        <div class="field">Conveyance Allowance: ₹<?php echo number_format($salary['conveyance'], 2); ?></div>
        <div class="field">Extra Allowance: ₹<?php echo number_format($salary['extra'], 2); ?></div>
        <div class="field">Gross Salary: ₹<?php echo number_format($salary['gross'], 2); ?></div>
        <div class="field">Income Tax: ₹<?php echo number_format($salary['tax'], 2); ?></div>
        <div class="field">Net Salary: ₹<?php echo number_format($salary['net'], 2); ?></div>
    </div>
    <?php endif; ?>
</body>
</html>