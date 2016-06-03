<?php
    session_start(); //indica que vamos a usar variables de sesion!
    
    include './conexion.php';
    
    if(isset($_SESSION['carrito'])){ //Verificamos si existe la variable de sesion carrito
	if(isset($_GET['id_prod'])){
	    $arreglo=$_SESSION['carrito'];//Estas variables nos van a servir para el for
	    $encontro=false;
	    $numero=0;
	    for($i=0;$i<count($arreglo);$i++){ //recorremos el arreglo con la variable i que ya sabemos que trae 
		if($arreglo[$i]['Id']==$_GET['id_prod']){ 
		    $encontro=true;
		    $numero=$i;
		}
	    }
	    if($encontro==true){//Si encontro es igual a true vamos a incrementar +1 la cantidad
		$arreglo[$numero]['Cantidad']=$arreglo[$numero]['Cantidad']+1;
		$_SESSION['carrito']=$arreglo;
	    }else{
		$nombre="";
		$precio=0;
		$imagen="";
		$re=mysql_query("select * from producto where id_prod=".$_GET['id_prod']); //Concatenamos por el id_prod y guardamos en la variable re
		    while ($f=mysql_fetch_array($re)) {// Guardamos en la variable f lo que arroje la base de datos y le pasamos la variable de la consulta re
			$nombre=$f['nom_prod'];
			$precio=$f['precio'];
			$imagen=$f['imagen'];
		    }
		$datosNuevos=array('Id'=>$_GET['id_prod'],//Hacemos un arreglo por id_prod de nuevos productos para agregar
		'Nom_prod'=>$nombre,
		'Precio'=>$precio,
		'Imagen'=>$imagen,
		'Cantidad'=>1);

		array_push($arreglo, $datosNuevos);
		$_SESSION['carrito']=$arreglo;
	    }
	}
    }else{
	if(isset($_GET['id_prod'])){
	    $nombre="";
	    $precio=0;
	    $imagen="";
	    $re=mysql_query("select * from producto where id_prod=".$_GET['id_prod']);
	    while ($f=mysql_fetch_array($re)) {
		$nombre=$f['nom_prod'];
		$precio=$f['precio'];
		$imagen=$f['imagen'];
	    }
	    $arreglo[]=array('Id'=>$_GET['id_prod'],
	    'Nom_prod'=>$nombre,
	    'Precio'=>$precio,
	    'Imagen'=>$imagen,
	    'Cantidad'=>1);
	    $_SESSION['carrito']=$arreglo;
	}
    }
?>

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
    <script type="text/javascript"  src="./js/scripts.js"></script>
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
                <li><a href="#" class="selected">Carrito</a></li>
                <li><a href="login_cliente/cerrarcliente.php">Log Out</a></li>
            </menu>
        </nav>		
    </div>
    
    <section>
	<?php
	    $total=0;
	    if(isset($_SESSION['carrito'])){
		$datos=$_SESSION['carrito'];
		
		$total=0;
		for($i=0;$i<count($datos);$i++){
				
	?>
		    <div class="producto">
			<center>
			    <img src="./productos/<?php echo $datos[$i]['Imagen'];?>"><br>
			    <span >Nombre: <?php echo $datos[$i]['Nom_prod'];?></span><br>
			    <span>Precio: $<?php echo $datos[$i]['Precio'];?></span><br>
			    <span>Cantidad: 
			        <input type="text" value="<?php echo $datos[$i]['Cantidad'];?>"
				data-precio="<?php echo $datos[$i]['Precio'];?>"
				data-id="<?php echo $datos[$i]['Id'];?>"
				class="cantidad" />
			    </span><br>
			    <span class="subtotal">Subtotal: $<?php echo $datos[$i]['Cantidad']*$datos[$i]['Precio'];?></span><br>
			    <a href="#" class="eliminar" data-id="<?php echo $datos[$i]['Id']?>">Eliminar</a>
			</center>
		    </div>
	<?php
		    $total=($datos[$i]['Cantidad']*$datos[$i]['Precio'])+$total;
		}				
	    }else{
		echo '<center><h2>No has añadido ningun producto</h2></center>';
	    }
	    echo '<center><h2 id="total">Total: $'.$total.'</h2></center>';
	    if($total!=0){//esconde el boton comprar si el carrito esta vacio
            
	echo '<center><a href="./compras/compras.php" class="aceptar">Comprar</a></center>';
	
        
        /* 
        <?            
            <form action="https://www.paypal.com/cgi-bin/webscr" method="post" id="formulario">
         
                <input type="hidden" name="cmd" value="_cart">
                <input type="hidden" name="upload" value="1">
                <input type="hidden" name="business" value="itzel.hurta@gmail.com">
                <input type="hidden" name="currency_code" value="MXN">
					
                <?php 
                    for($i=0;$i<count($datos);$i++){
                ?>
                    <input type="hidden" name="item_name_<?php echo $i+1;?>" value="<?php echo $datos[$i]['Nom_prod'];?>">
                    <input type="hidden" name="amount_<?php echo $i+1;?>" value="<?php echo $datos[$i]['Precio'];?>">
                    <input type="hidden" name="quantity_<?php echo $i+1;?>" value="<?php echo $datos[$i]['Cantidad'];?>">	
                <?php 
                        }
                ?>						
		<center><input type="submit" value="comprar" class="aceptar" style="width:200px"></center>
	    </form>
	<?php         
         */
	    }			
	?>
	    <center><a href="./">Ver Catálogo</a></center>
    </section>
</body>
</html>