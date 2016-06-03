<?php
session_start();
    include "conexion.php";
    if(isset($_SESSION['Usuario'])){
            
    }else{
	header("Location: ./index.php?Error=Acceso denegado");
    }
?>

<?php
header('Content-Type: text/html; charset=ISO-8859-1');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8"/>
    <title>Panel de AdministraciÃ³n</title>
    <link rel="stylesheet" type="text/css" href="./css/estilos.css">
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script type="text/javascript"  href="./js/scripts.js"></script>
</head>
<body>
    <header>
	<img src="./images/Logo/logo.png" id="logo">
	<a href="./carritodecompras.php" title="ver carrito de compras">
	    <img src="./images/Carrito/carrito.png">
	</a>
    </header>
    
    <section>
        <div id="horizontal">
            <nav class="menu2">
                <menu>
                    <li><a href="./">Home</a></li>
                    <li><a href="#" class="selected">Últimas Compras</a></li>
                    <li><a href="./admin/agregarproducto.php" >Agregar</a></li>
                    <li><a href="./admin/modificar.php" >Modificar</a></li>
                    <li><a href="./admin/reporte.php">Reportes</a></li>
                    <li><a href="./login/cerrar.php">Log Out</a></li>
                </menu>
            </nav>
        </div>
        
	<center><h1>Últimas Compras</h1></center>
	<table border="0px" width="100%">	
	    <tr>		
                <td>Imagen</td>
		<td>Id. Cliente</td>
                <td>Nombre</td>
		<td>Precio</td>
		<td>Cantidad</td>
		<td>Subtotal</td>
	    </tr>	

	<?php
	    $re=mysql_query("select * from compras");//salvamos la consulta de la tabla compras
	    $numeroventa=0;//guardamos numero de venta
	    while ($f=mysql_fetch_array($re)) {
		if($numeroventa	!=$f['numeroventa']){//checamos que numero de venta sea diferente al del de la BD
		    echo '<tr><th colspan="6">Compra Número: '.$f['numeroventa'].' </th></tr>';
		}
                //si es igual sigue su curso y sigue imprimiendo
		$numeroventa=$f['numeroventa'];
		echo '<tr>                    
                        <td><img src="./productos/'.$f['imagen'].'" width="100px" heigth="100px" /></td>
                        <td>'.$f['id_cliente'].'</td>
                        <td>'.$f['nombre'].'</td>
                        <td>'.$f['precio'].'</td>
                        <td>'.$f['cantidad'].'</td>
                        <td>'.$f['subtotal'].'</td>
		    </tr>';
	    }         
	?>
	</table>
    </section>
</body>
</html>