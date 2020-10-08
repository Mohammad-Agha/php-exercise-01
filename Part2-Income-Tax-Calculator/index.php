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
                <span class="currency">$</span>
                <input type="text" name="salary" placeholder="Salary in USD" required>
            </div>
            <div class="time-container form-group">
                <label class="monthly">
                    <input type="radio" name="time" value="monthly" required> Monthly
                </label>
                <label class="yearly">
                    <input type="radio" name="time" value="monthly"> Yearly
                </label>
            </div>
            <div class="allowance-container form-group">
                <span class="currency">$</span>
                <input type="text" name="taxFreeAllowance" placeholder="Tax Free Allowance in USD" required> 
            </div>
            <div class="btn-container form-group">
                <button type="submit" class="btn" name="calculate">Calculate</button>
            </div>
            <div class="btn-container form-group">
                <button type="reset" class="btn" name="reset">Reset</button>
            </div>
        </form>
    </div>
</body>
</html>