<?php
include('db.php');
//haciendo una validacion
if (isset($_POST['save_task'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    echo $title;
    echo $description;
    //se puede mejorar
    $query = "INSERT INTO task(title, description) VALUES('$title', '$description')";
    $result = mysqli_query($enlace, $query);

    if (!$result) {
        die('Query failed');
    } 
         $_SESSION['message'] = 'Task saved';
         $_SESSION['color'] = 'success';
        header('Location: index.php');
    
}

?>