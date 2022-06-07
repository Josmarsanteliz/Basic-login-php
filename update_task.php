<?php include('db.php');
if (isset($_GET['id'])) {
  $id= $_GET['id'];

  $query = "SELECT * FROM task WHERE id = $id";
  $result = mysqli_query($enlace, $query);

  if (mysqli_num_rows($result) == 1) {
      $row = mysqli_fetch_array($result);
      $title = $row['title'];
      $description = $row['description'];
  }
}

//nombre del boton lol
if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $title = $_POST['title'];
  $description = $_POST['description'];
  
  $query = "UPDATE task set title = '$title', description='$description' WHERE id = $id";
  mysqli_query($enlace, $query);
  $_SESSION['message'] = 'Task updated successfully';
  $_SESSION['color'] = 'info';
  header('Location: index.php');
}
?>

<?php include('includes/header.php') ?>
<div class="container">
  <div class="col-md-4">
    <div class="card card-body">
      <form action="update_task.php?id=<?php echo $_GET['id']; ?>" method="post">
        <div class="form-group pt-4">
          <input type="text" value="<?php echo $title ?>" class="form-control" name='title'>
        </div>
        <div class="form-group pt-4">
          <textarea name="description" rows="2" placeholder="Update description" class='form-control'><?php echo $description ?></textarea>
        </div>
        <div class="form-group pt-4">
        <button type="submit" class="btn btn-success" name="update">Update</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php include('includes/footer.php') ?>