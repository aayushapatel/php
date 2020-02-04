<!DOCTYPE html>
<html>
    <head>
        <title>Blog Post</title>
    </head>
    <body>
      <?php require 'header.php';
      require 'userUpdate.php'; 
      $validFlag = 0; ?>
      <form action="" method="post">
      <table>
      <div>
                    <tr>
                        <th>Prefix</th>
                        <td>
                        <input type="text" name="prefix" id="" value="<?php echo getData('prefix'); ?>" readonly>
                            </select>
                        </td>
                    </tr>
                </div>
                <div>
                    <tr>
                        <th>First Name</th>
                        <td><input type="text" name="firstName" id=""  value="<?php echo getData('firstName'); ?>" readonly>

                        </td>
                    </tr>
                </div>
                <div>
                    <tr>
                        <th>Last Name</th>
                        <td><input type="text" name="lastName" id=""  value="<?php echo getData('lastName'); ?>" readonly>
                       
                        </td>
                    </tr>
                </div>
                <div>
                    <tr>
                        <th>Email</th>
                        <td><input type="email" name="email" id="" readonly  value="<?php echo getData('email'); ?>">
                        
                        </td>
                    </tr>
                </div>
                <div>
                    <tr>
                        <th>Mobile Number</th>
                        <td><input type="text" name="mobileNumber" id=""  value="<?php echo getData('mobileNumber'); ?>">
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
                        <td><textarea name="information" cols="20" rows="3"> <?php echo getData('information'); ?></textarea>
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
                        <td><input type="submit" value="Update"></td>
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