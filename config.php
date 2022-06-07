<?php
try {
  $userbd="root";
  $passwordbd="";
  $base=new PDO("mysql:host=localhost; dbname=curso_php" , $userbd, $passwordbd);
  $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//buscar
  $sql="SELECT * FROM usuarios WHERE USERS= :user AND PASSWORDS= :password";
  $resultado=$base->prepare($sql);
  $user=htmlentities(addslashes($_POST["user"]));//convierte comillas y cosas en html
  $password=htmlentities(addslashes($_POST["password"]));
  $resultado->bindValue(":user", $user);
  $resultado->bindValue(":password", $password);
  $resultado->execute();
  $numero_registro=$resultado->rowCount();
  if ($numero_registro!=0) {
    //como evitar que sin pegar en link entre sin estar registrado, con sesiones
    session_start();
    $_SESSION['usuario']=$_POST['user'];
    header('location:userconnect.php');
  } else {
    header("location:index.php");
  }
} catch (\Exception $e) {
  die("Error: " . $e->getMessage());
}




  ?>
