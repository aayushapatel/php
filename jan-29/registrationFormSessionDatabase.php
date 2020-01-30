<!DOCTYPE html>
<html>

<head>
    <title>Registartion Page</title>
</head>

<body>
    <?php require_once 'formSessionDatabase.php';
    $validFlag = 0; 
    ?>
    <form method="post" enctype='multipart/form-data'>
        <fieldset>
            <legend>YOUR ACCOUNT DETAILS</legend>
            <table>
                <div>
                    <tr>
                        <th>
                            Name :
                        </th>
                        <td>
                            <?php $prefixValues = ['Mr','Miss','Ms','Mrs','Dr']; ?>
                            <select name="account[prefix]" id="prefix">
                                <?php 
                    $selected = "selected='selected'";
                    foreach($prefixValues as $prefix):
                    ?>
                                <option value=<?php echo $prefix?>
                                    <?php echo (in_array(getSession('account','prefix'),[$prefix]))? $selected : ""   ?>>
                                    <?php echo $prefix?></option>
                                <?php endforeach; ?>

                            </select>
                            <input type="text" name="account[firstName]" id="firstName" placeholder="First Name"
                                value='<?php echo getSession('account', 'firstName'); ?>'>
                            <input type="text" name="account[lastName]" id="lastName" placeholder="Last Name"
                                value='<?php echo getSession('account', 'lastName'); ?>'>
                            <?php if(validate('account','firstName')): ?>
                        <td><span>Invalid First Name </span>
                            <?php $validFlag ++; endif; ?>
                            <?php if(validate('account','lastName')): ?>
                            <span>Invalid Last Name </span></td>
                        <?php $validFlag ++; endif; ?>
                        </td>
                    </tr>
                </div>
                <div>
                    <tr>
                        <th>
                            Date of Birth :
                        </th>
                        <td>
                            <input type="date" name="account[dateOfBirth]" id="dateOfbirth"
                                value='<?php echo getSession('account', 'dateOfBirth'); ?>'>
                            <?php if(validate('account','dateOfBirth')): ?>
                        <td><span>Invalid Date of Birth </span></td>
                        <?php $validFlag ++; endif; ?>

                        </td>
                    </tr>
                </div>
                <div>
                    <tr>
                        <th>
                            Phone Number :
                        </th>
                        <td>
                            <input type="text" name="account[phoneNumber]" id="phoneNumber" placeholder="Phone Number"
                                value='<?php echo getSession('account', 'phoneNumber'); ?>'>
                            <?php if(validate('account','phoneNumber')): ?>
                        <td><span>Invalid Phone Number </span></td>
                        <?php $validFlag ++; endif; ?>
                        </td>
                    </tr>
                </div>
                <div>
                    <tr>
                        <th>
                            Email :
                        </th>
                        <td>
                            <input type="text" name="account[email]" id="email" placeholder="Email"
                                value='<?php echo getSession('account', 'email'); ?>'>
                            <?php if(validate('account','email')): ?>
                        <td><span>Invalid E-mail </span></td>
                        <?php $validFlag ++; endif; ?>
                        </td>
                    </tr>
                </div>
                <div>
                    <tr>
                        <th>
                            Password :
                        </th>
                        <td>
                            <input type="password" name="account[password]" id="password" placeholder="Password">
                            <?php if(validate('account','password')): ?>
                        <td><span>Password length should be in 8-10 characters. Password should include one capital
                                letter and one number </span></td>
                        <?php $validFlag ++; endif; ?>
                        </td>
                    </tr>
                </div>
                <div>
                    <tr>
                        <th>
                            Confirm Password :
                        </th>
                        <td>
                            <input type="password" name="confirmPassword" id="confirmPassword"
                                placeholder="Confirm Password">
                            <?php if(validate('account','confirmPassword')): ?>
                        <td><span>Password does not match</span></td>
                        <?php $validFlag ++; endif; ?>
                        </td>
                    </tr>
                </div>
            </table>
        </fieldset>
        <fieldset>
            <legend>ADDRESS INFORMATION</legend>
            <table>
                <div>
                    <tr>
                        <th>Address Line 1 : </th>
                        <td><input type="text" name="address[addressOneLine]" id="addressOne"
                                value="<?php echo getSession('address', 'addressOneLine'); ?>">
                            <?php if(validate('address','addressOneLine')): ?>
                        <td><span>Invalid Address Line 1</span></td>
                        <?php $validFlag ++; endif; ?>

                    </tr>
                </div>
                <div>
                    <tr>
                        <th>Address Line 2 : </th>
                        <td><input type="text" name="address[addressTwoLine]" id="addressTwo"
                                value="<?php echo getSession('address', 'addressTwoLine'); ?>">
                            <?php if(validate('address','addressTwoLine')): ?>
                        <td><span>Invalid Address Line 2</span></td>
                        <?php $validFlag ++; endif; ?>
                        </td>
                    </tr>
                </div>
                </div>
                <tr>
                    <th>Company : </th>
                    <td><input type="text" name="address[companyName]" id="companyName"
                            value="<?php echo getSession('address', 'companyName'); ?>">
                    </td>
                </tr>
                </div>
                <div>
                    <tr>
                        <th>City : </th>
                        <td><input type="text" name="address[city]" id="city"
                                value="<?php echo getSession('address', 'city'); ?>"></td>
                    </tr>
                </div>
                <div>
                    <tr>
                        <th>
                            State :
                        </th>
                        <td><input type="text" name="address[state]" id="state"
                                value="<?php echo getSession('address', 'state'); ?>"></td>
                    </tr>
                </div>
                <div>
                    <tr>
                        <th>Country : </th>
                        <td>
                            <?php $countryArray = ['India','China','Nepal','USA','UK']; ?>
                            <select name="address[country]" id="country">
                                <?php
                    $selected = "selected='selected'";
                    foreach($countryArray as $country):
                    ?>
                                <option value=<?php echo $country?>
                                    <?php echo (in_array(getSession('address','country'),[$country]))? $selected : ""   ?>>
                                    <?php echo $country?></option>
                                <?php endforeach; ?>

                            </select>
                        </td>
                    </tr>
                </div>
                <div>
                    <tr>
                        <th>Postal Code : </th>
                        <td><input type="text" name="address[postalCode]" id="postalCode"
                                value="<?php echo getSession('address', 'postalCode'); ?>">
                            <?php if(validate('address','postalCode')): ?>
                        <td><span>PostalCode must be 6 digit codee</span></td>
                        <?php $validFlag ++; endif; ?>
                        </td>
                    </tr>
                </div>
            </table>
        </fieldset>

        <div>
            <fieldset>
                <legend>OTHER INFORMATION</legend>
                <table>
                    <div>
                        <tr>
                            <th>
                                Describe Yourself :
                            </th>
                            <td>
                                <textarea name="other[describe]" id="describe" cols="30"
                                    rows="5"><?php echo getSession('other', 'describe'); ?></textarea>
                                <?php if(validate('other','describe')): ?>
                            <td><span>Fill this description box</span></td>
                            <?php $validFlag ++; endif; ?>
                            </td>
                        </tr>
                    </div>
                    <div>
                        <tr>
                            <th>Profile Image :
                            </th>
                            <td>
                                <input type="file" name="other[profileImage]" id="profileImage">
                                <?php $flag = (validate('other','profileImage'));
                        if($flag != 1): ?>
                            <td><span><?php echo $flag; ?></span></td>
                            <?php $validFlag ++; endif; ?>
                            </td>
                        </tr>
                    </div>
                    <div>
                        <tr>
                            <th>
                                Certificate Upload :
                            </th>
                            <td>
                                <input type="file" name="other[certificate]" id="certificate">
                                <?php $flag = (validate('other','certificate'));
                        if($flag != 1): ?>
                            <td><span><?php echo $flag; ?></span></td>
                            <?php $validFlag ++; endif; ?>
                            </td>
                        </tr>
                    </div>
                    <div>
                        <tr>
                            <th>
                                How long have you been in business?
                            </th>
                            <td>
                                <?php $years = ['UNDER 1 YEAR', '1-2 YEARS','2-5 YEARS','5-10 YEARS','OVER 10 YEARS'];
                        $selected ="checked='checked'";
                        foreach($years as $yearRadio): ?>
                                <input type="radio" name="other[years]" value="<?php echo $yearRadio?>"
                                    <?php echo (in_array(getSession('other','years'),[$yearRadio]))? $selected : "" ?>><?php echo $yearRadio?>
                                <?php endforeach; ?>

                            </td>
                        </tr>
                    </div>
                    <div>
                        <tr>
                            <th>
                                Number of unique clients you see each week ?
                            </th>
                            <td>

                                <?php $clientArray = ['1-5','6-10','11-15','15+']; ?>
                                <select name="other[clients]" id="clients">
                                    <?php
                                        $selected = "selected='selected'";
                                        foreach($clientArray as $clients):
                                        ?>
                                    <option value=<?php echo $clients?>
                                        <?php echo (in_array(getSession('other','clients'),[$clients]))? $selected : ""   ?>>
                                        <?php echo $clients?></option>
                                    <?php endforeach; ?>

                                </select>
                            </td>
                        </tr>
                    </div>
                    <div>
                        <tr>
                            <th>
                                How do you like us to get in touch with you ?
                            </th>
                            <td>

                                <?php $inTouchArray = ['Post','Email','SMS','Phone']; ?>
                                <?php
                    $selected = "checked='checked'";
                    foreach($inTouchArray as $inTouch):
                    ?>
                                <input type="checkbox" name="other[inTouch][<?php  echo $inTouch?>]"
                                    value="<?php echo $inTouch?>"
                                    <?php echo (in_array($inTouch,(getSession('other','inTouch',[]))))? $selected : "" ?>>
                                <?php echo $inTouch?>
                                <?php endforeach; 
                     ?>


                                </select>
                            </td>
                            <?php if(validate('other','describe')): ?>
                            <td><span>Select atleast one of them</span></td>
                            <?php $validFlag ++; endif; ?>
                        </tr>
                    </div>
                    <div>
                        <tr>
                            <th>Hobbies</th>
                            <td>
                                <?php $hobbiesArray = ['Listening to Music','Travelling','Blogging','Sports','Arts']; ?>

                                <select name="other[hobbies][]" id="hobbies" multiple>
                                    <?php 

                    $selected = "selected='selected'";
                    foreach($hobbiesArray as $hobbies):
                       
                    ?>
                                    <option value="<?php echo $hobbies?>"
                                        <?php echo (in_array($hobbies,(getSession('other','hobbies',[]))))? $selected: ""   ?>>
                                        <?php echo $hobbies; ?></option>
                                    <?php endforeach; ?>

                                </select>

                            </td>
                        </tr>
                    </div>


                </table>

            </fieldset>
            <input type="submit" value="Submit" name='submit'>
            <?php
            if(isset($_POST)) {
                setData($validFlag);
               
            }
                ?>

        </div>
    </form>
</body>

</html>