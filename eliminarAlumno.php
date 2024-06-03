<?php
session_start();
if (empty($_SESSION['id'])) {
    header("location: login.php");
}

$email=$_POST["email_borrado"] ?? null;

try{
    include("conexion.php");

    $datos=[];
    $sql="DELETE FROM alumno where email='$email'";
    
    $stmt=$pdo->prepare($sql);
    $stmt->execute($datos);
    header("location: datosAlumnosTutor.php");

}catch(PDOException $e){
 echo $e->getMessage();
}

?>