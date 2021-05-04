let empleados;
document.addEventListener("DOMContentLoaded", async function () {
  console.log("DOM fully loaded and parsed");
  await traerUno();
  await traerUnHCD();
  await traerEmpleados();
  M.AutoInit();
  $(".datepicker").datepicker({
    format: "yyyy-mm-dd",
    autoClose: true,
    i18n: {
      months: [
        "Enero",
        "Febrero",
        "Marzo",
        "Abril",
        "Mayo",
        "Junio",
        "Julio",
        "Agosto",
        "Septiembre",
        "Octubre",
        "Noviembre",
        "Diciembre",
      ],
      monthsShort: [
        "Ene",
        "Feb",
        "Mar",
        "Abr",
        "May",
        "Jun",
        "Jul",
        "Ago",
        "Sep",
        "Oct",
        "Nov",
        "Dic",
      ],
      weekdaysFull: [
        "Domingo",
        "Lunes",
        "Martes",
        "Miércoles",
        "Jueves",
        "Viernes",
        "Sábado",
      ],
      weekdaysShort: ["Dom", "Lun", "Mar", "Mié", "Jue", "Vie", "Sáb"],
      selectMonths: true,
      selectYears: 100, // Puedes cambiarlo para mostrar más o menos años
      today: "Hoy",
      close: "Ok",
      labelMonthNext: "Siguiente mes",
      labelMonthPrev: "Mes anterior",
      labelMonthSelect: "Selecciona un mes",
      labelYearSelect: "Selecciona un año",
      weekdaysAbbrev: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"],
    },
  });

  /* select seacheable */
  /* select seacheable */
});

document.getElementById("fecha").addEventListener("change", async () => {
  let fecha = document.getElementById("fecha").value;
  console.log(fecha);
  await traerUno(fecha);
  await traerUnHCD(fecha);
});

async function traerUno(fechaa) {
  if (fechaa) {
    fetch("php/traerUno.php?fecha=" + fechaa)
      .then((response) => response.json())
      .then(async (data) => {
        console.log(data);
        if (data == false) {
          document.getElementById(
            "tabla"
          ).innerHTML = `<h4>Agentes municipales</h4><h3 style="padding:3%;" class="text-center">No hay datos de esta fecha.</h3>`;
        } else {
          await dibujar(data);
        }
      });
  } else {
    fetch("php/traerUno.php")
      .then((response) => response.json())
      .then(async (data) => {
        console.log(data);
        if (data == false) {
          document.getElementById(
            "tabla"
          ).innerHTML = `<h4>Agentes municipales</h4><h3 style="padding:3%;" class="text-center">Carga los datos de hoy para su vista previa.</h3>`;
        } else {
          await dibujar(data);
        }
      });
  }
}
async function traerUnHCD(fechaa) {
  if (fechaa) {
    fetch("php/traerUnHCD.php?fecha=" + fechaa)
      .then((response) => response.json())
      .then(async (data) => {
        console.log(data);
        if (data == false) {
          document.getElementById(
            "tablaHCD"
          ).innerHTML = `<h4>Agentes HCD</h4><h3 style="padding:3%;" class="text-center">No hay datos de esta fecha.</h3>`;
        } else {
          await dibujarHCD(data);
        }
      });
  } else {
    fetch("php/traerUnHCD.php")
      .then((response) => response.json())
      .then(async (data) => {
        console.log(data);
        if (data == false) {
          document.getElementById(
            "tablaHCD"
          ).innerHTML = `<h4>Agentes HCD</h4><h3 style="padding:3%;" class="text-center">Carga los datos de hoy para su vista previa.</h3>`;
        } else {
          await dibujarHCD(data);
        }
      });
  }
}

async function traerEmpleados() {
  fetch("php/traerEmpleados.php")
    .then((response) => response.json())
    .then(async (data) => {
      /* console.log(data) */
      let options = {};
      let ar = [];
      data.forEach((element) => {
        options[`${element.nombreApellido}`] = null;
      });
      ar.push(options);
      console.log(ar);

      let elems = document.querySelectorAll(".autocomplete");
      let instances = M.Autocomplete.init(elems, {
        data: options,
        icon: null,
        minLength: 0,
        limit: 10,
      });

      return (empleados = data);
    });
}
document.querySelector(".autocomplete").addEventListener("click", (e) => {
  e.target.nextSibling.style.position = "relative";
});
/* /////////////////////////////////////////////////////// */
/* ////////////////////AQUI GUARDAMOS LOS EMPLEADOS EN LOCALSTORAGE//////////////////// */
/* ////////////////////AQUI GUARDAMOS LOS EMPLEADOS EN LOCALSTORAGE//////////////////// */
/* ////////////////////AQUI GUARDAMOS LOS EMPLEADOS EN LOCALSTORAGE//////////////////// */
document.querySelector(".autocomplete").addEventListener("change", (e) => {
  /* console.log(e.target.parentElement) */
  /* console.log(empleados) */
  let empleado = empleados.find(
    (nombre) => nombre.nombreApellido === e.target.value
  );
  console.log(empleado);
  document.getElementById(
    "empleSeleccion"
  ).innerHTML += `<p>${empleado.nombreApellido}</p>`;
  e.target.value = "";
  let ulti = localStorage.getItem(`ultimoEntro`);
  /* console.log(ulti) */
  let arrayEmple = [];
  arrayEmple.push(empleado);
  let allEmpleadosForm = JSON.parse(localStorage.getItem(`${ulti}`));
  /* console.log(allEmpleadosForm) */
  if (Array.isArray(allEmpleadosForm)) {
    if (allEmpleadosForm.length >= 0) {
      allEmpleadosForm.push(empleado);
      let todos = ``;
      allEmpleadosForm.forEach((element) => {
        console.log(element);
        todos += `<p>${element.nombreApellido} <button style="" class="btn waves-effect waves-light red lighten-3" onclick="borrarDeStorage(${element.idEmpleado},event)">x</button></p>`;
      });
      document.getElementById("empleSeleccion").innerHTML = todos;
      /* console.log(allEmpleadosForm) */
      localStorage.setItem(`${ulti}`, JSON.stringify(allEmpleadosForm));
    }
  } else {
    localStorage.setItem(`${ulti}`, JSON.stringify(arrayEmple));
  }
});
/* /////////////////////////////////////////////////////////////////////////////////////// */
/* /////////////////////////////////////////////////////////////////////////////////////// */
/* /////////////////////////////////////////////////////////////////////////////////////// */
/* /////////////////////////////////////////////////////////////////////////////////////// */

async function dibujar(params) {
  let tabla = `
    
    <h4 style="background: #19cbf7db;color: white;text-align:center;margin-bottom: 0;padding: 1%;border-radius: 2px;">Agentes municipales ${params.fecha} <a style="background:#1e88e5;" class="waves-effect waves-light btn btn-large" href="dompdf/imprimir_asistencia.php" target="_blanck">Imprimir</a></h4>
    <div class="table-responsive">
            <table class="table table-bordered table-sm highlight">
              <tbody>
                <tr>
                  <th scope="row">E</th>
                  <td>Efectivos</td>
                  <td class="text-center" style="width: ;padding: 0px !important;">${params.efectivos}</td>
                </tr>
                <tr>
                  <th scope="row">P</th>
                  <td>Presentes</td>
                  <td class="text-center" style="width: ;padding: 0px !important;">${params.presentes}</td>
                </tr>
                <tr>
                  <th scope="row">A</th>
                  <td>Ausentes</td>
                  <td class="text-center" style="width: ;padding: 0px !important;">${params.ausentes}</td>
                </tr>
                <tr>
                  <th scope="row">A</th>
                  <td>Ausente injustificado</td>
                  <td class="text-center" style="width: ;padding: 0px !important;">${params.a}</td>
                </tr>
                <tr>
                  <th scope="row">LA</th>
                  <td>Licencia anual</td>
                  <td class="text-center" style="width: ;padding: 0px !important;">${params.la}</td>
                </tr>
                <tr>
                  <th scope="row">AT</th>
                  <td>Accidente de trabajo</td>
                  <td class="text-center" style="width: ;padding: 0px !important;">${params.at}</td>
                </tr>
                <tr>
                  <th scope="row">MATR</th>
                  <td>Matrimonio agente</td>
                  <td class="text-center" style="width: ;padding: 0px !important;">${params.matr}</td>
                </tr>
                <tr>
                  <th scope="row">EST</th>
                  <td>Estudio</td>
                  <td class="text-center" style="width: ;padding: 0px !important;">${params.est}</td>
                </tr>
                <tr>
                  <th scope="row">NAC</th>
                  <td>Nacimiento hijo</td>
                  <td class="text-center" style="width: ;padding: 0px !important;">${params.nac}</td>
                </tr>
                <tr>
                  <th scope="row">LEA</th>
                  <td>Enfermedad agente</td>
                  <td class="text-center" style="width: ;padding: 0px !important;">${params.lea}</td>
                </tr>
                <tr>
                  <th scope="row">LEF</th>
                  <td>Atencion familiar</td>
                  <td class="text-center" style="width: ;padding: 0px !important;">${params.lef}</td>
                </tr>
                <tr>
                  <th scope="row">EXAM</th>
                  <td>Examenes</td>
                  <td class="text-center" style="width: ;padding: 0px !important;">${params.exam}</td>
                </tr>
                <tr>
                  <th scope="row">LACT</th>
                  <td>Lactancia o alimentacion</td>
                  <td class="text-center" style="width: ;padding: 0px !important;">${params.lact}</td>
                </tr>
                <tr>
                  <th scope="row">LF</th>
                  <td>Fallecimiento</td>
                  <td class="text-center" style="width: ;padding: 0px !important;">${params.lf}</td>
                </tr>
                <tr>
                  <th scope="row">HC</th>
                  <td>Historia clinica</td>
                  <td class="text-center" style="width: ;padding: 0px !important;">${params.hc}</td>
                </tr>
                <tr>
                  <th scope="row">MATERN</th>
                  <td>Maternidad</td>
                  <td class="text-center" style="width: ;padding: 0px !important;">${params.matern}</td>
                </tr>
                <tr>
                  <th scope="row">RP</th>
                  <td>Razones particulares</td>
                  <td class="text-center" style="width: ;padding: 0px !important;">${params.rp}</td>
                </tr>
                <tr>
                  <th scope="row">DONS</th>
                  <td>Donaciones de sangre</td>
                  <td class="text-center" style="width: ;padding: 0px !important;">${params.dons}</td>
                </tr>
                <tr>
                  <th scope="row">JT</th>
                  <td>Jubilacion transitoria</td>
                  <td class="text-center" style="width: ;padding: 0px !important;">${params.jt}</td>
                </tr>
                <tr>
                  <th scope="row">LI</th>
                  <td>Licencia invernal</td>
                  <td class="text-center" style="width: ;padding: 0px !important;">${params.li}</td>
                </tr>
                <tr>
                  <th scope="row">MO</th>
                  <td>Mision oficial</td>
                  <td class="text-center" style="width: ;padding: 0px !important;">${params.mo}</td>
                </tr>
                <tr>
                  <th scope="row">SUSP</th>
                  <td>Suspension</td>
                  <td class="text-center" style="width: ;padding: 0px !important;">${params.susp}</td>
                </tr>
                <tr>
                  <th scope="row">LEE6M</th>
                  <td>Lic. Esp. Extr./6meses sin goce de haberes</td>
                  <td class="text-center" style="width: ;padding: 0px !important;">${params.lee6m}</td>
                </tr>
                <tr>
                  <th scope="row">LEE1A</th>
                  <td>Lic. Esp. Extr./1año</td>
                  <td class="text-center" style="width: ;padding: 0px !important;">${params.lee1a}</td>
                </tr>
                <tr>
                  <th scope="row">ADSC</th>
                  <td>Municipales adscriptos</td>
                  <td class="text-center" style="width: ;padding: 0px !important;">${params.adsc}</td>
                </tr>
                <tr>
                  <th scope="row">LP</th>
                  <td>Licencia politica</td>
                  <td class="text-center" style="width: ;padding: 0px !important;">${params.lp}</td>
                </tr>
                <tr>
                  <th scope="row">D.538</th>
                  <td>Autorizado decreto 538/20</td>
                  <td class="text-center" style="width: ;padding: 0px !important;">${params.d538}</td>
                </tr>
                <tr>
                  <th scope="row">CV+</th>
                  <td>Covid positivo</td>
                  <td class="text-center" style="width: ;padding: 0px !important;">${params.cvp}</td>
                </tr>
                <tr>
                  <th scope="row">AISL/C.E</th>
                  <td>Aislado contacto estrecho</td>
                  <td class="text-center" style="width: ;padding: 0px !important;">${params.aislce}</td>
                </tr>
                <tr>
                <th scope="row">POST COVID+</th>
                <td>Post covid positivo</td>
                <td class="text-center" style="width: ;padding: 0px !important;">${params.postCovidpos}</td>
              </tr>
              <tr>
                <th scope="row">FALLECIMIENTO COVID</th>
                <td>Fallecimiento covid</td>
                <td class="text-center" style="width: ;padding: 0px !important;">${params.fallecimientoCovid}</td>
              </tr>
                <tr>
                  <th scope="row">TICE</th>
                  <td>Total inactivos covid ejecutivo</td>
                  <td class="text-center" style="width: ;padding: 0px !important;">${params.ticp}</td>
                </tr>
              </tbody>
            </table>
          </div>
    `;
  document.getElementById("tabla").innerHTML = tabla;
}

async function dibujarHCD(params) {
  let tabla = `
  
  <h4 style="background: #e036bcbf;color: white;color: white;text-align:center;margin-bottom: 0;padding: 1%;border-radius: 2px;">Agentes HCD ${params.fecha}  <a style="background:#ca15f3;" class="waves-effect waves-light btn btn-large" href="dompdf/imprimir_asistenciaHCD.php" target="_blanck">Imprimir</a></h4>
  <div class="table-responsive">
          <table class="table table-bordered table-sm highlight">
            <tbody>
              <tr>
                <th scope="row">E</th>
                <td>Efectivos</td>
                <td class="text-center" style="width: ;padding: 0px !important;">${params.efectivos}</td>
              </tr>
              <tr>
                <th scope="row">P</th>
                <td>Presentes</td>
                <td class="text-center" style="width: ;padding: 0px !important;">${params.presentes}</td>
              </tr>
              <tr>
                <th scope="row">A</th>
                <td>Ausentes</td>
                <td class="text-center" style="width: ;padding: 0px !important;">${params.ausentes}</td>
              </tr>
              <tr>
                <th scope="row">A</th>
                <td>Ausente injustificado</td>
                <td class="text-center" style="width: ;padding: 0px !important;">${params.a}</td>
              </tr>
              <tr>
                <th scope="row">LA</th>
                <td>Licencia anual</td>
                <td class="text-center" style="width: ;padding: 0px !important;">${params.la}</td>
              </tr>
              <tr>
                <th scope="row">AT</th>
                <td>Accidente de trabajo</td>
                <td class="text-center" style="width: ;padding: 0px !important;">${params.at}</td>
              </tr>
              <tr>
                <th scope="row">MATR</th>
                <td>Matrimonio agente</td>
                <td class="text-center" style="width: ;padding: 0px !important;">${params.matr}</td>
              </tr>
              <tr>
                <th scope="row">EST</th>
                <td>Estudio</td>
                <td class="text-center" style="width: ;padding: 0px !important;">${params.est}</td>
              </tr>
              <tr>
                <th scope="row">NAC</th>
                <td>Nacimiento hijo</td>
                <td class="text-center" style="width: ;padding: 0px !important;">${params.nac}</td>
              </tr>
              <tr>
                <th scope="row">LEA</th>
                <td>Enfermedad agente</td>
                <td class="text-center" style="width: ;padding: 0px !important;">${params.lea}</td>
              </tr>
              <tr>
                <th scope="row">LEF</th>
                <td>Atencion familiar</td>
                <td class="text-center" style="width: ;padding: 0px !important;">${params.lef}</td>
              </tr>
              <tr>
                <th scope="row">EXAM</th>
                <td>Examenes</td>
                <td class="text-center" style="width: ;padding: 0px !important;">${params.exam}</td>
              </tr>
              <tr>
                <th scope="row">LACT</th>
                <td>Lactancia o alimentacion</td>
                <td class="text-center" style="width: ;padding: 0px !important;">${params.lact}</td>
              </tr>
              <tr>
                <th scope="row">LF</th>
                <td>Fallecimiento</td>
                <td class="text-center" style="width: ;padding: 0px !important;">${params.lf}</td>
              </tr>
              <tr>
                <th scope="row">HC</th>
                <td>Historia clinica</td>
                <td class="text-center" style="width: ;padding: 0px !important;">${params.hc}</td>
              </tr>
              <tr>
                <th scope="row">MATERN</th>
                <td>Maternidad</td>
                <td class="text-center" style="width: ;padding: 0px !important;">${params.matern}</td>
              </tr>
              <tr>
                <th scope="row">RP</th>
                <td>Razones particulares</td>
                <td class="text-center" style="width: ;padding: 0px !important;">${params.rp}</td>
              </tr>
              <tr>
                <th scope="row">DONS</th>
                <td>Donaciones de sangre</td>
                <td class="text-center" style="width: ;padding: 0px !important;">${params.dons}</td>
              </tr>
              <tr>
                <th scope="row">JT</th>
                <td>Jubilacion transitoria</td>
                <td class="text-center" style="width: ;padding: 0px !important;">${params.jt}</td>
              </tr>
              <tr>
                <th scope="row">LI</th>
                <td>Licencia invernal</td>
                <td class="text-center" style="width: ;padding: 0px !important;">${params.li}</td>
              </tr>
              <tr>
                <th scope="row">MO</th>
                <td>Mision oficial</td>
                <td class="text-center" style="width: ;padding: 0px !important;">${params.mo}</td>
              </tr>
              <tr>
                <th scope="row">SUSP</th>
                <td>Suspension</td>
                <td class="text-center" style="width: ;padding: 0px !important;">${params.susp}</td>
              </tr>
              <tr>
                <th scope="row">LEE6M</th>
                <td>Lic. Esp. Extr./6meses sin goce de haberes</td>
                <td class="text-center" style="width: ;padding: 0px !important;">${params.lee6m}</td>
              </tr>
              <tr>
                <th scope="row">LEE1A</th>
                <td>Lic. Esp. Extr./1año</td>
                <td class="text-center" style="width: ;padding: 0px !important;">${params.lee1a}</td>
              </tr>
              <tr>
                <th scope="row">D.538</th>
                <td>Autorizado decreto 538/20</td>
                <td class="text-center" style="width: ;padding: 0px !important;">${params.d538}</td>
              </tr>
              <tr>
                <th scope="row">CV+</th>
                <td>Covid positivo</td>
                <td class="text-center" style="width: ;padding: 0px !important;">${params.cvp}</td>
              </tr>
              <tr>
                <th scope="row">AISL/C.E</th>
                <td>Aislado contacto estrecho</td>
                <td class="text-center" style="width: ;padding: 0px !important;">${params.aislce}</td>
              </tr>
              <tr>
                <th scope="row">POST COVID+</th>
                <td>Post covid positivo</td>
                <td class="text-center" style="width: ;padding: 0px !important;">${params.postCovidpos}</td>
              </tr>
              <tr>
                <th scope="row">FALLECIMIENTO COVID</th>
                <td>Fallecimiento covid</td>
                <td class="text-center" style="width: ;padding: 0px !important;">${params.fallecimientoCovid}</td>
              </tr>
              <tr>
                <th scope="row">TICE</th>
                <td>Total inactivos covid ejecutivo</td>
                <td class="text-center" style="width: ;padding: 0px !important;">${params.ticp}</td>
              </tr>
            </tbody>
          </table>
        </div>
  `;
  document.getElementById("tablaHCD").innerHTML = tabla;
}

let botonesAddModal = document.querySelectorAll(".AbrirModalAdd");
console.log(botonesAddModal);
botonesAddModal.forEach((element) => {
  element.addEventListener("click", (e) => {
    console.log(
      e.target.parentElement.parentElement.firstChild.nextSibling.innerHTML
    );
    let atributoSave =
      e.target.parentElement.parentElement.firstChild.nextSibling.innerHTML;
    localStorage.setItem(`ultimoEntro`, atributoSave);
    let miStorage = window.localStorage;
    console.log(miStorage);

    let allEmpleadosForm = JSON.parse(localStorage.getItem(atributoSave));
    /*     console.log(allEmpleadosForm.length);
     */
    if (Array.isArray(allEmpleadosForm)) {
      if (allEmpleadosForm.length >= 0) {
        let todos = ``;
        allEmpleadosForm.forEach((element) => {
          console.log(element);
          todos += `<p>${element.nombreApellido} <button style="" class="btn  waves-effect waves-light red lighten-3" onclick="borrarDeStorage(${element.idEmpleado},event)">x</button></p>`;
        });
        document.getElementById("empleSeleccion").innerHTML = todos;
      }
    } else {
      document.getElementById("empleSeleccion").innerHTML = "";
    }
  });
});

async function borrarDeStorage(id, e) {
  let ultimo = localStorage.getItem("ultimoEntro");
  let allEmpleadosForm = JSON.parse(localStorage.getItem(ultimo));
  let emplea = allEmpleadosForm.find((emple) => emple.idEmpleado === `${id}`);
  /* console.log(emplea);*/

  allEmpleadosForm.forEach(function (element, index) {
    /*console.log(element)*/
    if (element === emplea) {
      allEmpleadosForm.splice(index, 1);
      /*console.log(allEmpleadosForm)*/
      localStorage.setItem(ultimo, JSON.stringify(allEmpleadosForm));
      e.target.parentElement.remove();
    }
  });
}

document.getElementById("formulario1").addEventListener("submit", (e) => {
  e.preventDefault();
 
  let formData = new FormData(document.getElementById("formulario1"));
    formData.append("a","a")
  
  fetch("php/addHCD.php", {
    method: "POST",
    body: formData,
  })
    .then((response) => response.json())
    .then((data) => {
      console.log("Success:", data);
    });
});
