<?php
session_start();
if (empty($_SESSION['id'])) {
    header("location: login.php");
}

$email=$_POST["email_borrado"] ?? null;

try{
    include("conexion.php");

    $datos=[];
    $sql="DELETE FROM alumno where email=:email";
    
    $datos[":email"]=$email;
    $stmt=$pdo->prepare($sql);
    $stmt->execute($datos);
    

}catch(PDOException $e){
 echo $e->getMessage();
}

?>