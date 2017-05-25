<?php  
header("access-control-allow-origin: *");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Administración de salones</title>
	<link rel="stylesheet" href="css/materialize.css" />
	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="js/materialize.js"></script>
</head>
<body>
<?php
	include'conexion.php';
?>
<div style="width: 850px; border-style: solid; border-width: 1px; margin-left:auto; margin-right:auto; margin-top: 50px">

    <div class="row">
        <form method="post" class="col s12">
            <div class="row">
                <div class="input-field col s6">
                    <input type="text" id="ingresar_numero_salon" name="ingresar_numero_salon" class="validate">
                    <label for="ingresar_numero_salon">Numero salon</label>
                </div>
                <div class="input-field col s6">
                    <input  type="text" id="ingresar_capacidad" name="ingresar_capacidad" class="validate">
                    <label for="ingresar_capacidad">Capacidad</label>
                </div>
            </div>
            <div style="float: left; padding-right:20px;">
                <label>Piso</label>
                <select name="ingresar_piso" class="browser-default">
                    <option value="" disabled selected>Seleccione una opcion..</option>
                    <?php   
                    while ($resultado = mysqli_fetch_array($query_pisos)){
                    echo "<option  value='".$resultado['id_piso']."'>".$resultado['numero_piso']."</option>";
                    }
                    ?>   
                </select>
            </div>

            <div style="float: left; padding-right:20px;">
                <label>Tipo salon</label>
                <select name="ingresar_tipo" class="browser-default">
                    <option value="" disabled selected>Seleccione una opcion..</option>
                    <?php   
                    while ($resultado = mysqli_fetch_array($query_tipo)){
                    echo "<option  value='".$resultado['id_tipo']."'>".$resultado['tipo_salon']."</option>";
                    }
                    ?>   
                </select>
            </div>

            <div style="float: left; padding-right:20px;">
                <label>Servicios</label>
                <select name="ingresar_servicio" class="browser-default">
                    <option value="" disabled selected>Seleccione una opcion..</option>
                    <?php   
                    while ($resultado = mysqli_fetch_array($query_servicios)){
                    echo "<option  value='".$resultado['id_servicio']."'>".$resultado['tipo_servicio']."</option>";
                    }
                    ?>   
                </select>
            </div>
    
            <div style="padding-top: 20px;">
                <button class="btn waves-effect waves-light" type="submit" name="aplicar_inserccion">Insertar
                    <i class="material-icons right">send</i>
                </button>
            </div>
        </form>
    </div>
</div>
</body>
</html>