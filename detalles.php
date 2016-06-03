<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8"/>
    <title>Carrito de Compras</title>
    <link rel="stylesheet" type="text/css" href="./css/estilos.css">
    <script type="text/javascript"  href="./js/scripts.js"></script>
</head>
<body>
    <header>
	<img src="./images/Logo/logo.png" id="logo">
	<a href="./carritodecompras.php" title="ver carrito de compras">
	    <img src="./images/Carrito/carrito.png">
	</a>
    </header>
    
    <div id="horizontal">
        <nav class="menu2">
            <menu>
                <li><a href="index.php">Home</a></li>
                <li><a href="#" class="selected">Detalles Compra</a></li>
                <li><a href="login_cliente/cerrarcliente.php">Log Out</a></li>
            </menu>
        </nav>		
    </div>
    
    <section>	
    <?php
	include 'conexion.php';
	$re=mysql_query("select * from producto where id_prod=".$_GET['id_prod'])or die(mysql_error());
	while ($f=mysql_fetch_array($re)) {
    ?>
			
    <center>
	<img src="./productos/<?php echo $f['imagen'];?>"><br>
	<span><?php echo $f['nom_prod'];?></span><br>
	<span>Precio: <?php echo $f['precio'];?></span><br>
	<a href="./carritodecompras.php?id_prod=<?php  echo $f['id_prod'];?>">Añadir al carrito de compras</a>
    </center>
		
    <?php
	}
    ?>						
    </section>
</body>
</html>