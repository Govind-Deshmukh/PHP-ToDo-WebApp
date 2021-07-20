<?php

session_start();

$id = 0;
$update = false;
$task = '';

$mysqli = new mysqli('localhost','root', '','billa') or die(mysqli_error($mysqli));

if (isset($_POST['save'])){
    $task = $_POST['todoItem'];

    $mysqli -> query("INSERT INTO data (task) VALUES('$task')") or die($mysqli -> error);

    header('Location: index.php');
}

if (isset($_GET['delete'])){
    $id = $_GET['delete'];

    $mysqli -> query("DELETE FROM data WHERE id=$id") or die($mysqli -> error);

    header('Location: index.php');
}


if (isset($_GET['edit'])){
    $id = $_GET['edit'];
    $update = true;
    $result = $mysqli -> query("SELECT * FROM data WHERE id = $id") or die($mysqli-> error); 


    if(count($result) == 1){
        $row = $result -> fetch_array();
        $task = $row['task'];
    }

    // $_SESSION['message'] = "Task deleted from ToDoList";
    // $_SESSION['msg_type'] = "danger";

    header('Location: index.php');
}

?>


<?php 
   
   if(isset($_SESSION['message'])): ?>

   <div class="alert alert-<?=$_SESSION['msg_type']?>">

        <?php 
        echo $_SESSION['message'];
        unset( $_SESSION['message']);
        
        ?>
   </div>
<?php endif ?>


