<?php

try{
    $conexion = new PDO('mysql:host=localhost;dbname=paginacion', 'root', '');
} catch(PDOException $e){
    echo "ERROR" . $e->getMessage;
    die();
}

//estableciendo las paginas
$pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1 ;
$postPorPagina = 5;

//definiendo la cantidad de articulos en cada pagina de 5 en 5
$inicio = ($pagina > 1) ? ($pagina * $postPorPagina - $postPorPagina) : 0;

//preparando nuestra consulta sql, tambien calculando la cantidad de articulos en BD
$articulos = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM articulos LIMIT $inicio, $postPorPagina");

//Ejecutando nuestra consulta
$articulos->execute();

//Trayendo todos los articulos 
$articulos = $articulos->fetchAll();


if (!$articulos) {
	//aqui si el numero de pagina no existe, redirijo al index.php
	header('Location: index.php');
}

//calculando el total de articulos que tenemos para saber cuantas paginas tenemos. LLamando total de filas
$totalArticulos = $conexion->query('SELECT FOUND_ROWS() as total');
$totalArticulos = $totalArticulos->fetch()['total'];

//Con ceil redondeo hacia arriba por si hay 21 paginas
$numeroPagina = ceil($totalArticulos / $postPorPagina);

require 'index.view.php';


?>