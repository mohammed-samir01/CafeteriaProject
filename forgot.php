<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>forgot password</title>
</head>
<body>
    <form action="recover-your-password.php" method="post">
        <h3>recover your password</h3>
        <p>
            please enter an email which you used to sign up to help you recover your password.
        </p>
        <div class="email">
            <label for="email">email</label>
            <br>
            <input type="email" name="email" id="email" placeholder="enter your email" required autofocus>
        </div>
        <br>
        <input type="submit" value="recover your password">
    </form>
</body>
</html>