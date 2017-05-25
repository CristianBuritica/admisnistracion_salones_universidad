<?php
	header("access-control-allow-origin: *");
	error_reporting (0);
	$conexion = mysqli_connect("localhost", "id1765163_root", "cristianjc", "id1765163_administracion_salones") or die("Error a la base de datos");
	$where="";


		if (isset($_POST['action']))
		{
			if ($_POST['capacidad'] AND $_POST['piso'] AND $_POST['servicios'] AND $_POST['tipo_salon']) {
				$where="where sa.id_salon = '" . $_REQUEST['capacidad'] . "'
						AND sa.id_piso = '" . $_REQUEST['piso'] . "'
						AND se.id_servicio = '" . $_REQUEST['servicios'] . "'
						AND sa.id_tipo = '" . $_REQUEST['tipo_salon'] . "' ";
			}
			else if ($_POST['capacidad'] AND $_POST['piso'] AND $_POST['servicios']) {
				$where="where sa.id_salon = '" . $_REQUEST['capacidad'] . "'
						AND sa.id_piso = '" . $_REQUEST['piso'] . "'
						AND se.id_servicio = '" . $_REQUEST['servicios'] . "' ";
			}
			else if ($_POST['capacidad'] AND $_POST['piso'] AND $_POST['tipo_salon']) {
				$where="where sa.id_salon = '" . $_REQUEST['capacidad'] . "'
						AND sa.id_piso = '" . $_REQUEST['piso'] . "'
						AND sa.id_tipo = '" . $_REQUEST['tipo_salon'] . "' ";
			}
			else if ($_POST['capacidad'] AND $_POST['servicios'] AND $_POST['tipo_salon']) {
				$where="where sa.id_salon = '" . $_REQUEST['capacidad'] . "'
						AND se.id_servicio = '" . $_REQUEST['servicios'] . "'
						AND sa.id_tipo = '" . $_REQUEST['tipo_salon'] . "' ";
			}
			else if ($_POST['piso'] AND $_POST['servicios'] AND $_POST['tipo_salon']) {
				$where="where sa.id_piso = '" . $_REQUEST['piso'] . "'
						AND se.id_servicio = '" . $_REQUEST['servicios'] . "'
						AND sa.id_tipo = '" . $_REQUEST['tipo_salon'] . "' ";
			}
			else if ($_POST['capacidad'] AND $_POST['piso'] ) {
				$where="where sa.id_salon = '" . $_REQUEST['capacidad'] . "'
						AND sa.id_piso = '" . $_REQUEST['piso'] . "'";
			}
			else if ($_POST['capacidad'] AND $_POST['servicios'] ) {
				$where="where sa.id_salon = '" . $_REQUEST['capacidad'] . "'
						AND se.id_servicio = '" . $_REQUEST['servicios'] . "'";
			}
			else if ($_POST['capacidad'] AND $_POST['tipo_salon'] ) {
				$where="where sa.id_salon = '" . $_REQUEST['capacidad'] . "'
						AND sa.id_tipo = '" . $_REQUEST['tipo_salon'] . "'";
			}
			else if ($_POST['piso'] AND $_POST['servicios'] ) {
				$where="where sa.id_piso = '" . $_REQUEST['piso'] . "'
						AND se.id_servicio = '" . $_REQUEST['servicios'] . "'";
			}
			else if ($_POST['piso'] AND $_POST['tipo_salon'] ) {
				$where="where sa.id_piso = '" . $_REQUEST['piso'] . "'
						AND sa.id_tipo = '" . $_REQUEST['tipo_salon'] . "'";
			}
			else if ($_POST['servicios'] AND $_POST['tipo_salon'] ) {
				$where="where se.id_servicio = '" . $_REQUEST['servicios'] . "'
						AND sa.id_tipo = '" . $_REQUEST['tipo_salon'] . "'";
			}
			else if ($_POST['capacidad'])
			{
				$where="where sa.id_salon = '" . $_REQUEST['capacidad'] . "' ";
			}
			else if ($_POST['piso'])
			{
				$where="where sa.id_piso = '" . $_REQUEST['piso'] . "' ";
			}
			else if ($_POST['servicios'])
			{
				$where="where se.id_servicio = '" . $_REQUEST['servicios'] . "' ";
			}
			else if ($_POST['tipo_salon'])
			{
				$where="where sa.id_tipo = '" . $_REQUEST['tipo_salon'] . "' ";
			}
		}

		if (isset($_POST['reservar']))
		{
			if ($_POST['salon_reservar'])
			{
				$reservado = "UPDATE salones sa SET estado = 'ocupado' WHERE sa.id_salon = '". $_REQUEST['salon_reservar'] ."'";
				mysqli_query($conexion,$reservado);
			}
		}

		if (isset($_POST['entregar']))
		{
			if ($_POST['salon_entregar'])
			{
				$entregado = "UPDATE salones sa SET estado = 'disponible' WHERE sa.id_salon = '". $_REQUEST['salon_entregar'] ."'";
				mysqli_query($conexion,$entregado);
			}
		}

		/** Consulto el numero del salon a modificar */
		if (isset($_POST['consulta_modificar']))
		{
			if ($_POST['salon_modificar'])
			{
				$where="where sa.id_salon = '" . $_REQUEST['salon_modificar'] . "' ";
			}
		}

		/** confirmar contraseña para ingresar a modificar.php */
		if (isset($_POST['modificar'])) {
			$consultar_administrador = "SELECT contrasenia FROM administrador WHERE id_administrador = 1 ";
			$query_administrador = mysqli_query($conexion,$consultar_administrador);
			$resultado_admin = mysqli_fetch_array($query_administrador);
			if ($_REQUEST['pass'] == $resultado_admin['contrasenia']) {
				header('Location: modificar.php');
			}
			
		}

		/** confirmar contraseña para ingresar a insertar.php */
		if (isset($_POST['insertar'])) {
			$consultar_administrador = "SELECT contrasenia FROM administrador WHERE id_administrador = 1 ";
			$query_administrador = mysqli_query($conexion,$consultar_administrador);
			$resultado_admin = mysqli_fetch_array($query_administrador);
			if ($_REQUEST['pass'] == $resultado_admin['contrasenia']) {
				header('Location: insertar.php');
			}
			
		}

		/** Aplicar modificacion */
		if (isset($_POST['aplicar_modificacion']))
		{
			if ($_POST['mod_id_salon'] AND $_POST['modificar_numero_salon'] AND $_POST['modificar_capacidad'] AND $_POST['modificar_piso'] AND $_POST['modificar_tipo'] AND $_POST['modificar_servicio'])
			{
				$modificar = "UPDATE salones SET numero_salon ='".$_REQUEST['modificar_numero_salon']."', 
				capacidad='".$_REQUEST['modificar_capacidad']."', id_piso ='".$_REQUEST['modificar_piso']."',
				id_tipo='".$_REQUEST['modificar_tipo']."' WHERE id_salon = '".$_REQUEST['mod_id_salon']."' ";
				mysqli_query($conexion,$modificar);

				$modificar_servicio = "UPDATE salones_servicios SET id_servicio = '".$_REQUEST['modificar_servicio']."'
				WHERE id_salon = '".$_REQUEST['mod_id_salon']."'";
				mysqli_query($conexion,$modificar_servicio);
			}
		}

		if(isset($_POST['aplicar_mod_null_servicio'])){
			if($_POST['mod_id_salon'] AND $_POST['modificar_servicio']){
				$insertar_mod_servicio = "INSERT INTO salones_servicios (id_salon, id_servicio)
							VALUES (".$_REQUEST['mod_id_salon'].", ".$_REQUEST['modificar_servicio'].") ";
				mysqli_query($conexion,$insertar_mod_servicio);
			}
		}



		/** Aplicar inserccion */
		if (isset($_POST['aplicar_inserccion']))
		{
			if ($_POST['ingresar_numero_salon'] AND $_POST['ingresar_capacidad'] AND $_POST['ingresar_piso'] AND $_POST['ingresar_tipo'] AND $_POST['ingresar_servicio'])
			{
				$insertar = "INSERT INTO salones (id_salon, numero_salon, capacidad, id_piso, id_tipo, estado)
							VALUES (NULL, '".$_REQUEST['ingresar_numero_salon']."', '".$_REQUEST['ingresar_capacidad']."',
						'".$_REQUEST['ingresar_piso']."', '".$_REQUEST['ingresar_tipo']."', 'disponible') ";
				mysqli_query($conexion,$insertar);
			}
		}


		$consulta = "SELECT sa.id_salon, numero_salon, capacidad, numero_piso, tipo_salon, tipo_servicio, estado
					FROM salones sa LEFT JOIN piso p ON sa.id_piso = p.id_piso LEFT JOIN tipo t ON sa.id_tipo = t.id_tipo
					LEFT JOIN salones_servicios ss ON sa.id_salon = ss.id_salon LEFT JOIN  servicios se ON se.id_servicio = ss.id_servicio
					$where";

		$consulta_numSalones = "SELECT * FROM salones";
		$consulta_capacidad = "SELECT * FROM salones";
		$consulta_pisos = "SELECT * FROM piso";
		$consulta_servicios = "SELECT * FROM servicios";
		$consulta_tipo = "SELECT * FROM tipo";

		$reservarSalon = "SELECT * FROM salones WHERE estado = 'disponible'";
		$entregarSalon = "SELECT * FROM salones WHERE estado = 'ocupado'";
		$modificarSalon = "SELECT * FROM salones";
		$modificarCapacidad = "SELECT * FROM salones";

		$query = mysqli_query($conexion,$consulta);
		$query_numSalones = mysqli_query($conexion,$consulta_numSalones);
		$query_capacidad = mysqli_query($conexion,$consulta_capacidad);
		$query_pisos = mysqli_query($conexion,$consulta_pisos);
		$query_servicios = mysqli_query($conexion,$consulta_servicios);
		$query_tipo = mysqli_query($conexion,$consulta_tipo);
		$query_numSalonReserva = mysqli_query($conexion,$reservarSalon);
		$query_numSalonEntrega = mysqli_query($conexion,$entregarSalon);
		$query_modificarSalon = mysqli_query($conexion,$modificarSalon);
		$query_modificarCapacidad = mysqli_query($conexion,$modificarCapacidad);
?>