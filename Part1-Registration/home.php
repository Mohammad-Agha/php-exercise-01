<?php
    $fullName = $username = $password = $confirmPassword = $email = $phone = $dateOfBirth = $securityNumber = "";

    $fullNameError = $usernameError = $passwordError = $confirmPasswordError = $emailError = $phoneError = $dateOfBirthError = $securityNumberError = "";

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        (empty($_POST['fullName']))
            ? ($fullNameError = "Full name is required")
            : ($fullName = filterData($_POST['fullName']));
            (empty($_POST['username']))
            ? ($usernameError = "Username is required")
            : ($username = filterData($_POST['username']));

            (empty($_POST['password']))
            ? ($passwordError = "Password is required")
            : ($password = filterData($_POST['password']));

            (empty($_POST['confirmPassword']))
            ? ($confirmPasswordError = "Confirm password is required")
            : ($confirmPassword = filterData($_POST['confirmPassword']));

            (empty($_POST['email']))
            ? ($emailError = "Email is required")
            : ($email = filterData($_POST['email']));

            (empty($_POST['phone']))
            ? ($phoneError = "Phone is required")
            : ($phone = filterData($_POST['phone']));

            (empty($_POST['dateOfBirth']))
            ? ($dateOfBirthError = "Date of birth is required")
            : ($dateOfBirth = filterData($_POST['dateOfBirth']));

            (empty($_POST['securityNumber']))
            ? ($securityNumberError = "Social security number is required")
            : ($securityNumber = filterData($_POST['securityNumber']));
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
    <link rel="stylesheet" href="css/home.css">
    <title>Registration Page | Login Page</title>
</head>
<body>
    <div class="wrapper">
        <div class="container">
            <h1 class="header">Registration Form</h1>
            <form method="post" action=
            "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="form-wrapper">

                <div class="form-group">
                    
                    <p class="error"><?php echo $fullNameError ?></p>
                    <input type="text" class="form-control" name="fullName" placeholder="Full Name">
                </div>
                <div class="form-group">
                    <p class="error"><?php echo $usernameError ?></p>
                    <input type="text" class="form-control" name="username" placeholder="Username">
                </div>
                <div class="form-group">
                    <p class="error"><?php echo $passwordError ?></p>
                    <input type="password" class="form-control" name="password" placeholder="Password">
                </div>
                <div class="form-group">
                    <p class="error"><?php echo $confirmPasswordError ?></p>
                    <input type="password" class="form-control" name="confirmPassword" placeholder="Confirm Password">
                </div>
                <div class="form-group">
                    <p class="error"><?php echo $emailError ?></p>
                    <input type="email" class="form-control" name="email" placeholder="Email">
                </div>
                <div class="form-group">
                    <p class="error"><?php echo $phoneError ?></p>
                    <input type="tel" class="form-control" name="phone" placeholder="Phone">
                </div>
                <div class="form-group">
                    <p class="error"><?php echo $dateOfBirthError ?></p>
                    <input type="text" class="form-control" name="dateOfBirth" placeholder="dd / mm / yyyy">
                </div>
                <div class="form-group">
                    <p class="error"><?php echo $securityNumberError ?></p>
                    <input type="text" class="form-control" name="securityNumber" placeholder="Social Security Number">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn">Register</button>
                </div>

            </form>
        </div>
    </div>

    <div class="wrapper">
        <div class="container">
            <h1 class="header">Login Form</h1>
            <form method="post" action="" class="form-wrapper">

                <div class="form-group">
                    <input type="text" class="form-control" name="username" placeholder="Username">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Password">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn">Login</button>
                </div>

            </form>
        </div>
    </div>
</body>
</html>