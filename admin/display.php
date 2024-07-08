<?php 

session_start();
if(!isset($_SESSION['user'])){
    header("location:login.php");

}

?>

<?php

require_once('../database/connection.php');
$fetch ="SELECT * FROM crud";
$r = mysqli_query($con,$fetch);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>display</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<div class="container">
<ul style="float: left;">
            <li ><a href="admin.php"><button>back</button></a></li>
        </ul>
        <ul>
            <li><a href="addtask.php"><button>ADD TASK</button></a></li>
        </ul>
        <ul>
            <li><a href="../logout.php"><button>LOGOUT</button></a></li>
        </ul>
</div>
<div class="cont-1">
    <div class="tab">
        <table>
            <tr>
                <th>EMPLOYEE ID</th>
                <th>EMPLOYEE NAME</th>
               
                <TH >TASK</TH>
                <TH >mail</TH>
                <th>ACTIONS</th>
                <th>STATUS</th>
            </tr>
        
                <?php 
                while($row = mysqli_fetch_assoc($r)){
                    $id=$row['emp_id'];
                    $tid=$row['task_no'];
                    $ename=$row['name'];
                   
                    $work = $row['work'];
                    $mail = $row['mail'];
                    $sts = $row['status'];



                    



                    echo '<tr>
                    <td>'.$id.'</td>
                    <td>'.$ename.'</td>
                    
                   
                    <td>'.$work.'</td>
                    <td>'.$mail.'</td>
                    <td><button style="background-color:blue;color:white;"><a href="update.php?updateid='.$tid.'" style="color:white;">UPDATE</a></button>
                    <button style="background-color:red;color:white;"><a href="delete.php?deleteid='.$tid.'" style="color:white;">DELETE</a></button></td>
                    <td>'.$sts.'</td>
                    
                    </tr>';


                }
                
                    
                ?>
                   
            
        </table>
    </div>
</div>
</body>
</html>
