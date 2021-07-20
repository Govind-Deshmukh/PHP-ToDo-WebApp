<!doctype html>
<html lang="en">
  <head>
    <title>ToDo (Govind Deshmukh)</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>

  <div class="container justify-content-center">
    <p style="font-weight: bold;font-size:25px;text-align:center">Create a To-do App on Php / Python where a user can create a new task, edit / update it, delete the task and mark it as complete.</p>
  </div>
      
   <div class="container" style="margin-top: 30px;">
   <?php require_once 'process.php' ?>

<?php 
$mysqli = new mysqli('localhost','root', '','billa') or die(mysqli_error($mysqli));
$result = $mysqli -> query("SELECT * FROM data") or die($mysqli->error);
// echo $result;
// pre_r($result->fetch_assoc());
?>

<div class="row justify-content-center">
  <table class="table table-bordered table-hover">
    <thead>
      <tr>
        <th style="font-weight: bold;font-size:large">Task</th>
        <th colspan="2" style="font-weight: bold;font-size:large">Options</th>
      </tr> 
    </thead>

    <?php
    while($row = $result->fetch_assoc()):  
    ?>

    <tr>
      <td><?php echo $row['task'];?></td>
      <td>
        <a href="index.php?edit=<?php echo $row['id'] ?> " class="btn btn-secondary">Edit Task</a>
        <a href="process.php?delete=<?php echo $row['id'] ?> " class="btn btn-danger">Delete Task</a>
      </td>
    </tr>

    <?php endwhile;?>

  </table>
</div>

<?php
function pre_r($array){
  echo '<pre>';
  print_r($array);
  echo '</pre>';
}
?>

  <div class="row justify-content-center" style="background-color: #E0FFFF; margin-top:100px;padding:20px">

    <form action="process.php" method="POST">
      <input type="hidden" name="id" value="<?php echo $id ?>">

      <div class="form-group">
          <label style="font-weight: bold;font-size:large">Enter Task :</label>
          <input type="text" name="todoItem" value="<?php echo $task ?>" class="form-control" placeholder="Enter Task" required>
      </div>

      <div class="form-group">
        <?php if($update == true): ?>
          <button type="submit" class="btn btn-success" name="update">Update Task</button> 
        <?php else : ?>
          <button class="btn btn-outline-primary" type="submit" name="save">Add Task</button>
        <?php endif; ?>
      </div>

    </form>

</div>

</div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>