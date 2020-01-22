<html>
    <head>
        <title>
            Swap Page
        </title>
    </head>
    <body>
        <form method="post">
            <label for="numberOne">Enter input 1 : </label>
            <input type="text" name="numberOne" id="numberOne"><br>
            <label for="numberTwo">Enter input 2 : </label>
            <input type="text" name="numberTwo" id="numberTwo">
            <br><input type="submit" value="Submit..." name="swapButton">
        </form>

    </body>
</html>
<?php
if(isset($_POST['swapButton']))
{
    $cnt = 0;
    $numberOne = $_POST['numberOne'];
    $numberTwo = $_POST['numberTwo'];
    if(is_numeric($numberOne) && is_numeric($numberTwo))   {
       findNumber($numberOne,$numberTwo);
    }
    else {
        echo "Invalid Number";
    }
}
?>