<?php 
session_start();
if(!isset($_SESSION['user'])){
    header("location:Login/index.html");
}
 
?> 
<!DOCTYPE html>
<html lang="es"> 
<head>   
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--     <link rel="stylesheet" href="mdb/css/bootstrap.min.css">
    <link rel="stylesheet" href="mdb/css/mdb.min.css"> -->
    <link rel="stylesheet" href="mdb/css/all.min.css">
    <link rel="stylesheet" href="js/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
 

    <title>Inicio</title>
</head>
<body>
    <section>
      

        <!-- Dropdown Structure -->
<ul id="dropdown1" class="dropdown-content">
  <li><a href="#!">Uno</a></li>
  <li><a href="#!">Dos</a></li>
  <li class="divider"></li>
  <li><a href="Login/php/logout.php">Cerrar sesion</a></li>
</ul>
<nav style="background:#2196f3;">
  <div class="nav-wrapper"> 
    <a href="#!" class="brand-logo"><i class="material-icons dp48">people</i>Asistencias</a>
    <ul class="right hide-on-med-and-down">
     <!--  <li><a href="sass.html">Sass</a></li>
      <li><a href="badges.html">Components</a></li> -->
      <!-- Dropdown Trigger -->
      <li><a class="dropdown-trigger" href="#!" data-target="dropdown1"><i class="material-icons left">person</i><?php echo $_SESSION['user']['user']?><i class="material-icons right">arrow_drop_down</i></a></li>
    </ul>
  </div>
</nav>
    </section>
    <section>
      <div class="container">
        <div class="row">



                <div class="input-field col">
                  <a style="background:#1e88e5;" class="waves-effect waves-light btn modal-trigger btn-large" href="#modal2">Municipales</a>
                  <a style="background:#f45da9;" class="waves-effect waves-light btn modal-trigger btn-large" href="#modal1">Agentes HCD</a>
                  
                </div>
                <div class="input-field col s12">
                  <input type="text" id="fecha" class="datepicker">
                  <label for="fecha">Elige la fecha</label>
                </div>

        </div>
          <div id="tabla">
          </div>   
          <hr>
          <div id="tablaHCD">
          </div>   
        </div>
      </div>
    </section>
    
</body>
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- Extra large modal -->
        
        <div id="modal2" class="modal">
    <div class="modal-content">
      <h4 style="background: #1976d2;padding: 1%;color: white;border-radius: 2px;">Agentes Municipales</h4>
      <form id="formulario2" action="php/add.php" method="post">
        <div class="table-responsive">
            <table class="table table-bordered table-sm highlight">
              
              <tbody>
                <tr>
                  <th scope="row">FECHA</th>
                  <!-- <td>Fecha</td> -->
                  <td style="width: ;padding: 0px !important;" colspan="2"><input required name="muni[]" placeholder="Seleccione la fecha" id="fechaM" class="form-control datepicker" type="text"></td>
                </tr>
                <tr>
                  <th scope="row">E</th>
               <!--    <td>Efectivos</td> -->
                  <td style="width: ;padding: 0px !important;"><input required name="muni[]" id="efectivosMuni" placeholder="......" class="form-control" type="number"></td>
                  <td style="width: ;padding: -2px !important;">
                      <a class="AbrirModalAddMuni waves-effect waves-light btn modal-trigger" href="#modalEmpleadosMunicipales">Add municipal</a>
                  </td>
                </tr>
                <tr>
                  <th scope="row">P</th>
                  <!-- <td>Presentes</td> -->
                  <td style="width: ;padding: 0px !important;"><input required name="muni[]" placeholder="......" class="form-control" type="number"></td>
                  <td style="width: ;padding: -2px !important;">
                      <a class="AbrirModalAddMuni waves-effect waves-light btn modal-trigger" href="#modalEmpleadosMunicipales">Add municipal</a>
                  </td>
                </tr>
                <tr>
                  <th scope="row">A</th>
                  <!-- <td>Ausentes</td> -->
                  <td style="width: ;padding: 0px !important;"><input required name="muni[]" placeholder="......" class="form-control" type="number"></td>
                  <td style="width: ;padding: -2px !important;">
                      <a class="AbrirModalAddMuni waves-effect waves-light btn modal-trigger" href="#modalEmpleadosMunicipales">Add municipal</a>
                  </td>
                </tr>
                <tr>
                  <th scope="row">A IN</th>
                  <!-- <td>Ausente injustificado</td> -->
                  <td style="width: ;padding: 0px !important;"><input required name="muni[]" placeholder="......" class="form-control" type="number"></td>
                  <td style="width: ;padding: -2px !important;">
                      <a class="AbrirModalAddMuni waves-effect waves-light btn modal-trigger" href="#modalEmpleadosMunicipales">Add municipal</a>
                  </td>
                </tr>
                <tr>
                  <th scope="row">LA</th>
                  <!-- <td>Licencia anual</td> -->
                  <td style="width: ;padding: 0px !important;"><input required name="muni[]" placeholder="......" class="form-control" type="number"></td>
                  <td style="width: ;padding: -2px !important;">
                      <a class="AbrirModalAddMuni waves-effect waves-light btn modal-trigger" href="#modalEmpleadosMunicipales">Add municipal</a>
                  </td>
                </tr>
                <tr>
                  <th scope="row">AT</th>
               <!--    <td>Accidente de trabajo</td> -->
                  <td style="width: ;padding: 0px !important;"><input required name="muni[]" placeholder="......" class="form-control" type="number"></td>
                  <td style="width: ;padding: -2px !important;">
                      <a class="AbrirModalAddMuni waves-effect waves-light btn modal-trigger" href="#modalEmpleadosMunicipales">Add municipal</a>
                  </td>
                </tr>
                <tr>
                  <th scope="row">MATR</th>
                  <!-- <td>Matrimonio agente</td> -->
                  <td style="width: ;padding: 0px !important;"><input required name="muni[]" placeholder="......" class="form-control" type="number"></td>
                  <td style="width: ;padding: -2px !important;">
                      <a class="AbrirModalAddMuni waves-effect waves-light btn modal-trigger" href="#modalEmpleadosMunicipales">Add municipal</a>
                  </td>
                </tr>
                <tr>
                  <th scope="row">EST</th>
                  <!-- <td>Estudio</td> -->
                  <td style="width: ;padding: 0px !important;"><input required name="muni[]" placeholder="......" class="form-control" type="number"></td>
                  <td style="width: ;padding: -2px !important;">
                      <a class="AbrirModalAddMuni waves-effect waves-light btn modal-trigger" href="#modalEmpleadosMunicipales">Add municipal</a>
                  </td>
                </tr>
                <tr>
                  <th scope="row">NAC</th>
                  <!-- <td>Nacimiento hijo</td> -->
                  <td style="width: ;padding: 0px !important;"><input required name="muni[]" placeholder="......" class="form-control" type="number"></td>
                  <td style="width: ;padding: -2px !important;">
                      <a class="AbrirModalAddMuni waves-effect waves-light btn modal-trigger" href="#modalEmpleadosMunicipales">Add municipal</a>
                  </td>
                </tr>
                <tr>
                  <th scope="row">LEA</th>
                 <!--  <td>Enfermedad agente</td> -->
                  <td style="width: ;padding: 0px !important;"><input required name="muni[]" placeholder="......" class="form-control" type="number"></td>
                  <td style="width: ;padding: -2px !important;">
                      <a class="AbrirModalAddMuni waves-effect waves-light btn modal-trigger" href="#modalEmpleadosMunicipales">Add municipal</a>
                  </td>
                </tr>
                <tr>
                  <th scope="row">LEF</th>
                 <!--  <td>Atencion familiar</td> -->
                  <td style="width: ;padding: 0px !important;"><input required name="muni[]" placeholder="......" class="form-control" type="number"></td>
                  <td style="width: ;padding: -2px !important;">
                      <a class="AbrirModalAddMuni waves-effect waves-light btn modal-trigger" href="#modalEmpleadosMunicipales">Add municipal</a>
                  </td>
                </tr>
                <tr>
                  <th scope="row">EXAM</th>
                  <!-- <td>Examenes</td> -->
                  <td style="width: ;padding: 0px !important;"><input required name="muni[]" placeholder="......" class="form-control" type="number"></td>
                  <td style="width: ;padding: -2px !important;">
                      <a class="AbrirModalAddMuni waves-effect waves-light btn modal-trigger" href="#modalEmpleadosMunicipales">Add municipal</a>
                  </td>
                </tr>
                <tr>
                  <th scope="row">LACT</th>
                  <!-- <td>Lactancia o alimentacion</td> -->
                  <td style="width: ;padding: 0px !important;"><input required name="muni[]" placeholder="......" class="form-control" type="number"></td>
                  <td style="width: ;padding: -2px !important;">
                      <a class="AbrirModalAddMuni waves-effect waves-light btn modal-trigger" href="#modalEmpleadosMunicipales">Add municipal</a>
                  </td>
                </tr>
                <tr>
                  <th scope="row">LF</th>
                  <!-- <td>Fallecimiento</td> -->
                  <td style="width: ;padding: 0px !important;"><input required name="muni[]" placeholder="......" class="form-control" type="number"></td>
                  <td style="width: ;padding: -2px !important;">
                      <a class="AbrirModalAddMuni waves-effect waves-light btn modal-trigger" href="#modalEmpleadosMunicipales">Add municipal</a>
                  </td>
                </tr>
                <tr>
                  <th scope="row">HC</th>
                  <!-- <td>Historia clinica</td> -->
                  <td style="width: ;padding: 0px !important;"><input required name="muni[]" placeholder="......" class="form-control" type="number"></td>
                  <td style="width: ;padding: -2px !important;">
                      <a class="AbrirModalAddMuni waves-effect waves-light btn modal-trigger" href="#modalEmpleadosMunicipales">Add municipal</a>
                  </td>
                </tr>
                <tr>
                  <th scope="row">MATERN</th>
                  <!-- <td>Maternidad</td> -->
                  <td style="width: ;padding: 0px !important;"><input required name="muni[]" placeholder="......" class="form-control" type="number"></td>
                  <td style="width: ;padding: -2px !important;">
                      <a class="AbrirModalAddMuni waves-effect waves-light btn modal-trigger" href="#modalEmpleadosMunicipales">Add municipal</a>
                  </td>
                </tr>
                <tr>
                  <th scope="row">RP</th>
                  <!-- <td>Razones particulares</td> -->
                  <td style="width: ;padding: 0px !important;"><input required name="muni[]" placeholder="......" class="form-control" type="number"></td>
                  <td style="width: ;padding: -2px !important;">
                      <a class="AbrirModalAddMuni waves-effect waves-light btn modal-trigger" href="#modalEmpleadosMunicipales">Add municipal</a>
                  </td>
                </tr>
                <tr>
                  <th scope="row">DONS</th>
                  <!-- <td>Donaciones de sangre</td> -->
                  <td style="width: ;padding: 0px !important;"><input required name="muni[]" placeholder="......" class="form-control" type="number"></td>
                  <td style="width: ;padding: -2px !important;">
                      <a class="AbrirModalAddMuni waves-effect waves-light btn modal-trigger" href="#modalEmpleadosMunicipales">Add municipal</a>
                  </td>
                </tr>
                <tr>
                  <th scope="row">JT</th>
                  <!-- <td>Jubilacion transitoria</td> -->
                  <td style="width: ;padding: 0px !important;"><input required name="muni[]" placeholder="......" class="form-control" type="number"></td>
                  <td style="width: ;padding: -2px !important;">
                      <a class="AbrirModalAddMuni waves-effect waves-light btn modal-trigger" href="#modalEmpleadosMunicipales">Add municipal</a>
                  </td>
                </tr>
                <tr>
                  <th scope="row">LI</th>
                  <!-- <td>Licencia invernal</td> -->
                  <td style="width: ;padding: 0px !important;"><input required name="muni[]" placeholder="......" class="form-control" type="number"></td>
                  <td style="width: ;padding: -2px !important;">
                      <a class="AbrirModalAddMuni waves-effect waves-light btn modal-trigger" href="#modalEmpleadosMunicipales">Add municipal</a>
                  </td>
                </tr>
                <tr> 
                  <th scope="row">MO</th>
                  <!-- <td>Mision oficial</td> -->
                  <td style="width: ;padding: 0px !important;"><input required name="muni[]" placeholder="......" class="form-control" type="number"></td>
                  <td style="width: ;padding: -2px !important;">
                      <a class="AbrirModalAddMuni waves-effect waves-light btn modal-trigger" href="#modalEmpleadosMunicipales">Add municipal</a>
                  </td>
                </tr>
                <tr>
                  <th scope="row">SUSP</th>
                 <!--  <td>Suspension</td> -->
                  <td style="width: ;padding: 0px !important;"><input required name="muni[]" placeholder="......" class="form-control" type="number"></td>
                  <td style="width: ;padding: -2px !important;">
                      <a class="AbrirModalAddMuni waves-effect waves-light btn modal-trigger" href="#modalEmpleadosMunicipales">Add municipal</a>
                  </td>
                </tr>
                <tr>
                  <th scope="row">LEE6M</th>
                  <!-- <td>Lic. Esp. Extr./6meses sin goce de haberes</td> -->
                  <td style="width: ;padding: 0px !important;"><input required name="muni[]" placeholder="......" class="form-control" type="number"></td>
                  <td style="width: ;padding: -2px !important;">
                      <a class="AbrirModalAddMuni waves-effect waves-light btn modal-trigger" href="#modalEmpleadosMunicipales">Add municipal</a>
                  </td>
                </tr>
                <tr>
                  <th scope="row">LEE1A</th>
                  <!-- <td>Lic. Esp. Extr./1año</td> -->
                  <td style="width: ;padding: 0px !important;"><input required name="muni[]" placeholder="......" class="form-control" type="number"></td>
                  <td style="width: ;padding: -2px !important;">
                      <a class="AbrirModalAddMuni waves-effect waves-light btn modal-trigger" href="#modalEmpleadosMunicipales">Add municipal</a>
                  </td>
                </tr>
                <tr>
                  <th scope="row">ADSC</th>
                 <!--  <td>Municipales adscriptos</td> -->
                  <td style="width: ;padding: 0px !important;"><input required name="muni[]" placeholder="......" class="form-control" type="number"></td>
                  <td style="width: ;padding: -2px !important;">
                      <a class="AbrirModalAddMuni waves-effect waves-light btn modal-trigger" href="#modalEmpleadosMunicipales">Add municipal</a>
                  </td>
                </tr>
                <tr>
                  <th scope="row">LP</th>
                 <!--  <td>Licencia politica</td> -->
                  <td style="width: ;padding: 0px !important;"><input required name="muni[]" placeholder="......" class="form-control" type="number"></td>
                  <td style="width: ;padding: -2px !important;">
                      <a class="AbrirModalAddMuni waves-effect waves-light btn modal-trigger" href="#modalEmpleadosMunicipales">Add municipal</a>
                  </td>
                </tr>
                <tr>
                  <th scope="row">D.538</th>
                  <!-- <td>Autorizado decreto 538/20</td> -->
                  <td style="width: ;padding: 0px !important;"><input required name="muni[]" placeholder="......" class="form-control" type="number"></td>
                  <td style="width: ;padding: -2px !important;">
                      <a class="AbrirModalAddMuni waves-effect waves-light btn modal-trigger" href="#modalEmpleadosMunicipales">Add municipal</a>
                  </td>
                </tr>
                <tr>
                  <th scope="row">CV+</th>
                  <!-- <td>Covid positivo</td> -->
                  <td style="width: ;padding: 0px !important;"><input required name="muni[]" placeholder="......" class="form-control" type="number"></td>
                  <td style="width: ;padding: -2px !important;">
                      <a class="AbrirModalAddMuni waves-effect waves-light btn modal-trigger" href="#modalEmpleadosMunicipales">Add municipal</a>
                  </td>
                </tr>
                <tr>
                  <th scope="row">AISL/C.E</th>
                  <!-- <td>Aislado contacto estrecho</td> -->
                  <td style="width: ;padding: 0px !important;"><input required name="muni[]" placeholder="......" class="form-control" type="number"></td>
                  <td style="width: ;padding: -2px !important;">
                      <a class="AbrirModalAddMuni waves-effect waves-light btn modal-trigger" href="#modalEmpleadosMunicipales">Add municipal</a>
                  </td>
                </tr>
                <tr>
                  <th scope="row">POST COVID+</th>
                 <!--  <td>Post covid positivo</td> -->
                  <td style="width: ;padding: 0px !important;"><input required name="muni[]" placeholder="......" class="form-control" type="number"></td>
                  <td style="width: ;padding: -2px !important;">
                      <a class="AbrirModalAddMuni waves-effect waves-light btn modal-trigger" href="#modalEmpleadosMunicipales">Add municipal</a>
                  </td>
                </tr>
                <tr>
                  <th scope="row">FALLECIMIENTO COVID</th>
                  <!-- <td>Fallecimiento covid</td> -->
                  <td style="width: ;padding: 0px !important;"><input required name="muni[]" placeholder="......" class="form-control" type="number"></td>
                  <td style="width: ;padding: -2px !important;">
                      <a class="AbrirModalAddMuni waves-effect waves-light btn modal-trigger" href="#modalEmpleadosMunicipales">Add municipal</a>
                  </td>
                </tr>
                <tr>
                  <th scope="row">TICE</th>
                  <!-- <td>Total inactivos covid ejecutivo</td> -->
                  <td style="width: ;padding: 0px !important;"><input required name="muni[]" placeholder="......" class="form-control" type="number"></td>
                  <td style="width: ;padding: -2px !important;">
                      <a class="AbrirModalAddMuni waves-effect waves-light btn modal-trigger" href="#modalEmpleadosMunicipales">Add municipal</a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="modal-footer">
          <button style="background: #f55252;" type="button" class="btn modal-close waves-effect waves-light" data-dismiss="modal">Cerrar</button>
          <button style="background: #1976d2;" type="submit" class="btn btn-success waves-effect waves-light">Guardar</button>
        </div>
        </form>
    </div>
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- Extra large modal -->


<div id="modal1" class="modal">
    <div class="modal-content">
      <h4 style="background: #f45da9;padding: 1%;color: white;border-radius: 2px;">Agentes HCD</h4>
      <form action="php/addHCD.php" id="formulario1" method="post">
        <div class="table-responsive">
            <table class="table table-bordered table-sm highlight">
              <tbody>
                <tr>
                  <th scope="row">F</th>
                 <!--  <td>Fecha</td> -->
                  <td style="width: ;padding: 0px !important;" colspan="2"><input required name="hdc[]" placeholder="Seleccione la fecha" id="fechaH" class="form-control datepicker" type="text"></td>


                </tr>
                <tr>
                <tr>
                  <th scope="row">E</th>
                  <!-- <td>Efectivos</td> -->
                  <td style="width: ;padding: 0px !important;"><input required name="hdc[]" id="efectivosHcd" placeholder="......" class="form-control" type="number"></td>
                  <td style="width: ;padding: -2px !important;">
                      <a class="AbrirModalAdd waves-effect waves-light btn modal-trigger" href="#modalEmpleados">Add HCD</a>
                  </td>
                </tr>
                <tr>
                  <th scope="row">P</th>
                  <!-- <td>Presentes</td> -->
                  <td style="width: ;padding: 0px !important;"><input required name="hdc[]" placeholder="......" class="form-control" type="number"></td>
                  <td style="width: ;padding: -2px !important;">
                      <a class="AbrirModalAdd waves-effect waves-light btn modal-trigger" href="#modalEmpleados">Add HCD</a>
                  </td>
                </tr>
                <tr>
                  <th scope="row">A</th>
                 <!--  <td>Ausentes</td> -->
                  <td style="width: ;padding: 0px !important;"><input required name="hdc[]" placeholder="......" class="form-control" type="number"></td>
                  <td style="width: ;padding: -2px !important;">
                      <a class="AbrirModalAdd waves-effect waves-light btn modal-trigger" href="#modalEmpleados">Add HCD</a>
                  </td>
                </tr>
                <tr>
                  <th scope="row">A IN</th>
                 <!--  <td>Ausente injustificado</td> -->
                  <td style="width: ;padding: 0px !important;"><input required name="hdc[]" placeholder="......" class="form-control" type="number"></td>
                  <td style="width: ;padding: -2px !important;">
                      <a class="AbrirModalAdd waves-effect waves-light btn modal-trigger" href="#modalEmpleados">Add HCD</a>
                  </td>
                </tr>
                <tr>
                  <th scope="row">LA</th>
                  <!-- <td>Licencia anual</td> -->
                  <td style="width: ;padding: 0px !important;"><input required name="hdc[]" placeholder="......" class="form-control" type="number"></td>
                  <td style="width: ;padding: -2px !important;">
                      <a class="AbrirModalAdd waves-effect waves-light btn modal-trigger" href="#modalEmpleados">Add HCD</a>
                  </td>
                </tr>
                <tr>
                  <th scope="row">AT</th>
                  <!-- <td>Accidente de trabajo</td> -->
                  <td style="width: ;padding: 0px !important;"><input required name="hdc[]" placeholder="......" class="form-control" type="number"></td>
                  <td style="width: ;padding: -2px !important;">
                      <a class="AbrirModalAdd waves-effect waves-light btn modal-trigger" href="#modalEmpleados">Add HCD</a>
                  </td>
                </tr>
                <tr>
                  <th scope="row">MATR</th>
                  <!-- <td>Matrimonio agente</td> -->
                  <td style="width: ;padding: 0px !important;"><input required name="hdc[]" placeholder="......" class="form-control" type="number"></td>
                  <td style="width: ;padding: -2px !important;">
                      <a class="AbrirModalAdd waves-effect waves-light btn modal-trigger" href="#modalEmpleados">Add HCD</a>
                  </td>
                </tr>
                <tr>
                  <th scope="row">EST</th>
                  <!-- <td>Estudio</td> -->
                  <td style="width: ;padding: 0px !important;"><input required name="hdc[]" placeholder="......" class="form-control" type="number"></td>
                  <td style="width: ;padding: -2px !important;">
                      <a class="AbrirModalAdd waves-effect waves-light btn modal-trigger" href="#modalEmpleados">Add HCD</a>
                  </td>
                </tr>
                <tr>
                  <th scope="row">NAC</th>
                  <!-- <td>Nacimiento hijo</td> -->
                  <td style="width: ;padding: 0px !important;"><input required name="hdc[]" placeholder="......" class="form-control" type="number"></td>
                  <td style="width: ;padding: -2px !important;">
                      <a class="AbrirModalAdd waves-effect waves-light btn modal-trigger" href="#modalEmpleados">Add HCD</a>
                  </td>
                </tr>
                <tr>
                  <th scope="row">LEA</th>
                 <!--  <td>Enfermedad agente</td> -->
                  <td style="width: ;padding: 0px !important;"><input required name="hdc[]" placeholder="......" class="form-control" type="number"></td>
                  <td style="width: ;padding: -2px !important;">
                      <a class="AbrirModalAdd waves-effect waves-light btn modal-trigger" href="#modalEmpleados">Add HCD</a>
                  </td>
                </tr>
                <tr>
                  <th scope="row">LEF</th>
                 <!--  <td>Atencion familiar</td> -->
                  <td style="width: ;padding: 0px !important;"><input required name="hdc[]" placeholder="......" class="form-control" type="number"></td>
                  <td style="width: ;padding: -2px !important;">
                      <a class="AbrirModalAdd waves-effect waves-light btn modal-trigger" href="#modalEmpleados">Add HCD</a>
                  </td>
                </tr>
                <tr>
                  <th scope="row">EXAM</th>
                  <!-- <td>Examenes</td> -->
                  <td style="width: ;padding: 0px !important;"><input required name="hdc[]" placeholder="......" class="form-control" type="number"></td>
                  <td style="width: ;padding: -2px !important;">
                      <a class="AbrirModalAdd waves-effect waves-light btn modal-trigger" href="#modalEmpleados">Add HCD</a>
                  </td>
                </tr>
                <tr>
                  <th scope="row">LACT</th>
                  <!-- <td>Lactancia o alimentacion</td> -->
                  <td style="width: ;padding: 0px !important;"><input required name="hdc[]" placeholder="......" class="form-control" type="number"></td>
                  <td style="width: ;padding: -2px !important;">
                      <a class="AbrirModalAdd waves-effect waves-light btn modal-trigger" href="#modalEmpleados">Add HCD</a>
                  </td>
                </tr>
                <tr>
                  <th scope="row">LF</th>
                  <!-- <td>Fallecimiento</td> -->
                  <td style="width: ;padding: 0px !important;"><input required name="hdc[]" placeholder="......" class="form-control" type="number"></td>
                  <td style="width: ;padding: -2px !important;">
                      <a class="AbrirModalAdd waves-effect waves-light btn modal-trigger" href="#modalEmpleados">Add HCD</a>
                  </td>
                </tr>
                <tr>
                  <th scope="row">HC</th>
                  <!-- <td>Historia clinica</td> -->
                  <td style="width: ;padding: 0px !important;"><input required name="hdc[]" placeholder="......" class="form-control" type="number"></td>
                  <td style="width: ;padding: -2px !important;">
                      <a class="AbrirModalAdd waves-effect waves-light btn modal-trigger" href="#modalEmpleados">Add HCD</a>
                  </td>
                </tr>
                <tr>
                  <th scope="row">MATERN</th>
                  <!-- <td>Maternidad</td> -->
                  <td style="width: ;padding: 0px !important;"><input required name="hdc[]" placeholder="......" class="form-control" type="number"></td>
                  <td style="width: ;padding: -2px !important;">
                      <a class="AbrirModalAdd waves-effect waves-light btn modal-trigger" href="#modalEmpleados">Add HCD</a>
                  </td>
                </tr>
                <tr>
                  <th scope="row">RP</th>
                  <!-- <td>Razones particulares</td> -->
                  <td style="width: ;padding: 0px !important;"><input required name="hdc[]" placeholder="......" class="form-control" type="number"></td>
                  <td style="width: ;padding: -2px !important;">
                      <a class="AbrirModalAdd waves-effect waves-light btn modal-trigger" href="#modalEmpleados">Add HCD</a>
                  </td>
                </tr>
                <tr>
                  <th scope="row">DONS</th>
                  <!-- <td>Donaciones de sangre</td> -->
                  <td style="width: ;padding: 0px !important;"><input required name="hdc[]" placeholder="......" class="form-control" type="number"></td>
                  <td style="width: ;padding: -2px !important;">
                      <a class="AbrirModalAdd waves-effect waves-light btn modal-trigger" href="#modalEmpleados">Add HCD</a>
                  </td>
                </tr>
                <tr>
                  <th scope="row">JT</th>
                  <!-- <td>Jubilacion transitoria</td> -->
                  <td style="width: ;padding: 0px !important;"><input required name="hdc[]" placeholder="......" class="form-control" type="number"></td>
                  <td style="width: ;padding: -2px !important;">
                      <a class="AbrirModalAdd waves-effect waves-light btn modal-trigger" href="#modalEmpleados">Add HCD</a>
                  </td>
                </tr>
                <tr>
                  <th scope="row">LI</th>
                  <!-- <td>Licencia invernal</td> -->
                  <td style="width: ;padding: 0px !important;"><input required name="hdc[]" placeholder="......" class="form-control" type="number"></td>
                  <td style="width: ;padding: -2px !important;">
                      <a class="AbrirModalAdd waves-effect waves-light btn modal-trigger" href="#modalEmpleados">Add HCD</a>
                  </td>
                </tr>
                <tr>
                  <th scope="row">MO</th>
                  <!-- <td>Mision oficial</td> -->
                  <td style="width: ;padding: 0px !important;"><input required name="hdc[]" placeholder="......" class="form-control" type="number"></td>
                  <td style="width: ;padding: -2px !important;">
                      <a class="AbrirModalAdd waves-effect waves-light btn modal-trigger" href="#modalEmpleados">Add HCD</a>
                  </td>
                </tr>
                <tr>
                  <th scope="row">SUSP</th>
                 <!--  <td>Suspension</td> -->
                  <td style="width: ;padding: 0px !important;"><input required name="hdc[]" placeholder="......" class="form-control" type="number"></td>
                  <td style="width: ;padding: -2px !important;">
                      <a class="AbrirModalAdd waves-effect waves-light btn modal-trigger" href="#modalEmpleados">Add HCD</a>
                  </td>
                </tr>
                <tr>
                  <th scope="row">LEE6M</th>
                  <!-- <td>Lic. Esp. Extr./6meses sin goce de haberes</td> -->
                  <td style="width: ;padding: 0px !important;"><input required name="hdc[]" placeholder="......" class="form-control" type="number"></td>
                  <td style="width: ;padding: -2px !important;">
                      <a class="AbrirModalAdd waves-effect waves-light btn modal-trigger" href="#modalEmpleados">Add HCD</a>
                  </td>
                </tr>
                <tr>
                  <th scope="row">LEE1A</th>
                  <!-- <td>Lic. Esp. Extr./1año</td> -->
                  <td style="width: ;padding: 0px !important;"><input required name="hdc[]" placeholder="......" class="form-control" type="number"></td>
                  <td style="width: ;padding: -2px !important;">
                      <a class="AbrirModalAdd waves-effect waves-light btn modal-trigger" href="#modalEmpleados">Add HCD</a>
                  </td>
                </tr>
                <tr>
                  <th scope="row">D.538</th>
                  <!-- <td>Autorizado decreto 538/20</td> -->
                  <td style="width: ;padding: 0px !important;"><input required name="hdc[]" placeholder="......" class="form-control" type="number"></td>
                  <td style="width: ;padding: -2px !important;">
                      <a class="AbrirModalAdd waves-effect waves-light btn modal-trigger" href="#modalEmpleados">Add HCD</a>
                  </td>
                </tr>
                <tr>
                  <th scope="row">CV+</th>
                  <!-- <td>Covid positivo</td> -->
                  <td style="width: ;padding: 0px !important;"><input required name="hdc[]" placeholder="......" class="form-control" type="number"></td>
                  <td style="width: ;padding: -2px !important;">
                      <a class="AbrirModalAdd waves-effect waves-light btn modal-trigger" href="#modalEmpleados">Add HCD</a>
                  </td>
                </tr>
                <tr>
                  <th scope="row">AISL/C.E</th>
                  <!-- <td>Aislado contacto estrecho</td> -->
                  <td style="width: ;padding: 0px !important;"><input required name="hdc[]" placeholder="......" class="form-control" type="number"></td>
                  <td style="width: ;padding: -2px !important;">
                      <a class="AbrirModalAdd waves-effect waves-light btn modal-trigger" href="#modalEmpleados">Add HCD</a>
                  </td>
                </tr>
                <tr>
                  <th scope="row">POST COVID+</th>
                 <!--  <td>Post covid positivo</td> -->
                  <td style="width: ;padding: 0px !important;"><input required name="hdc[]" placeholder="......" class="form-control" type="number"></td>
                  <td style="width: ;padding: -2px !important;">
                      <a class="AbrirModalAdd waves-effect waves-light btn modal-trigger" href="#modalEmpleados">Add HCD</a>
                  </td>
                </tr>
                <tr>
                  <th scope="row">FALLECIMIENTO COVID</th>
                  <!-- <td>Fallecimiento covid</td> -->
                  <td style="width: ;padding: 0px !important;"><input required name="hdc[]" placeholder="......" class="form-control" type="number"></td>
                  <td style="width: ;padding: -2px !important;">
                      <a class="AbrirModalAdd waves-effect waves-light btn modal-trigger" href="#modalEmpleados">Add HCD</a>
                  </td>
                </tr>
                <tr>
                  <th scope="row">TICE</th>
                  <!-- <td>Total inactivos covid ejecutivo</td> -->
                  <td style="width: ;padding: 0px !important;"><input required name="hdc[]" placeholder="......" class="form-control" type="number"></td>
                  <td style="width: ;padding: -2px !important;">
                      <a class="AbrirModalAdd waves-effect waves-light btn modal-trigger" href="#modalEmpleados">Add HCD</a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="modal-footer">
          <button style="background: #f55252;" type="button" class="btn modal-close waves-effect waves-light" data-dismiss="modal">Cerrar</button>
          <button style="background: #f45da9;" type="submit" class="btn btn-success waves-effect waves-light">Guardar</button>
        </div>
        </form>
    </div>

<!-- //////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////// -->
<div id="mostrarEmpleados" class="modal">
    <div class="modal-content">
      <h4 id="titulo">Modal Header</h4>
      <div id="empleaFaltan"></div>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-close waves-effect waves-green btn">Cerrar</a>
    </div>
  </div>
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////// -->
<div id="modalEmpleados" class="modal">
    <div class="modal-content">
      <h4>Todos los empleados</h4>
      <!-- ////body///// -->
      <!-- ////body///// -->
      <div class="input-field col s12">
        <input type="text" id="autocomplete-input" class="autocomplete autoHcd">
        <label for="autocomplete-input">Seleccionar empleados</label>
      </div>
      <div id="empleSeleccion">
      </div>
      <!-- //////////// -->
      <!-- //////////// -->
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-close waves-effect waves-green btn">Listo</a>
    </div>
  </div>
  <!-- ////////////////////////////////////////////////////////////////////////// -->
  <!-- ////////////////////////////////////////////////////////////////////////// -->
  <!-- ////////////////////////////////////////////////////////////////////////// -->
<div id="modalEmpleadosMunicipales" class="modal">
    <div class="modal-content">
      <h4>Todos los empleados</h4>
      <!-- ////body///// -->
      <!-- ////body///// -->
      <div class="input-field col s12">
        <input type="text" id="autocomplete-inputw" class="autocomplete autoMuni">
        <label for="autocomplete-inputw">Seleccionar empleados</label>
      </div>
      <div id="empleSeleccionMuni">
      </div>
      <!-- //////////// -->
      <!-- //////////// -->
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-close waves-effect waves-green btn">Listo</a>
    </div>
  </div>
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- //////////////////////////////////////////////////////////////////////////////////////////////////// -->
<style>
.select-wrapper>ul{
  position: relative;
}
</style>
<script src="mdb/js/jquery.min.js"></script>
<!-- <script src="mdb/js/bootstrap.min.js"></script>
<script src="mdb/js/mdb.min.js"></script> -->
<script src="mdb/js/all.min.js"></script>
<script src="js/materialize.min.js"></script>
<script src="js/js.js"></script>
</html>