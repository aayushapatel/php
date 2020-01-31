<!DOCTYPE html>
<html>

<head>
    <title>Grid Page</title>
</head>

<body>
    <?php 
        require 'databaseCon.php';
        $query = 'SELECT C.customer_id, C.firstName, C.lastName, CA.city, CO.value HOBB, COO.value Intouch 
        FROM `customers` C 
        LEFT JOIN `customer_address` CA ON C.customer_id = CA.customer_id 
        LEFT JOIN `customer_additional_info` CO ON C.customer_id = CO.customer_id AND CO.field_key = "Hobbies" 
        LEFT JOIN `customer_additional_info` COO ON C.customer_id = COO.customer_id AND COO.field_key = "inTouch" ';
        $result = mysqli_query($conn,$query);
        echo "<table>";
        $cnt = 0;
        while($row = mysqli_fetch_assoc($result)) {
            if($cnt != 1) {
                foreach ($row as $key => $value ) {
                    echo "<th>".$key."</th>";
                } 
                $cnt++; 
            }
            echo "<tr>";
            foreach ($row as $field ) {
                echo "<td>".$field."</td>";
            }
            echo '<td><a href="http://localhost/xampp/php/jan-30/form.php?id='.$row['customer_id'].'">Edit</a></td>';
            echo '<td><a href="http://localhost/xampp/php/jan-30/delete.php?id='.$row['customer_id'].'">Delete</a></td>';
            echo "</tr>";
        }
        echo "</table>";
    ?>
</body>

</html>