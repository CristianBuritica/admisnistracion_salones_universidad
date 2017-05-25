<?php
header("access-control-allow-origin: *");
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Administración de salones</title>
	<link rel="stylesheet" href="css/materialize.css" />
	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="js/materialize.js"></script>

	<script type="text/javascript">
		$(document).ready(function(){
			$('.modal').modal({
				opacity: .90
			});
		});
	</script>
</head>
<body>
	<?php
		include'conexion.php';
	?>

	<div>
			<form method="post">
			<br/>
  			<div style="float: left; padding-left:20px; padding-right:20px;">
  			<label>Capacidad</label>
  			<select name="capacidad" class="browser-default">
    			<option value="" disabled selected>Seleccione una opcion..</option>
    			<?php   
        		while ($resultado = mysqli_fetch_array($query_capacidad)){
            		echo "<option  value='".$resultado['id_salon']."'>".$resultado['capacidad']."</option>";
        		}
    			?>   
  			</select>
  			</div>

  			<div style="float: left; padding-right:20px;">
  			<label>Piso</label>
  			<select name="piso" class="browser-default">
    			<option value="" disabled selected>Seleccione una opcion..</option>
    			<?php   
        		while ($resultado = mysqli_fetch_array($query_pisos)){
            		echo "<option  value='".$resultado['id_piso']."'>".$resultado['numero_piso']."</option>";
        		}
    			?>   
  			</select>
  			</div>

  			<div style="float: left; padding-right:20px;">
  			<label>Servicios</label>
  			<select name="servicios" class="browser-default">
    			<option value="" disabled selected>Seleccione una opcion..</option>
    			<?php   
        		while ($resultado = mysqli_fetch_array($query_servicios)){
            		echo "<option  value='".$resultado['id_servicio']."'>".$resultado['tipo_servicio']."</option>";
        		}
    			?>   
  			</select>
  			</div>

  			<div style="float: left; padding-right:20px;">
  			<label>Tipo salon</label>
  			<select name="tipo_salon" class="browser-default">
    			<option value="" disabled selected>Seleccione una opcion..</option>
    			<?php   
        		while ($resultado = mysqli_fetch_array($query_tipo)){
            		echo "<option  value='".$resultado['id_tipo']."'>".$resultado['tipo_salon']."</option>";
        		}
    			?>   
  			</select>
  			</div>

  			<div style="padding-top: 25px">
  			<button class="btn waves-effect waves-light" type="submit" name="action">Buscar
    			<i class="material-icons right">send</i>
  			</button>
  			</div>
  			</form>
  	</div><br/>


  	  <div style="padding-left: 20px">
  	  	<a class="waves-effect waves-light btn" href="#modal1">Reservar/Entregar salon</a>
  	  	<a class="waves-effect waves-light btn" href="#modal_ingresar_modificar">Modificar / Insertar</a>
  	  </div>

  <!-- Modal Structure -->
  <div id="modal1" class="modal">
    <div class="modal-content">
      <form method="post">
  			<div style="width:auto; float: left; padding-right:20px;">
  			<h4>RESERVAR/ENTREGAR SALON</h4>
      		<label>Numero salon</label>
  			<select name="salon_reservar" class="browser-default">
    			<option value="" disabled selected>Seleccione una opcion..</option>
    			<?php   
        		while ($resultado = mysqli_fetch_array($query_numSalonReserva)){
            		echo "<option  value='".$resultado['id_salon']."'>".$resultado['numero_salon']."</option>";
        		}
    			?>   
  			</select>

  			<label>Numero salon</label>
  			<select name="salon_entregar" class="browser-default">
    			<option value="" disabled selected>Seleccione una opcion..</option>
    			<?php   
        		while ($resultadoEntrega = mysqli_fetch_array($query_numSalonEntrega)){
            		echo "<option  value='".$resultadoEntrega['id_salon']."'>".$resultadoEntrega['numero_salon']."</option>";
        		}
    			?>   
  			</select>
  			</div>
  			<div style="padding-top: 78px;">
  			<button class="btn waves-effect waves-light" type="submit" name="reservar">Reservar
    			<i class="material-icons right">send</i>
  			</button><br><br>
  			<button class="btn waves-effect waves-light" type="submit" name="entregar">Entregar
    			<i class="material-icons right">send</i>
  			</button>
  			</div>
  			
  	</form>
    </div>
  </div>

  <!-- Modal Structure -->
  <div id="modal_ingresar_modificar" class="modal">
    <div class="modal-content">
    	<form method="post">
    		<input type="password" name="pass" id="pass"><br>
  			<button class="btn waves-effect waves-light" type="submit" name="modificar">Ingresar a editar
    			<i class="material-icons right">send</i>
  			</button>

  			<button class="btn waves-effect waves-light" type="submit" name="insertar">Ingresar a registrar
    			<i class="material-icons right">send</i>
  			</button>
  		</form>
    </div>
  </div>


	<div style="margin-left:auto; margin-right:auto">
	<table class="striped centered">
	<thead>
          			<tr>
              			<th>ID salon</th>
              			<th>Numero salon</th>
              			<th>Capcidad</th>
              			<th>Numero piso</th>
              			<th>Tipo salon</th>
              			<th>Tipo servicio</th>
              			<th>Estado</th>
          			</tr>
        		</thead>
        		<tbody>
	<?php  
		while ($resultado = mysqli_fetch_array($query)) 
			{ ?> 
          			<tr>
            			<td><?php echo $resultado['id_salon'] ?></td>
            			<td><?php echo $resultado['numero_salon'] ?></td>
            			<td><?php echo $resultado['capacidad'] ?></td>
            			<td><?php echo $resultado['numero_piso'] ?></td>
            			<td><?php echo $resultado['tipo_salon'] ?></td>
            			<td><?php echo $resultado['tipo_servicio'] ?></td>
            			<td><?php echo $resultado['estado'] ?></td>
          			</tr>
      <?php } ?>
   		</tbody>
   		</table>
   	</div>
</body>
</html>
