<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Logeate</title>
  <link rel="stylesheet" href="css/login.css">
  <link rel="stylesheet" type="text/css" href="css/lib/bootstrap.css">
</head>
<body>
  <section class="container" ng-app="loginApp" ng-controller="loginController">
    <div class="login">
      <h1>Logeate</h1>
      <form name="loginForm" ng-submit="submitForm(loginForm.$valid)" novalidate >
        <p><input type="text" placeholder="Nombre de usuario" ng-model="username" required></p>
        <p><input type="password" placeholder="Contraseña" ng-model="password" required></p>
        <p class="submit"><input type="submit" value="Login" ng-disabled="loginForm.$invalid"></p>
      </form>
    </div>

  </section>

<script type="text/javascript" src="js/lib/jquery.min.js"></script>
<script type="text/javascript" src="js/lib/bootstrap.js"></script>
<script type="text/javascript" src="js/lib/angular.min.js"></script>
<script type="text/javascript" src="js/login.js"></script>
</body>
</html>
