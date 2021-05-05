<?php
session_start();
require "../conn/conn.php";

    $sqlTraerMotivoEmple="SELECT `idAsis`, `motivo`, `idEmple`,nombreApellido FROM `asisemple`= a
    JOIN empleados = e ON e.idEmpleado=idEmple WHERE idAsis=:id AND `motivo`=:motivo";
    $traer=$conn->prepare($sqlTraerMotivoEmple);
    $traer->bindParam(":id",$_GET['id']);
    $traer->bindParam(":motivo",$_GET['motivo']);
    $traer->execute();
    $traer=$traer->fetchAll(PDO::FETCH_ASSOC);

/* $_SESSION['ultimoHCD']=$traer; */
echo json_encode($traer);

?>