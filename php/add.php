<?php
require "../conn/conn.php";

$arrayDeFormAgentesMunicipales=$_POST['muni'];
$tipo="muni";

/* INSERTO UNA ENTRADA O FACTURA DE PRUDUSCTOS A INGRESAR */
$sqlAddAgentesMunicipales="INSERT INTO `asistencias`(`efectivos`, `presentes`,
                                                    `ausentes`, `a`,
                                                     `la`, `at`, `matr`, `est`,
                                                      `nac`, `lea`, `lef`, `exam`, `lact`,
                                                       `lf`, `hc`, `matern`, `rp`, `dons`, `jt`,
                                                        `li`, `mo`, `susp`, `lee6m`, `lee1a`,
                                                         `adsc`, `lp`, `d538`, `cvp`, `aislce`,
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
                                                          :adsc,
                                                          :lp,
                                                          :d538,
                                                          :cvp,
                                                          :aislce,
                                                          :ticp,
                                                          :fecha,
                                                          :tipo,
                                                          :pos,
                                                          :falle)";
$add=$conn->prepare($sqlAddAgentesMunicipales);
$add->bindParam(":efectivos",$arrayDeFormAgentesMunicipales[1]);
$add->bindParam(":presentes",$arrayDeFormAgentesMunicipales[2]);
$add->bindParam(":ausentes",$arrayDeFormAgentesMunicipales[3]);
$add->bindParam(":a",$arrayDeFormAgentesMunicipales[4]);
$add->bindParam(":la",$arrayDeFormAgentesMunicipales[5]);
$add->bindParam(":at",$arrayDeFormAgentesMunicipales[6]);
$add->bindParam(":matr",$arrayDeFormAgentesMunicipales[7]);
$add->bindParam(":est",$arrayDeFormAgentesMunicipales[8]);
$add->bindParam(":nac",$arrayDeFormAgentesMunicipales[9]);
$add->bindParam(":lea",$arrayDeFormAgentesMunicipales[10]);
$add->bindParam(":lef",$arrayDeFormAgentesMunicipales[11]);
$add->bindParam(":exam",$arrayDeFormAgentesMunicipales[12]);
$add->bindParam(":lact",$arrayDeFormAgentesMunicipales[13]);
$add->bindParam(":lf",$arrayDeFormAgentesMunicipales[14]);
$add->bindParam(":hc",$arrayDeFormAgentesMunicipales[15]);
$add->bindParam(":matern",$arrayDeFormAgentesMunicipales[16]);
$add->bindParam(":rp",$arrayDeFormAgentesMunicipales[17]);
$add->bindParam(":dons",$arrayDeFormAgentesMunicipales[18]);
$add->bindParam(":jt",$arrayDeFormAgentesMunicipales[19]);
$add->bindParam(":li",$arrayDeFormAgentesMunicipales[20]);
$add->bindParam(":mo",$arrayDeFormAgentesMunicipales[21]);
$add->bindParam(":susp",$arrayDeFormAgentesMunicipales[22]);
$add->bindParam(":lee6m",$arrayDeFormAgentesMunicipales[23]);
$add->bindParam(":lee1a",$arrayDeFormAgentesMunicipales[24]);
$add->bindParam(":adsc",$arrayDeFormAgentesMunicipales[25]);
$add->bindParam(":lp",$arrayDeFormAgentesMunicipales[26]);
$add->bindParam(":d538",$arrayDeFormAgentesMunicipales[27]);
$add->bindParam(":cvp",$arrayDeFormAgentesMunicipales[28]);
$add->bindParam(":aislce",$arrayDeFormAgentesMunicipales[29]);
$add->bindParam(":ticp",$arrayDeFormAgentesMunicipales[32]);
$add->bindParam(":fecha",$arrayDeFormAgentesMunicipales[0]);
$add->bindParam(":tipo",$tipo);
$add->bindParam(":pos",$arrayDeFormAgentesMunicipales[30]);
$add->bindParam(":falle",$arrayDeFormAgentesMunicipales[31]);
if($add->execute()){
    header("location:../index.php");
}
?>