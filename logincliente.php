<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8"/>
    <title>Panel de Administración</title>
    <link rel="stylesheet" type="text/css" href="./css/estilos.css">
    <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">    
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
    
    <div id="horizontal">
        <nav class="menu2">
            <menu>
                    <li><a href="index1.php">Home</a></li>
                    <li><a href="#" class="selected">Login</a></li>
                    <li><a href="cliente/agregarcliente.php" >Sign In</a></li>
            </menu>
        </nav>		
    </div>
    
    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">Iniciar Sesion Cliente</div>
                    <div class="panel-body"> 
                        <div class="alert alert-danger text-center" style="display:none;" id="error">
                            <p>Usuario o Password no identificados</p>
                        </div>                     
                        <form role="form" id="formulario" method="post" action="./login_cliente/verificarcliente.php">
                            <?php 
	                        if(isset($_GET['error'])){
		                    echo '<center>Datos No Validos</center>';
	                        }
                            ?>
                            <div class="form-group">
                                <label for="usuario">Usuario:</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                    <input type="text" class="form-control" name="Usuario" id="usuario" placeholder="Usuario">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-star"></span></span>
                                    <input type="password" class="form-control" name="Password" id="password" placeholder="Password">
                                </div>
                            </div>                     
                            <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-lock"></span> Entrar</button>   
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>