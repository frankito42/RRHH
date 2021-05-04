<?php
require "../conn/conn.php";
$arrayHDC=$_POST['hdc'];
$hdc="hdc";

/* INSERTO UNA ENTRADA O FACTURA DE PRUDUSCTOS A INGRESAR */
$sqlAddAgentesMunicipales="INSERT INTO `asistencias`(`efectivos`, `presentes`,
                                                    `ausentes`, `a`,
                                                     `la`, `at`, `matr`, `est`,
                                                      `nac`, `lea`, `lef`, `exam`, `lact`,
                                                       `lf`, `hc`, `matern`, `rp`, `dons`, `jt`,
                                                        `li`, `mo`, `susp`, `lee6m`, `lee1a`
                                                        ,`d538`, `cvp`, `aislce`,
                                                          `ticp`, `fecha`, `tipo`,postCovidPos,fallecimientoCovid) VALUES 
                                                          (:efectivos,
                                                          :presentes,
                                                          :ausentes,
                                                          :a,
                                                          :la,
                                                          :at,
                                                          :matr,
                                                          :est,
                                                          :nac,
                                                          :lea,
                                                          :lef,
                                                          :exam,
                                                          :lact,
                                                          :lf,
                                                          :hc,
                                                          :matern,
                                                          :rp,
                                                          :dons,
                                                          :jt,
                                                          :li,
                                                          :mo,
                                                          :susp,
                                                          :lee6m,
                                                          :lee1a,
                                                          :d538,
                                                          :cvp,
                                                          :aislce,
                                                          :ticp,
                                                          :fecha,
                                                          :tipo,
                                                          :pos,
                                                          :falle)";
$add=$conn->prepare($sqlAddAgentesMunicipales);
$add->bindParam(":efectivos",$arrayHDC[1]);
$add->bindParam(":presentes",$arrayHDC[2]);
$add->bindParam(":ausentes",$arrayHDC[3]);
$add->bindParam(":a",$arrayHDC[4]);
$add->bindParam(":la",$arrayHDC[5]);
$add->bindParam(":at",$arrayHDC[6]);
$add->bindParam(":matr",$arrayHDC[7]);
$add->bindParam(":est",$arrayHDC[8]);
$add->bindParam(":nac",$arrayHDC[9]);
$add->bindParam(":lea",$arrayHDC[10]);
$add->bindParam(":lef",$arrayHDC[11]);
$add->bindParam(":exam",$arrayHDC[12]);
$add->bindParam(":lact",$arrayHDC[13]);
$add->bindParam(":lf",$arrayHDC[14]);
$add->bindParam(":hc",$arrayHDC[15]);
$add->bindParam(":matern",$arrayHDC[16]);
$add->bindParam(":rp",$arrayHDC[17]);
$add->bindParam(":dons",$arrayHDC[18]);
$add->bindParam(":jt",$arrayHDC[19]);
$add->bindParam(":li",$arrayHDC[20]);
$add->bindParam(":mo",$arrayHDC[21]);
$add->bindParam(":susp",$arrayHDC[22]);
$add->bindParam(":lee6m",$arrayHDC[23]);
$add->bindParam(":lee1a",$arrayHDC[24]);
$add->bindParam(":d538",$arrayHDC[25]);
$add->bindParam(":cvp",$arrayHDC[26]);
$add->bindParam(":aislce",$arrayHDC[27]);
$add->bindParam(":ticp",$arrayHDC[30]);
$add->bindParam(":fecha",$arrayHDC[0]);
$add->bindParam(":tipo",$hdc);
$add->bindParam(":pos",$arrayHDC[28]);
$add->bindParam(":falle",$arrayHDC[29]);
if($add->execute()){
    header("location:../index.php");
}
?>