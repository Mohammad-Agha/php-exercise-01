<?php
    $salary =  $time = $taxFreeAllowance = "";
    $salaryError = $taxFreeAllowanceError = "";
    $salaryErrorClass = $taxFreeAllowanceErrorClass = "";

    if($_SERVER['REQUEST_METHOD'] == "POST") {
        if(isset($_POST['calculate'])) {
            $validate = true;
            $salary = filterData($_POST['salary']);
            $time = $_POST['time'];
            $taxFreeAllowance = $_POST['taxFreeAllowance'];

            if (!preg_match('/^[0-9]+$/', $salary)) {
                $salaryError = "Only numbers are allowed";
                $validate = false;
            }

            if (!preg_match('/^[0-9]+$/', $taxFreeAllowance)) {
                $taxFreeAllowanceError = "Only numbers are allowed";
                $validate = false;
            }

        }
    }


function filterData($data) {
    $data = trim($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <title>Income Tax Calculator</title>
</head>
<body>
    <div class="wrapper">
        <form method="POST" class="form" action="<?php echo $_SERVER['PHP_SELF']; ?>"> 
            <div class="salary-container form-group">
                <p class="error"><?php echo $salaryError; ?></p>
                <span class="currency">$</span>
                <input type="text" name="salary"
                value="<?php if(isset($_POST['calculate'])) echo $salary; ?>"
                placeholder="Salary in USD" required>
            </div>
            <div class="time-container form-group">
                <label class="monthly">
                    <input type="radio"
                    <?php if(isset($_POST['calculate'])) if($_POST['time'] == "monthly") echo "checked"; ?>
                    name="time" value="monthly" required> Monthly
                </label>
                <label class="yearly">
                    <input type="radio"
                    <?php if(isset($_POST['calculate'])) if($_POST['time'] == "yearly") echo "checked"; ?>
                    name="time" value="yearly"> Yearly
                </label>
            </div>
            <div class="allowance-container form-group">
            <p class="error"><?php echo $taxFreeAllowanceError; ?></p>
                <span class="currency">$</span>
                <input type="text"
                value="<?php if(isset($_POST['calculate'])) echo $taxFreeAllowance;?>"
                name="taxFreeAllowance" placeholder="Tax Free Allowance in USD" required> 
            </div>
            <div class="btn-container form-group">
                <button type="submit" class="btn" name="calculate">Calculate</button>
            </div>
        </form>

        <?php 
            if(isset($_POST['calculate'])) {
                if($validate) {
                    
                    $totalSalary = $salary;
                    
                    if($time == 'monthly') {
                        $totalSalary *= 12;
                    }

                    $taxAmount = $socialSecurityFee = $salaryAfterTax = 0;
                    if($salary < 10000) {
                        $taxAmount = 0;
                    }
                    else if($salary < 25000) {
                        $taxAmount = 11;
                    }
                    else if($salary < 50000) {
                        $taxAmount = 30;
                    }
                    else {
                        $taxAmount = 45;
                    }

                    if($salary > 10000) {
                        $socialSecurityFee = 4;
                    }


                    




                    
                    echo 
                    "
                    <table style='width: 100%; text-align: center;'  border = '1'>
                        <tr>
                            <th> </th>
                            <th>Monthly</th>
                            <th>Yearly</th>
                        </tr>

                        <tr>
                            <td>Total Salary</td>
                            <td></td>
                            <td></td>
                        </tr>

                        <tr>
                            <td>Tax amount</td>
                            <td></td>
                            <td></td>
                        </tr>

                        <tr>
                            <td>Social security fee</td>
                            <td></td>
                            <td></td>
                        </tr>
                        
                        <tr>
                            <td>Salary after tax</td>
                            <td></td>
                            <td></td>
                        </tr>
                    </table> 
                    ";
                }
            }
        ?>
    </div>
</body>
</html>