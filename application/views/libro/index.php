<div class="container">

    <!--Contenedor de la vista -->
    <div class="contenedor">
        <h1>Book Center</h1>
        <!--Contenedor deñ contenido el formulario -->
        <form>
            <!---Campo de formulario -->
            <div class="form-group col-sm-11">
                <label for="titulo">Titulo</label>
                <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Titulo del Libro"
                       required>
            </div>
            <!---Campo de formulario -->
            <div class="form-group col-sm-11">
                <label for="autor">Autor</label>
                <input type="text" class="form-control" id="autor" name="autor" placeholder="Nombre del Libro" required>
            </div>
            <!---Campo de formulario -->
            <div class="form-group col-sm-11">
                <label for="categoria">Categoria</label>
                <input type="text" class="form-control" id="categoria" name="categoria"
                       placeholder="Nombre de la categoria" required>
            </div>
            <!---Campo de formulario -->
            <div class="form-group col-sm-11">
                <label for="genero">Genero</label>
                <input type="text" class="form-control" id="genero" name="genero" placeholder="Nombre del genero"
                       required>
            </div>
            <!---Campo de formulario -->
            <div class="form-group col-sm-11">
                <label for="estado">Estado</label>
                <select class="form-control" name="estado" id="estado">
                    <option value="0" selected>Disponible</option>
                    <option value="1">Rentado</option>
                </select>
            </div>
            <!--Botones que realizan las acciones en la tabla-->
            <button type="button" id="btn_create" class="btn btn-primary">Crear</button>
            <button type="button" id="btn_edit" class="btn btn-success ">Modificar</button>
            <button type="reset" id="btn_reset" class="btn btn-secondary">Cancelar</button>
        </form>
    </div>
    <!--Contenedor del contenido el la tabla -->
    <div class="row contenedor-table">
        <h2>Lista de Libros Disponibles</h2>
        <!-- Tabla de los libros-->
        <table class="table table-responsive">
            <thead>
            <th>ID</th>
            <th>Libro</th>
            <th>Autor</th>
            <th>Categoria</th>
            <th>Genero</th>
            <th>Estado</th>
            <th colspan="2"></th>
            </thead>
            <!-- TBODY que contiene los regustados de la tabla-->
            <tbody id="contenido_table">

            </tbody>
        </table>
    </div>
</div>

<!--Importacion del JS -->
<script src="<?= base_url()?>assets/js/libro.js"></script>