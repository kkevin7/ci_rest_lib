
<div class="container contenedor">
    <h1>Triangulo</h1>
<!--Formulario para la inserccion de los datos del tiangulo -->
    <form method="POST">
    <div class="form-group ">
        <label for="lado1">Lado 1</label>
        <input type="number" class="form-control" name="lado1" id="lado1" placeholder="Lado 1" required>
    </div>
    <div class="form-group ">
        <label for="lado1">Lado 2</label>
        <input type="number" class="form-control" name="lado2" id="lado2" placeholder="Lado 2" required>
    </div>
    <div class="form-group ">
        <label for="lado1">Lado 3</label>
        <input type="number" class="form-control" name="lado3" id="lado3" placeholder="Lado 3" required>
    </div>
    <button type="submit" name="btn_enviar" class="btn btn-primary">Enviar</button>
        <button type="reset" name="btn_enviar" class="btn btn-secondary">Cancelar</button>
</form>
</div>
<?php
//Comprobar que si es un triangulo rectangunlo
if (isset($_POST['lado1']) && isset($_POST['lado2']) && isset($_POST['lado3'])){
    if($_POST['lado1'] == $_POST['lado2'] && $_POST['lado1'] == $_POST['lado3']){
        ?>
        <div class="container">
        <br>
        <br/>
        <div class="alert alert-primary" role="alert">
            <h2>Respuesta:</h2>
           Es un Triangulo Equilatero
        </div>
        </div>
<?php
        //Comprobar que si es un triangulo isoseles
    }else if($_POST['lado1'] == $_POST['lado2'] || $_POST['lado1'] == $_POST['lado3']){
        ?>
        <div class="container">
            <br>
            <br/>
            <div class="alert alert-success" role="alert">
                <h2>Respuesta:</h2>
                Es un Triangulo Isóseles
            </div>
        </div>
        <?php
        ////Comprobar que si es un triangulo escaleno
    }else if($_POST['lado1'] != $_POST['lado2'] && $_POST['lado1'] != $_POST['lado3']){
        ?>
        <div class="container">
            <br>
            <br/>
            <div class="alert alert-warning" role="alert">
                <h2>Respuesta:</h2>
                Es un Triangulo Escaleno
            </div>
        </div>
        <?php
    }

}
?>