<?php 

	header("Access-Control-Allow-Orgin: *");
	header("Access-Control-Allow-Methods: *");
	header("Content-Type: application/json");

	include "../conect.php";
	$conect = new CONEXION();

	$postdata = file_get_contents("php://input");
	$request = json_decode($postdata);
	@$id  = $request->id;
	@$tarea = $request->tarea;
	@$materia = $request->materia;

	switch($_SERVER["REQUEST_METHOD"])
	{
		case 'GET':
			gesGet();
		break;

		case 'POST':
			gesPost($id, $tarea, $materia);
		break;

		case 'PUT':
			gesPut($tarea);
		break;

		case 'DELETE':
			gesDelete();
		break;
	}

	function gesGet()
	{
		$datos = array();

		$partes = parse_url($_SERVER["REQUEST_URI"]);
		$parametro = explode('/', $partes['path'])[5];

		$peticion = "SELECT * FROM agenda";
		$peticion.= $parametro == "" ? "" : " WHERE id = $parametro";

		$sql = mysql_query($peticion);
		$i = 0;
		while($fila = mysql_fetch_array($sql))
		{
			$datos[$i] = array(
				'id' => $fila['id'],
				'tarea' => $fila['tarea'],
				'materia' => $fila['materia']
				);
			$i++;
		}

		$send = json_encode($datos);
		echo $send;		
	}

	function gesPost($id, $tarea, $materia)
	{
		$peticion = "INSERT INTO agenda(id, tarea, materia) VALUES ($id, '$tarea', '$materia')";
		mysql_query($peticion);
	}

	function gesPut($tarea)
	{
		$partes = parse_url($_SERVER["REQUEST_URI"]);
		$id = explode('/', $partes['path'])[5];
		
		$peticion = "UPDATE agenda SET tarea='$tarea' WHERE id = $id";
		mysql_query($peticion);
	}

	function gesDelete()
	{
		$partes = parse_url($_SERVER["REQUEST_URI"]);
		$id = explode('/', $partes['path'])[5];

		$peticion = "DELETE FROM agenda WHERE id = $id";
		mysql_query($peticion);
	}



 ?>