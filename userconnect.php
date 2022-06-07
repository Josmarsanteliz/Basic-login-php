<?php include('db.php'); //action es a donde lo va a enviar?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Especie de filtro</title>
    <link rel="stylesheet" href="./css/master2.css">
    <?php
 session_start(); //creaba o reanudaba la session VA A REAUNUDAR LA Yaf_Session
 if (!isset($_SESSION['usuario'])) {
   header('location:index.php');
 }
     ?>

  </head>
  <body>
   <header>
     <nav><div class="logo">
       <img src="./imgs/datadog.svg"  alt=""
       ></div>


     <ul class="menu-list">
       <li><a href="#">Our apps</a></li>
       <li><a href="#">Users</a></li>
       <li><a href="#">About us</a></li>
       <li><a href="#">Contact us</a></li>
     </ul>
     </nav>
   </header>
    <h1>Bienvenido <?php echo $_SESSION['usuario']; ?></h1>
    <p>Top secrect</p>
    <a href="cerrar.php">Cerrar sesion</a>
    <?php
echo "Hola " . $_SESSION['usuario'];
     ?>

<div class="container p-4">
<div class="row">
    <?php
    if (isset($_SESSION['message']))  {   ?>
      <div class="alert alert-<?= $_SESSION['color']?> alert-dismissible fade show" role="alert">
   <?= $_SESSION['message'] ?>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
    <?php session_unset(); } ?>
    <div class='col-md-3'>
        <div class="card card-body">
        <form action="save_tasks.php" method='post'>
            <div class="form-group">
                <input type="text" name='title' class='form-control' placeholder='Task title' autofocus>
            </div>
            <div class="form-group pt-4">
                <textarea name="description" rows="3" placeholder='description' class='form-control'></textarea>

            </div>
            <div class="d-grid gap-2 pt-4">
            <input type="submit" value="CREAR TAREA" class="btn btn-success" name='save task'>
            </div>
           
        </form>
        </div>
    </div>
    <div class='col-md-8'>
   <table class="table table-bordered">
       <thead>
           <tr>
               <th>Title</th>
               <th>Description</th>
               <th>Created</th>
               <th>Actions</th>
           </tr>
       </thead>
       <tbody>
           <?php
           $query = "SELECT * FROM task";

           $result_task = mysqli_query($enlace, $query);
           while ($row = mysqli_fetch_array($result_task)) { ?>
               <tr>
                   <td><?php echo $row['title']; ?> </td>
                   <td><?php echo $row['description']; ?> </td>
                   <td><?php echo $row['created_at']; ?> </td>
                   <td><a href="update_task.php?id=<?php echo $row['id']; ?>" class='btn btn-success me-1'>Update</a><a href="delete_task.php?id=<?php echo $row['id']; ?>" class='btn btn-danger'>Delete</a></td>
               </tr>
           <?php  }
           ?>
       </tbody>
   </table>
    </div>
</div>
</div>
  </body>
</html>
