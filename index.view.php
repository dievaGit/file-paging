<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <title>Paginacion</title>
   <link href="https://fonts.googleapis.com/css?family=Oswald&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="contenedor">
  <h1>Articulos</h1>
  <section class="articulos">
    <ul>
      <!-- Aqui muestro el arreglo de articulos de la base de datos  -->
      <?php foreach ($articulos as $articulo): ?>
        <li><?php echo $articulo['ID'] . '.-' . $articulo['articulo'] ?></li>
      <?php endforeach; ?>
    </ul>
  </section>   

  <section class="paginacion">
    <ul>
       <!-- Aqui configuro el primer boton. desabilitado en la pag1 y atras en las otras pag  -->
       <?php if($pagina == 1): ?>
             <li class="disabled">&laquo;</li>
       <?php else: ?>
             <li><a href="?pagina=<?php echo $pagina - 1 ?>">&laquo;</a></li>
       <?php endif; ?>

       <!-- Ejecutamos un ciclo para los botones de las paginas  -->
       <?php 
        for ($i = 1; $i <= $numeroPagina ; $i++) { 
           if ($pagina == $i) {
             echo "<li class='active'><a href='?pagina=$i'>$i</a></li>";
           }else{
             echo "<li><a href='?pagina=$i'>$i</a></li>";
           }
        }
        ?>

        <!-- Configuro el ultimo boton desabilitado en la ultima pag y siguiente en las otras  -->
         <?php if($pagina == $numeroPagina): ?>
             <li class="disabled">&raquo;</li>
       <?php else: ?>
             <li><a href="?pagina=<?php echo $pagina + 1 ?>">&raquo;</li>
       <?php endif; ?>
      

      <!--Ejemplo de como lo tenia al principio solo para que se vieran los botones
      <li class="active"><a href="#">1</a></li>
      <li><a href="#">2</a></li>
      <li><a href="#">3</a></li>
      <li><a href="#">4</a></li>
      <li><a href="#">&raquo;</a></li>-->
    </ul>
  </section>   
        
</div>
      

</body>
</html>	
