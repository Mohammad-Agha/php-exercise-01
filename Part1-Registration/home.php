<?php
    session_start();
    $fullName = $username = $password = $confirmPassword = $email = $phone = $dateOfBirth = $securityNumber = "";

    $fullNameError = $usernameError = $passwordError = $confirmPasswordError = $emailError = $phoneError = $dateOfBirthError = $securityNumberError = "";

    $fullNameErrorClass = $usernameErrorClass = $passwordErrorClass = $confirmPasswordErrorClass = $emailErrorClass = $phoneErrorClass = $dateOfBirthErrorClass = $securityNumberErrorClass = "";


    if(!isset($_SESSION['id'])) {
        $_SESSION['id'] = 1;
    }

    if(!isset($_SESSION['users'])) {
        $_SESSION['users'] = array();
    }

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $validate = true;
        if(empty($_POST['fullName'])) {
            $fullNameError = "Full name is required";
            $fullNameErrorClass = " form-control__error";
            $validate = false;
        }
        else {
            $fullName = filterData($_POST['fullName']);
            if (!preg_match("/^[a-zA-Z-' ]*$/",$fullName)) {
                $fullNameError = "Incorrect name";
                $fullNameErrorClass = " form-control__error";
                $validate = false;
            }
        }

        if(empty($_POST['username'])) {
            $usernameError = "Username is required";
            $usernameErrorClass = " form-control__error";
            $validate = false;
        }
        else {
            $username = filterData($_POST['username']);
            if(isset($_SESSION['users'])) {
                foreach($_SESSION['users'] as $user) {
                    if($user['username'] == $username) {
                        $validate = false;
                        $usernameError = "Username already exists";
                        $usernameErrorClass = " form-control__error";
                    }
                }    
            }
        }

        if(empty($_POST['password'])) {
            $passwordError = "Password is required";
            $passwordErrorClass = " form-control__error";
            $validate = false;
        }
        else {
            $password = filterData($_POST['password']);
        }

        if(empty($_POST['confirmPassword'])) {
            $confirmPasswordError = "Confirm password is required";
            $confirmPasswordErrorClass = " form-control__error";
            $validate = false;
        }
        else {
            $confirmPassword = filterData($_POST['confirmPassword']);
            if($password != $confirmPassword) {
                $passwordError = "Password doesn't match";
                $passwordErrorClass = " form-control__error";
                $confirmPasswordErrorClass = " form-control__error";
                $validate = false;
            }
        }

        if(empty($_POST['email'])) {
            $emailError = "Email is required";
            $emailErrorClass = " form-control__error";
            $validate = false;
        }
        else {
            $email = filterData($_POST['email']);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailError = "Invalid email format";
                $emailErrorClass = " form-control__error";
                $validate = false;
            }
            if(isset($_SESSION['users'])) {
                foreach($_SESSION['users'] as $user) {
                    if($user['email'] == $email) {
                        $validate = false;
                        $emailError = "Email already exists";
                        $emailErrorClass = " form-control__error";
                    }
                }    
            }
        }

        if(empty($_POST['phone'])) {
            $phoneError = "Phone is required";
            $phoneErrorClass = " form-control__error";
            $validate = false;
        }
        else {
            $phone = filterData($_POST['phone']);
        }

        if(empty($_POST['dateOfBirth'])) {
            $dateOfBirthError = "Date of birth is required";
            $dateOfBirthErrorClass = " form-control__error";
            $validate = false;
        }
        else {
            $dateOfBirth = filterData($_POST['dateOfBirth']);
        }

        if(empty($_POST['securityNumber'])) {
            $securityNumberError = "Social security number is required";
            $securityNumberErrorClass = " form-control__error";
            $validate = false;
        }
        else {
            $securityNumber = filterData($_POST['securityNumber']);
        }

        if($validate) {
            $user = array(
                "id" => $_SESSION['id'],
                "fullName" => $fullName,
                "username" => $username,
                "password" => $password,
                "email" => $email,
                "phone" => $phone,
                "dateOfBirth" => $dateOfBirth,
                "securityNumber" => $securityNumber
            );
            $_SESSION['id']++;
            array_push($_SESSION['users'], $user); 
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
    <link rel="stylesheet" href="css/home.css">
    <title>Registration Page | Login Page</title>
</head>
<body>
    <div class="wrapper">
        <div class="container">
            <h1 class="header">Registration Form</h1>
            <h2 class="header"><?php if($validate) { echo "User $username was registered"; }  ?></h2>
            <form method="post" action=
            "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="form-wrapper">

                <div class="form-group">
                    
                    <p class="error"><?php echo $fullNameError ?></p>
                    <input value="<?php if(!$validate) echo $fullName; else echo ""; ?>"
                     type="text" class="form-control<?php echo $fullNameErrorClass ?>" name="fullName" placeholder="Full Name">
                </div>
                <div class="form-group">
                    <p class="error"><?php echo $usernameError ?></p>
                    <input value="<?php if(!$validate) echo $username; else echo ""; ?>"
                     type="text" class="form-control<?php echo $usernameErrorClass ?>" name="username" placeholder="Username">
                </div>
                <div class="form-group">
                    <p class="error"><?php echo $passwordError ?></p>
                    <input value="<?php if(!$validate) echo $password; else echo ""; ?>"
                     type="password" class="form-control<?php echo $passwordErrorClass ?>" name="password" placeholder="Password">
                </div>
                <div class="form-group">
                    <p class="error"><?php echo $confirmPasswordError ?></p>
                    <input value="<?php if(!$validate) echo $confirmPassword; else echo ""; ?>"
                     type="password" class="form-control<?php echo $confirmPasswordErrorClass ?>" name="confirmPassword" placeholder="Confirm Password">
                </div>
                <div class="form-group">
                    <p class="error"><?php echo $emailError ?></p>
                    <input value="<?php if(!$validate) echo $email; else echo ""; ?>"
                     type="email" class="form-control<?php echo $emailErrorClass ?>" name="email" placeholder="Email">
                </div>
                <div class="form-group">
                    <p class="error"><?php echo $phoneError ?></p>
                    <input value="<?php if(!$validate) echo $phone; else echo ""; ?>"
                     type="tel" class="form-control<?php echo $phoneErrorClass ?>" name="phone" placeholder="Phone">
                </div>
                <div class="form-group">
                    <p class="error"><?php echo $dateOfBirthError ?></p>
                    <input value="<?php if(!$validate) echo $dateOfBirth; else echo ""; ?>"
                     type="text" class="form-control<?php echo $dateOfBirthErrorClass ?>" name="dateOfBirth" placeholder="dd / mm / yyyy">
                </div>
                <div class="form-group">
                    <p class="error"><?php echo $securityNumberError ?></p>
                    <input value="<?php if(!$validate) echo $securityNumber; else echo ""; ?>"
                     type="text" class="form-control<?php echo $securityNumberErrorClass ?>" name="securityNumber" placeholder="Social Security Number">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn">Register</button>
                </div>

                <div class="form-group">
                    <button type="reset" class="btn">Reset</button>
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