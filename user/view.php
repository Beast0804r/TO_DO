<?php 

session_start();
if(!isset($_SESSION['user'])){
    header("location:../login.php");

}

?>

<?php 

require('../database/connection.php');




// Fetch task ID from GET parameter
$id = $_GET['taskid'];

// Retrieve task details from database
$sql = "SELECT * FROM `crud` WHERE task_no=?";
$stmt = mysqli_prepare($con, $sql);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$r = mysqli_stmt_get_result($stmt);
$row = mysqli_fetch_assoc($r);
$name =$row['name'];
$emp_id = $row['emp_id'];
$work =$row['work'];
$id =$_GET['taskid'];
$mail=$row['mail'];

// Check if form submitted
if(isset($_POST['submit'])) {
    // Retrieve status value from POST
    $sts = $_POST['sts'];

    // Update status in the database
    $tid = $row['task_no'];
    $sql = "UPDATE `crud` SET status=? WHERE task_no=?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "si", $sts, $tid);
    $r = mysqli_stmt_execute($stmt);

    if($r) {
        // Redirect to viewtask.php after successful update
        header("location: viewtask.php?mail=$mail");
        exit; // Ensure script stops executing after redirection
    } else {
        echo "Error updating status: " . mysqli_error($con);
    }
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
            <li ><a href='viewtask.php?mail=<?php echo $mail?>'><button>back</button></a></li>
        </ul>
        
        <ul>
            <li><a href="../logout.php"><button>LOGOUT</button></a></li>
        </ul>
    </div>
    <div class="cont-1">
        <div class="cont-2">
            <form  method="post">
                <label for="ename">EMPLOYEE ID:</label><br>
                <input type="text" name="eid" id="eid" value="<?php echo $emp_id?>" readonly><br><br>
                
                
                <label for="work">TASK:</label><br>
                <textarea name="work" id="work" cols="30" rows="5"  readonly><?php  echo $work ?></textarea><br><br>
                <label for="">progress</label>
                <input type="radio" name="sts" id="progress" value="in-progress">
                <label for="">completed</label>
                <input type="radio" name="sts" id="completed" value="completed"><br><br>
                <input type="submit" value="SUBMIT" class="sub" name="submit">
            </form>
        </div>
    </div>
</body>
</html>

