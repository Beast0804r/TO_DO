<?php 

session_start();
if(!isset($_SESSION['user'])){
    header("location:login.php");

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
        <ul>
            <li><a href="display.php"><button>TASKS</button></a></li>
        </ul>
        <ul>
            <li><a href="../logout.php"><button>LOGOUT</button></a></li>
        </ul>
    </div>
    <div class="cont-1">
        <div class="cont-2">
            <form action="" method="post">
                <label for="ename">EMPLOYEE NAME :</label><br>
                <input type="text" name="ename" id="ename" required><br><br>
                <label for="mail">Email :</label><br>
                <input type="email" name="mail" id="mail"><br><br>
                <label for="work">TASK:</label><br>
                <textarea name="work" id="work" cols="30" rows="5" required></textarea><br><br>
                <input type="submit" value="Submit" class="sub" name="submit">
            </form>
        </div>
    </div>
</body>
</html>

<?php 

require_once('../database/connection.php');
if(isset($_POST['submit'])){
    $ename =$_POST['ename'];
    $mail =$_POST['mail'];
    $work =$_POST['work'];
    $sql ="INSERT INTO crud(Ename,mail,work) VALUES('$ename','$mail','$work')";
    $r=mysqli_query($con,$sql);
    if($r){
        header('location:display.php');
        /* echo "connected"; */
    }else{
        echo "not connected";
    };

}


?>