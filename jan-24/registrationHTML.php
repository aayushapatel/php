<!DOCTYPE html>
<html>
    <head>
        <title>Registartion Page</title>
        <script>
            function check(otherchk) {
                var otherInfo = document.getElementById('otherInfo');
                otherInfo.style.display = otherchk.checked?"block":"none";
            }
            </script>
    </head>
    <body>
        <form method="post" enctype='multipart/form-data'>
        <fieldset>
            <legend>YOUR ACCOUNT DETAILS</legend>
        <table>
            <tr>
                <th>
                    Name : 
                </th>
                <td>
                    <select name="prefix" id="prefix">
                        <option value="Mr">Mr</option>
                        <option value="Miss">Miss</option>
                        <option value="Ms">Ms</option>
                        <option value="Mrs">Mrs</option>
                        <option value="Dr">Dr</option>
                    </select>
                    <input type="text" name="firstName" id="firstName" value="<?php session_start(); echo (isset($_SESSION['detail']['firstName'])) ? $_SESSION['detail']['firstName'] : ''; ?>" placeholder="First Name">
                    <input type="text" name="lastName" id="lastName" value="<?php echo (isset($_SESSION['detail']['lastName'])) ? $_SESSION['detail']['lastName'] : ''; ?>" placeholder="Last Name">
                </td>
            </tr>
            <tr>
                <th>
                    Date of Birth : 
                </th>
                <td>
                    <input type="date" name="dateOfBirth" id="dateOfbirth" value="<?php echo (isset($_SESSION['detail']['dateOfBirth'])) ? $_SESSION['detail']['dateOfBirth'] : ''; ?>">
                </td>
            </tr>
            <tr>
                <th>
                    Phone Number : 
                </th>
                <td>
                    <input type="text" name="phoneNumber" id="phoneNumber" value="<?php echo (isset($_SESSION['detail']['phoneNumber'])) ? $_SESSION['detail']['phoneNumber'] : ''; ?>"  placeholder="Phone Number">
                </td>
            </tr>
            <tr>
                <th>
                    Email : 
                </th>
                <td>
                    <input type="text" name="email" id="email" placeholder="Email" value="<?php echo (isset($_SESSION['detail']['email'])) ? $_SESSION['detail']['email'] : ''; ?>">
                </td>
            </tr>
            <tr>
                <th>
                    Password : 
                </th>
                <td>
                    <input type="password" name="password" id="password" placeholder="Password">
                </td>
            </tr>
            <tr>
                <th>
                    Confirm Password : 
                </th>
                <td>
                    <input type="password" name="confirmPassword" id="confirmPassword" placeholder="Confirm Password">
                </td>
            </tr>

        </table>
        </fieldset>
        <fieldset>
            <legend>ADDRESS INFORMATION</legend>
            <table>
                <tr>
                    <th>Address Line 1 : </th>
                    <td><input type="text" name="addressOne" id="addressOne" value="<?php echo (isset($_SESSION['detail']['addressOne'])) ? $_SESSION['detail']['addressOne'] : ''; ?>" ></td>
                </tr>
                <tr>
                    <th>Address Line 2 : </th>
                    <td><input type="text" name="addressTwo" id="addressTwo" value="<?php echo (isset($_SESSION['detail']['addressTwo'])) ? $_SESSION['detail']['addressTwo'] : ''; ?>" ></td>
                </tr>
                <tr>
                    <th>Company : </th>
                    <td><input type="text" name="companyName" id="companyName" value="<?php echo (isset($_SESSION['detail']['companyName'])) ? $_SESSION['detail']['companyName'] : ''; ?>"></td>
                </tr>
                <tr>
                    <th>City : </th>
                    <td><input type="text" name="city" id="city" value="<?php echo (isset($_SESSION['detail']['city'])) ? $_SESSION['detail']['city'] : ''; ?>" ></td>
                </tr>
                <tr>
                    <th>
                        State : 
                    </th>
                    <td><input type="text" name="state" id="state" value="<?php echo (isset($_SESSION['detail']['state'])) ? $_SESSION['detail']['state'] : ''; ?>"></td>
                </tr>
                <tr>
                    <th>Country : </th>
                    <td><select name="country" id="country">
                        <option value="India" <?php if(isset($_SESSION['detail']['country'])) { if(($_SESSION['detail']['country']) == 'India') echo 'selected'; }?>>India</option>
                        <option value="China" <?php if(isset($_SESSION['detail']['country'])) { if(($_SESSION['detail']['country']) == 'China') echo 'selected'; }?>>China</option>
                    </select></td>
                </tr>
                <tr>
                    <th>Postal Code : </th>
                    <td><input type="text" name="postalCode" id="postalCode" value="<?php echo (isset($_SESSION['detail']['postalCode'])) ? $_SESSION['detail']['postalCode'] : ''; ?>"></td>
                </tr>

            </table>
        </fieldset>
        <input type="checkbox" name="other" id="other" onclick="check(this)">Show Other Information
        <div id='otherInfo' style="display: none;">
            <fieldset>
            <legend>OTHER INFORMATION</legend>
        <table>
            <tr>
                <th>
                    Describe Yourself :  
                </th>
                <td>
                    <textarea name="describe" id="describe" cols="30" rows="10"><?php echo (isset($_SESSION['detail']['describe'])) ? $_SESSION['detail']['describe'] : ''; ?></textarea>                    
                </td>
            </tr>
            <tr>
                <th>Profile Image : 
                </th>
                <td>
                    <input type="file" name="profileImage" id="profileImage">
                    </td>
            </tr>
            <tr>
                <th>
                    Certificate Upload : 
                </th>
                <td>
                    <input type="file" name="certificate" id="certificate">
                </td>
            </tr>
            <tr>
                <th>
                    How long have you been in business?
                </th>
                <td>
                    <input type="radio" name="years" value="UNDER 1 YEAR" <?php if(isset($_SESSION['detail']['years'])) { if(($_SESSION['detail']['years']) == 'UNDER 1 YEAR') echo 'checked'; }?>>UNDER 1 YEAR
                    <input type="radio" name="years" value="1-2 YEARS" <?php if(isset($_SESSION['detail']['years'])) { if(($_SESSION['detail']['years']) == '1-2 YEARS') echo 'checked'; }?>>1-2 YEARS
                    <input type="radio" name="years" value="2-5 YEARS" <?php if(isset($_SESSION['detail']['years'])) { if(($_SESSION['detail']['years']) == '2-5 YEARS') echo 'checked'; }?>>2-5 YEARS
                    <input type="radio" name="years" value="5-10 YEARS" <?php if(isset($_SESSION['detail']['years'])) { if(($_SESSION['detail']['years']) == '5-10 YEARS') echo 'checked'; }?>>5-10 YEARS
                    <input type="radio" name="years" value="OVER 10 YEARS" <?php if(isset($_SESSION['detail']['years'])) { if(($_SESSION['detail']['years']) == 'OVER 10 YEARS') echo 'checked'; }?>>OVER 10 YEARS
                </td>
            </tr>
            <tr>
                <th>
                    Number of unique clients you see each week ?  
                </th>
                <td>
                    <select name="clients" id="clients">
                        <option name="1-5" <?php if(isset($_SESSION['detail']['clients'])) { if(($_SESSION['detail']['clients']) == '1-5') echo 'selected'; }?>>1-5</option>
                        <option name="6-10" <?php if(isset($_SESSION['detail']['clients'])) { if(($_SESSION['detail']['clients']) == '6-10') echo 'selected'; }?>>6-10</option>
                        <option name="11-15" <?php if(isset($_SESSION['detail']['clients'])) { if(($_SESSION['detail']['clients']) == '11-15') echo 'selected'; }?>>11-15</option>
                        <option name="15+" <?php if(isset($_SESSION['detail']['clients'])) { if(($_SESSION['detail']['clients']) == '15+') echo 'selected'; }?>>15+</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th>
                    How do you like us to get in touch with you ?
                </th>
                <td>
                    <input type="checkbox" name="Post" id='' <?php if(isset($_SESSION['detail']['Post']))  echo 'checked'; ?>>post
                    <input type="checkbox" name="Email" id=''<?php if(isset($_SESSION['detail']['Email']))  echo 'checked'; ?>>Email
                    <input type="checkbox" name="SMS" id=''<?php if(isset($_SESSION['detail']['SMS']))  echo 'checked'; ?>>SMS
                    <input type="checkbox" name="Phone" id='' <?php if(isset($_SESSION['detail']['Phone']))  echo 'checked'; ?>>Phone
                </td>
            </tr>
            <tr>
                <th>Hobbies</th>
                <td><select multiple name="hobbies[]" id="hobbies">
                    <option name="music" <?php if(isset($_SESSION['detail']['hobbies'])){ if(in_array('Listening to Music',$_SESSION['detail']['hobbies']))  echo 'selected'; }?>>Listening to Music</option>
                    <option name="travelling" <?php if(isset($_SESSION['detail']['hobbies'])){ if(in_array('Travelling',$_SESSION['detail']['hobbies']))  echo 'selected'; }?>>Travelling</option>
                    <option name="blogging" <?php if(isset($_SESSION['detail']['hobbies'])) { if(in_array('Blogging',$_SESSION['detail']['hobbies']))  echo 'selected'; }?>>Blogging</option>
                    <option name="sports" <?php if(isset($_SESSION['detail']['hobbies']))  { if(in_array('Sports',$_SESSION['detail']['hobbies']))  echo 'selected'; } ?>>Sports</option>
                    <option name="arts" <?php if(isset($_SESSION['detail']['hobbies']))  { if(in_array('Arts',$_SESSION['detail']['hobbies']))  echo 'selected'; } ?>>Arts</option>
                </select></td>
            </tr>

        </table>
        
        </fieldset>
        <input type="submit" value="Submit" name='submit'>
    </div>
    </form>
    </body>
</html>