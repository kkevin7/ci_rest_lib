<?php
//Operando los registros a al cuerpo de la tabla
foreach ($libros as $items){
        if($items->estado == 1){
            echo "<tr class='bg-danger'>";
        }
        if($items->estado == 0){
            echo "<tr class='bg-success'>";
        }
    ?>
        <td><?= $items->id_Libro ?></td>
        <td><?= $items->titulo ?></td>
        <td><?= $items->autor ?></td>
        <td><?= $items->categoria ?></td>
        <td><?= $items->genero ?></td>
        <td><?php
            if($items->estado == 1){
                echo "Rentado";
            }else{
                echo "Disponible";
            }
            ?></td>
        <td><button type="button" class="btn btn-warning btn_edit" onclick="seleccion(this)" value="<?= $items->id_Libro ?>">Editar</button></td>
        <td><button type="button" class="btn btn-danger btn_delete" onclick="seleccion(this)" value="<?= $items->id_Libro ?>">Eliminar</button></td>
    </tr>
<?php
}
?>