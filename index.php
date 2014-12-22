<?php 
    session_start();

    if(!isset($_SESSION['username']))
    {
      header("Location: login.php");
    }
?>
<!doctype html>
<html ng-app="tareas">
<head> 
	<meta charset="utf-8">
	<title>Tareas</title>
	<link rel="stylesheet" type="text/css" href="css/lib/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/lib/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/index.css">
</head>
<body>

	<div id="header">
		<ul class="nav nav-pills pull-right" role="tablist">  
  			<li role="presentation" style="margin-top:2px;"><a href="#" data-toggle="modal" data-target="#Agregar"><i class="fa fa-plus-square-o"></i></a></li>
  			<li role="presentation"><a href="#/tareas">Tareas</a></li>
  			<li role="presentation"><a href="#/horario">Horario</a></li>
  			<li role="presentation"><a href="php/salir.php">Salir</a></li> 
		</ul>
	</div>

	<div ng-view></div>




<script type="text/javascript" src="js/lib/jquery.min.js"></script>
<script type="text/javascript" src="js/lib/bootstrap.min.js"></script>
<script type="text/javascript" src="js/lib/angular.min.js"></script>
<script type="text/javascript" src="js/lib/angular-route.min.js"></script>
<script type="text/javascript" src="js/lib/angular-resource.min.js"></script>
<script type="text/javascript" src="js/app.js"></script>
</body>
</html>