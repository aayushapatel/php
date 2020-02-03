<!DOCTYPE html>
<html>
    <head>
        <title>Login Page</title>
    </head>
    <body>
        <?php require 'registerValidate.php';
        $validFlag = 0; ?>
        <form method="post">
        <table>
                <div>
                    <tr>
                        <th>Prefix</th>
                        <td>
                        <select name="prefix" id="prefix">
                                <?php 
                                   $selected = "selected='selected'";
                                   $prefixValues = ['Mr', 'Miss' ,'Mrs', 'Dr'];
                                    foreach($prefixValues as $prefix):
                                ?>
                                <option value=<?php echo $prefix?>>
                                    <?php echo $prefix?></option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                    </tr>
                </div>
                <div>
                    <tr>
                        <th>First Name</th>
                        <td><input type="text" name="firstName" id="">
                            <?php if(validate('firstName')): ?>
                                <span>Invalid Name </span>
                            <?php
                            $validFlag++; endif;?>
                        </td>
                    </tr>
                </div>
                <div>
                    <tr>
                        <th>Last Name</th>
                        <td><input type="text" name="lastName" id="">
                        <?php if(validate('lastName')): ?>
                                <span>Invalid Name </span>
                            <?php
                            $validFlag++; endif;?>
                        </td>
                    </tr>
                </div>
                <div>
                    <tr>
                        <th>Email</th>
                        <td><input type="email" name="email" id="">
                        <?php if(validate('email')): ?>
                                <span>Invalid Email </span>
                            <?php
                            $validFlag++; endif;?>
                        </td>
                    </tr>
                </div>
                <div>
                    <tr>
                        <th>Mobile Number</th>
                        <td><input type="text" name="mobileNumber" id="">
                        <?php if(validate('mobileNumber')): ?>
                                <span>Invalid mobile Number </span>
                            <?php
                            $validFlag++; endif;?>
                        </td>
                    </tr>
                </div>
                <div>
                    <tr>
                        <th>Password</th>
                        <td><input type="password" name="password" id="">
                        <?php if(validate('password')): ?>
                                <span>Invalid Password</span>
                            <?php
                            $validFlag++; endif;?>
                        </td>
                    </tr>
                </div>
                <div>
                    <tr>
                        <th>Confirm Password</th>
                        <td><input type="password" name="confirmPassword" id="">
                        <?php if(validate('confirmPassword')): ?>
                                <span>Password does not match </span>
                            <?php
                            $validFlag++; endif;?>
                        </td>
                    </tr>
                </div>
                <div>
                    <tr>
                        <th>Information</th>
                        <td><textarea name="information" cols="20" rows="3"></textarea>
                        <?php if(validate('information')): ?>
                                <span>Invalid Information </span>
                            <?php
                            $validFlag++; endif;?>
                        </td>
                    </tr>
                </div>
                <div>
                <tr>
                    <td><input type="checkbox" name="terms" id="">
                    Hereby, I accept Terms & Conditions
                    <?php if(validate('terms')): ?>
                                <span>Accept It </span>
                            <?php
                            $validFlag++; endif;?>
                </td>
                </tr>
                </div>
                <div>
                    <tr>
                        <td><input type="submit" value="Submit"></td>
                    </tr>
                </div>
            </table>
        </form>
        <?php
            if(!empty($_POST)) {
                setData($validFlag);
            }
        ?>
    </body>
</html>