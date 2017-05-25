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
	<a href="index.php">Atras</a>
<form method="POST">
	<div style="width:auto; float: left; margin-left: 10px; margin-top: 5px; padding-right:20px;">
	<label>Numero salon</label>
  	<select name="salon_modificar" class="browser-default">
    	<option value="" disabled selected>Seleccione una opcion..</option>
    	<?php   
        	while ($resultado = mysqli_fetch_array($query_modificarSalon)){
            	echo "<option  value='".$resultado['id_salon']."'>".$resultado['numero_salon']."</option>";
        	}
    	?>   
  	</select>
  	</div>
  	<div style="padding-top: 30px;">
  		<button class="btn waves-effect waves-light" type="submit" name="consulta_modificar">Consultar
    		<i class="material-icons right">send</i>
  		</button>
  	</div>
</form><br><br>

<div class="row">
<form method="post" class="col s12">
	<?php
	$resultadoMod = mysqli_fetch_array($query);

	echo "<div class='row'>";
	echo 	"<div class='input-field col s6'>";
	echo 		"<input type='text' readonly name='mod_id_salon' class='validate' id='mod_id_salon' value='".$resultadoMod['id_salon']."'> ";
	echo 		"<label for='mod_id_salon'>ID salon</label>";
	echo 	"</div>";
	echo "</div>";

	echo "<div class='row'>";
	echo 	"<div class='input-field col s6'>";
	echo 		"<input type='text' class='validate' id='mod_num_salon' name='modificar_numero_salon' value='".$resultadoMod['numero_salon']."'> ";
	echo 		"<label for='mod_num_salon'>Numero salon</label>";
	echo 	"</div>";
	echo 	"<div class='input-field col s6'>";
	echo 		"<input type='text' name='modificar_capacidad' class='validate' id='mod_capacidad' value='".$resultadoMod['capacidad']."'> ";
	echo 		"<label for='mod_capacidad'>Capcidad</label>";
	echo 	"</div>";
	echo "</div>";
	?>

	<div style="float: left; padding-right:20px;">
  			<label>Piso [Piso actual = <?php echo $resultadoMod['numero_piso']; ?>]</label>
  			<select name="modificar_piso" class="browser-default">
    			<option value="" disabled selected>Seleccione una opcion..</option>
    			<?php   
        		while ($resultado = mysqli_fetch_array($query_pisos)){
            		echo "<option  value='".$resultado['id_piso']."'>".$resultado['numero_piso']."</option>";
        		}
    			?>   
  			</select>
  	</div>

	<div style="float: left; padding-right:20px;">
  			<label>Tipo salon [Salon actual = <?php echo $resultadoMod['tipo_salon']; ?>]</label>
  			<select name="modificar_tipo" class="browser-default">
    			<option value="" disabled selected>Seleccione una opcion..</option>
    			<?php   
        		while ($resultado = mysqli_fetch_array($query_tipo)){
            		echo "<option  value='".$resultado['id_tipo']."'>".$resultado['tipo_salon']."</option>";
        		}
    			?>   
  			</select>
  	</div>

  	<div style="float: left; padding-right:20px;">
  			<label>Servicios [Servicio actual = <?php echo $resultadoMod['tipo_servicio']; ?>]</label>
  			<select name="modificar_servicio" class="browser-default">
    			<option value="" disabled selected>Seleccione una opcion..</option>
    			<?php   
        		while ($resultado = mysqli_fetch_array($query_servicios)){
            		echo "<option  value='".$resultado['id_servicio']."'>".$resultado['tipo_servicio']."</option>";
        		}
    			?>   
  			</select>
  	</div>
	
	<div style="padding-top: 20px;">
  		<button class="btn waves-effect waves-light" type="submit" name="aplicar_modificacion">Modificar
    		<i class="material-icons right">send</i>
  		</button>
  	</div>
  	<div style="padding-top: 20px;">
  		<button class="btn waves-effect waves-light" type="submit" name="aplicar_mod_null_servicio">Insertar servicio
    		<i class="material-icons right">send</i>
  		</button>
  	</div>
</form>
</div>
</div>
</body>
</html>