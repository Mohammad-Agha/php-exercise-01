<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/home.css">
    <title>Registration Page | Login Page</title>
</head>
<body>
    <div class="registration-div">
        <div class="registration-container">
            <h1 class="registration-header">Registration Form</h1>
            <form method="post" action="" class="form-wrapper">

                <div class="form-group">
                    <input type="text" class="form-control" name="fullName" placeholder="Full Name">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="username" placeholder="Username">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Password">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="confirmPassword" placeholder="Confirm Password">
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" name="email" placeholder="Email">
                </div>
                <div class="form-group">
                    <input type="tel" class="form-control" name="phone" placeholder="Phone">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="dateOfBirth" placeholder="dd / mm / yyyy">
                </div>
                <div class="form-group">
                    <input type="number" class="form-control" name="securityNumber" placeholder="Social Security Number">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn">Register</button>
                </div>

            </form>
        </div>
    </div>

    <div class="login-div">
        <div class="login-container">
            <h1 class="login-header">Login Form</h1>
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