<?php
require 'calendar.html';
if(isset($_POST['getCalendar'])) {
    session_start();
    
    $name = $_FILES['calendar']['name'];
    if(!empty($_POST['monthStart']) && !empty($_POST['monthEnd'])) {
        if(!empty($name)) {
            uploadImg($name);
        }
            $monthStart = $_POST['monthStart'];
            $monthEnd = $_POST['monthEnd'];
            $_SESSION['monthStart'] = $monthStart;
            $_SESSION['monthEnd'] = $monthEnd;
    }
    else {
        if (isset($_SESSION['monthStart']) && isset($_SESSION['monthEnd'])) {
            $monthStart = $_SESSION['monthStart'];
            $monthEnd = $_SESSION['monthEnd'];
        }
        else {
            echo "<script> alert('Enter Input'); </script>";
            die;
        }

    }

    while ($monthStart <= $monthEnd) {
        getCalendar($monthStart);
        $monthStart = date('Y-m',strtotime($monthStart . '+1 month'));
    }
    
}

function getCalendar($month) {
    $dayOfWeek = array('Mon','Tue','Wed','Thu','Fri','Sat','Sun');
    $table = "<div><table border=1><caption>" . date('F, Y',strtotime($month)) . "</caption><tr>";
    for ($i = 0; $i < count($dayOfWeek); $i++) { 
        $table .= "<th>" . $dayOfWeek[$i] . "</th>";
    }
    $table .= "</tr><tr>";
    $days = cal_days_in_month(CAL_GREGORIAN, date('m', strtotime($month)), date('Y', strtotime($month)));
    $startDay = date("N", strtotime($month));
    for ($j = 1; $j < $startDay ; $j++) { 
        $table .= "<td></td>";
    }
    $i = 1;
     while ($i <= $days) {
            if(($startDay-1 + $i) % 7 == 0) {
                $table .= "<td>" . $i . "</td></tr><tr>";
            }
            else {
                $table .= "<td>" . $i . "</td>";
            }
            $i++;
        }
        $i--;
    while(($startDay-1 + $i) % 7 != 0) {
        $table .= "<td></td>";
        $i++;   
    }
        $table .= "</tr></table></div>";
        echo $table;

    }
     function uploadImg($fileName) {
             $tmp_name = $_FILES['calendar']['tmp_name'];
             $location = "uploads/";
             $type = $_FILES['calendar']['type'];
            if($type == 'image/jpeg' || $type == 'image/jpg') {
                if(!file_exists($location . $fileName)) {
                    move_uploaded_file($tmp_name, $location . $fileName);
                }
                else {
                    echo "<script> alert('File already Exists'); </script>";    
                }
                $img = "<div id='img'><img src ='" . $location . $fileName . "'></div>";
                echo $img;
            

            }
            else {
                echo "<script> alert('Image should be .jpg or .jpeg'); </script>";
                die;
            }
     }


?>