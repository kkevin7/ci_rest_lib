<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url();?>assets/css/bootstrap.min.css">

    <!-- Importacion de la hoja de estilo-->
    <link rel="stylesheet" href="<?= base_url();?>/assets/css/style.css">
    <title>Book Center</title>
</head>
<body>

<!-- Creacion de footer de la vista-->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary" >
    <a class="navbar-brand" href="<?= base_url();?>">Book Center</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">

            <!--Link hacia las vistar -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url();?>">Libros</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url();?>triangulo/index">Identificar Un triangulo</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url();?>rest/libro">REST</a>
            </li>
        </ul>
    </div>
</nav>
