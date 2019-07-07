window.addEventListener('load',recargar);
window.addEventListener('load',reniciar_btn);
document.getElementById('btn_reset').addEventListener('click', reniciar_btn);

function reniciar_btn()
{
        document.getElementById('btn_edit').style.display = 'none'; // hide
        document.getElementById('btn_create').style.display = 'inline'; // show
}
function btn_edit() {
        document.getElementById('btn_create').style.display = 'none'; // hide
        document.getElementById('btn_edit').style.display = 'inline'; // show
}

//metodo recargar
function recargar() {
    var peticion = new XMLHttpRequest();
    peticion.onreadystatechange=function () {
        if (this.readyState== 4){
            document.getElementById('contenido_table').innerHTML=this.responseText;
            asignarEventos();
        }
    };
    peticion.open('GET', 'libro/recargar');
    peticion.send();
}

//controlador de eventos
function asignarEventos() {
    document.getElementById('btn_create').addEventListener('click', accion );
    document.getElementById('btn_edit').addEventListener('click', actualizar);;
    var btnDelete= document.getElementsByClassName('btn_delete');

    for(var i=0; i<btnDelete.length; i++){
        //btnEdit[i].addEventListener('click',actualizar);
        btnDelete[i].addEventListener('click',eliminar);
    }

}

//Ingresear Datos
function accion() {
    //Obtener los valores
    var titulo = document.getElementById('titulo').value;
    var autor = document.getElementById('autor').value;
    var categoria = document.getElementById('categoria').value;
    var genero = document.getElementById('genero').value;
    var estado =document.getElementById('estado').value = "0";

    //Mostar por consola
    console.log(titulo);
    console.log(autor);
    console.log(categoria);
    console.log(genero);
    console.log(estado);

    //Validar los campos que no esta vacios
    if(titulo == "" || autor == "" || categoria=="" || genero=="" || estado==""){
        alert("LLENE LOS CAMPOS");
        return;
    }else {
        var peticion = new XMLHttpRequest();
        peticion.onreadystatechange = function () {
            if (this.readyState == 4) {
                recargar();
                limpiar();
            }
        };
        peticion.open('POST', 'libro/create');
        peticion.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        peticion.send('titulo=' + titulo + '&autor=' + autor + '&categoria=' + categoria + "&genero=" +genero+ "&estado="+estado);
    }
}

//Mostarlos datos en la vista todos registos en la vista
var id;
function seleccion(elemento){
    btn_edit();

    //Obtner un fila de la tabla
    tr = elemento.parentNode.parentNode;
    td = tr.getElementsByTagName("td");

    //Obtner los valores de la fila
    id = td[0].innerHTML;
    titulo = td[1].innerHTML;
    autor = td[2].innerHTML;
    categoria = td[3].innerHTML;
    genero = td[4].innerHTML;
    estado = td[5].innerHTML;

    ////Validar los campos que no esta vacios
    document.getElementById('titulo').value =titulo;
    document.getElementById('autor').value =autor;
    document.getElementById('categoria').value = categoria;
    document.getElementById('genero').value = genero;
    if(estado== "Rentado"){
        document.getElementById('estado').value = 1;
    }else{
        document.getElementById('estado').value = 0;
    }

}

//Actualizar todos registos en la vista
function actualizar() {
    //Obtner todos los campos y limpar los valores
    var titulo = document.getElementById('titulo').value;
    var autor = document.getElementById('autor').value;
    var categoria = document.getElementById('categoria').value;
    var genero = document.getElementById('genero').value;
    var estado =document.getElementById('estado').value;

    //Mostar los datos por consola
    console.log(titulo);
    console.log(autor);
    console.log(categoria);
    console.log(genero);
    console.log(estado);

    //Validar los campos que no esta vacios
    if(titulo == "" || autor == "" || categoria=="" || genero=="" || estado=="" | id==""){
        alert("LLENE LOS CAMPOS");
        return;
    }else {
        var peticion = new XMLHttpRequest();
        peticion.onreadystatechange = function () {
            if (this.readyState == 4) {
                recargar();
                limpiar();
                reniciar_btn();
                id="";
            }
        };
        peticion.open('POST', 'libro/update');
        peticion.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        peticion.send('titulo=' + titulo + '&autor=' + autor + '&categoria=' + categoria + "&genero=" +genero+ "&estado="+estado+ "&id_Libro="+id);
    }
}
//Eliminar lo registro desde la tabla
function eliminar() {
    const confirm = window.confirm("¿Deseas eliminar el registro?");

    if (confirm){
        var id = this.value;
        console.log(this.value);

        var peticion = new XMLHttpRequest();
        peticion.onreadystatechange = function () {
            if (this.readyState == 4) {
                recargar();
                limpiar();
            }
        };
        peticion.open('POST', 'libro/delete');
        peticion.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        peticion.send('id_Libro=' + id);

    }
}

//Limpiar todos lo campos de formularios
function limpiar() {
    //Obtner todos los campos y limpar los valores
    document.getElementById('titulo').value = "";
    document.getElementById('autor').value = "";
    document.getElementById('categoria').value = "";
    document.getElementById('genero').value = "";
    document.getElementById('estado').value = "0";
}