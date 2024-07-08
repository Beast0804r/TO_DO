<?php
require_once("../database/connection.php");

$sql = "SELECT * FROM register";
$r = mysqli_query($con, $sql);
/* if($r){
        echo "success";
    }else{
        echo "error";
    } */


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">

</head>

<body>
    <div class="container">
        <ul style="float: left;">
            <li><a href="../logout.php"><button>LOGOUT</button></a></li>

        </ul>
        <ul>
            <li><a href="addtask.php"><button>ADD TASK</button></a></li>
        </ul>
        <ul>
            <li><a href="register.php"><button>ADD USER</button></a></li>
        </ul>
    </div>

    <div class="cont-1">
        <div class="tab">
            <table>
                <tr>
                    <th>EMPLOYEE ID</th>
                    <th>EMPLOYEE NAME</th>
                    <TH>MAIL ID</TH>
                    <TH>DOB</TH>
                    <TH>MOBILE NUMBER</TH>
                    <th>STATUS</th>
                    <th>ACTIONS</th>
                    
                </tr>

                <?php
                /* if(isset($_GET['action'],$_GET['code'],$_GET['status']) && $_GET['action']=='delete'){
                    $user_id = $_GET['code'];
                    $status= $_GET['status'];
                    $data = array(
                        ':user_sts'  => $status,
                        /* ':user_updated_on' => get_date_time($con) */
                     /*    'user_id'      => $user_id
                    );

                    $query= "UPDATE register SET status=:user_sts where emp_id =:user_id";
                    $stmt = $con ->prepare($query);
                    
                    header("location:admin.php");
                } */
 

                while ($row = mysqli_fetch_assoc($r)) {
                    $id = $row['emp_id'];
                    $ename = $row['name'];

                    $dob = $row['dob'];
                    $mail = $row['mail'];
                    $mobile = $row['mobile'];
                    /* $sts = $row['status']; */

                    if($row['status'] == 0){
                        $sts = "Disabled";
                    }else{
                        $sts = "enabled";
                    }







                    echo '<tr>
                    <td>' . $id . '</td>
                    <td>' . $ename . '</td>
                    <td>' . $mail . '</td>
                    <td>' . $dob . '</td>
                    <td>' . $mobile . '</td>
                    <td>' . $sts . '</td>
                    <td> <button style="background-color:red;color:white;"><a href="status.php?emp_id='.$id.'&status='.$row['status'].'" style="color:white;">DELETE</a></button></td>
                    

                    
                    </tr>';
                }


                ?>


            </table>
        </div>
    </div>
    <script src="../script/script.js"></script>
</body>

</html>