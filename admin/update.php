<?php 

session_start();
if(!isset($_SESSION['user'])){
    header("location:../login.php");

}

?>

<?php 

require('../database/connection.php');
$id =$_GET['updateid'];

$sql ="select * from `crud` where task_no=$id";

$r =mysqli_query($con,$sql);
$row =mysqli_fetch_assoc($r);
$name =$row['name'];
$emp_id = $row['emp_id'];
$work =$row['work'];
$id =$_GET['updateid'];


if(isset($_POST['submit'])){
    $ename =$_POST['ename'];
    $id = $_POST['eid'];
    $tid = $row['task_no'];
    $work =$_POST['work'];
    $sql ="update `crud` set emp_id=$id, name='$ename', work='$work' WHERE task_no=$tid";
    $r= mysqli_query($con,$sql);
    if($r){
        header('location:display.php');
        /* echo "connected"; */
    }else{
        echo "not connected";
    };

}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<div class="container">
<ul style="float: left;">
            <li ><a href="admin.php"><button>back</button></a></li>
        </ul>
        <ul>
            <li><a href="display.php"><button>TASKS</button></a></li>
        </ul>
        <ul>
            <li><a href="logout.php"><button>LOGOUT</button></a></li>
        </ul>
    </div>
    <div class="cont-1">
        <div class="cont-2">
            <form  method="post">
                <label for="ename">EMPLOYEE ID:</label><br>
                <input type="text" name="eid" id="eid" value="<?php echo $emp_id?>"><br><br>
                <label for="ename">EMPLOYEE NAME:</label><br>
                <input type="text" name="ename" id="ename" required value="<?php  echo $name ?>"><br><br>
                
                <label for="work">TASK:</label><br>
                <textarea name="work" id="work" cols="30" rows="5"  ><?php  echo $work ?></textarea><br><br>
                <input type="submit" value="UPDATE" class="sub" name="submit">
            </form>
        </div>
    </div>
</body>
</html>

