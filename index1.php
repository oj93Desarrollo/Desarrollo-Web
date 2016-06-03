<?php
header('Content-Type: text/html; charset=ISO-8859-1');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8"/>
    <title>Carrito de Compras</title>
    <link rel="stylesheet" type="text/css" href="./css/estilos.css">
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script type="text/javascript"  href="./js/scripts.js"></script>
</head>

<body>
    <header>
	<img src="./images/Logo/logo.png" id="logo">
	<a href="#" title="ver carrito de compras">
	    <img src="./images/Carrito/carrito.png">
	</a>
    </header>
    
    <section>
        <div id="horizontal">
            <nav class="menu2">
                <menu>
                    <li><a href="#" class="selected">Home</a></li>
                    <li><a href="logincliente.php">Login</a></li>
                    <li><a href="./cliente/agregarcliente.php">Sign In</a></li>
                </menu>
            </nav>	
        </div>
    <?php
	include 'conexion.php';
	$re=mysql_query("select * from producto")or die(mysql_error());
	while ($f=mysql_fetch_array($re)) {
    ?>
	    <div class="producto">
	        <center>
		    <img src="./productos/<?php echo $f['imagen'];?>"><br>
		    <span><?php echo $f['nom_prod'];?></span><br>
		    <a href="#">ver</a>
	        </center>
	    </div>
    <?php
	}
    ?>					
    </section>	
</body>
</html>