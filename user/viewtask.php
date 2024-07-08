<?php 

session_start();
if(!isset($_SESSION['user'])){
    header("location:login.php");

}

?>

<?php

include_once('../database/connection.php');
$mail = $_GET['mail'];
$fetch = "SELECT * FROM crud WHERE mail=?";
$stmt = mysqli_prepare($con, $fetch);
mysqli_stmt_bind_param($stmt, "s", $mail);
mysqli_stmt_execute($stmt);
$r = mysqli_stmt_get_result($stmt);



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
                <th>MAIL ID</th>
                <TH >TASK</TH>
                <th>ACTIONS</th>
                <th>STATUS</th>
            </tr>
        
                <?php 
                while($row = mysqli_fetch_array($r,MYSQLI_ASSOC)){
                    $id=$row['emp_id'];
                    $ename=$row['name'];
                    $mail= $row['mail'];
                    $work = $row['work'];
                    $tid =$row['task_no'];
                    $sts =$row['status'];



                    



                    echo '<tr>
                    <td>'.$id.'</td>
                    <td>'.$ename.'</td>
                    <td>'.$mail.'</td>
                    <td>'.$work.'</td>
                     <td><button style="background-color:blue;color:white;"><a href="view.php?taskid='.$tid.'" style="color:white;">VIEW</a></button>
                    <td>'.$sts.'</td>
                    </tr>';


                }
                
                    
                ?>
                   
            
        </table>
    </div>
</div>
</body>
</html>
