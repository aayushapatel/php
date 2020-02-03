<!DOCTYPE html>
<html>
    <head>
        <title>Login Page</title>
    </head>
    <body>
        <?php require 'loginValidate.php'; ?>
        <form method="post">
        <table>
            <div>
                <tr>
                    <td>Email</td>
                </tr>
            </div>
            <div>
            <tr>
                <td>
                    <input type="email" name="email" id="">
                </td>
            </tr>
            </div>
            <div>
            <tr>
                <td>Password</td>
            </tr>
            </div>
            <div>
            <tr>
                <td>
                    <input type="password" name="password" id="">
                </td>
            </tr>
            </div>
            <div>
            <tr>
                <td>
                    <input type="submit" value="Login" name="login">
                    <input type="submit" value="Register" name="register">
                </td>
            </tr>
            </div>
        </table>
        </form>
    </body>
</html>