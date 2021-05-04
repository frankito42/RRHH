<?php
session_start();
require "../conn/conn.php";

if(isset($_GET['fecha'])){
    $sqlTraerElDeHoy="SELECT * FROM `asistencias` WHERE `fecha`= :fecha and tipo='hdc'";
    $traer=$conn->prepare($sqlTraerElDeHoy);
    $traer->bindParam(":fecha",$_GET['fecha']);
    $traer->execute();
    $traer=$traer->fetch(PDO::FETCH_ASSOC);
}else{
    $sqlTraerElDeHoy="SELECT * FROM `asistencias` WHERE `fecha`= CURDATE() and tipo='hdc'";
    $traer=$conn->prepare($sqlTraerElDeHoy);
    $traer->execute();
    $traer=$traer->fetch(PDO::FETCH_ASSOC);
}
$_SESSION['ultimoHCD']=$traer;
echo json_encode($traer);

?>