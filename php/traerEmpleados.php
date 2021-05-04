<?php
session_start();
require "../conn/conn.php";

    $sqlTraerElDeHoy="SELECT * FROM `empleados`";
    $traer=$conn->prepare($sqlTraerElDeHoy);
    $traer->execute();
    $traer=$traer->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($traer);

?>