<?php include('db.php');

if(isset($_GET['id'])) {
$id = $_GET['id'];
$queryid = "DELETE FROM `task`  WHERE id = $id";
$result = mysqli_query($enlace, $queryid);
if (!$result) {
    die('query failed');
}
$_SESSION['message'] = 'task deleted';
$_SESSION['color'] = 'danger';
header('Location: index.php');
}

?>