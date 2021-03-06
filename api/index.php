
<?php
/**
 * Plik zawiera skrypt tworzący główną strone wityny
 */

session_start();



?>
<!DOCTYPE html>
<html>
 <head>
  <title>Projekt inżynierski ankiety</title>

  <link rel="stylesheet" href="css/style.css">
<script type="text/javascript"
        src="//cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js">
</script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
  <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular.min.js"></script>
  <style>
  <style>
  .form_style
  {
   width: 600px;
   margin: 0 auto;
  }
  body{
    background:#366d7e;
  }
  .panel-body{
    padding: 18px;
    padding-bottom: 18px;
  }
  </style>
 </head>
 <body>
 <header>
    <div class="menu">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="index.php" style="border-right: solid #366d7e 1px;"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span><span id="logo_naw">Ankiety</span></a>

          <button class="navbar-toggler collapsed" type="button" data-toggle="collapse"
                  data-target="#navbarSupportedContent"
                  aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>
          <?php
if (isset($_SESSION["name"])) {
    ?>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto mt-2 mt-lg-0">


                 <li class="nav-item">
                      <a id="profile" class="nav-link" href="profile.php">Profil</a>
                  </li>
                  <li class="nav-item">
                    <a id="create" class="nav-link" href="create.php">Stwórz</a>
                </li>
                <li class="nav-item">
                    <a id="create" class="nav-link" href="odpowiedz.php">Odpowiedz</a>
                </li>
                <li class="nav-item">
                      <a id="score" class="nav-link" href="wyniki.php">Wyniki</a>
                  </li>
                  <li class="nav-item">
                      <a id="logout" class="nav-link logout" href="php/logout.php">Wyloguj</a>
                  </li>    <?php }?>
              </ul>
              <?php if (isset($_SESSION['name'])): ?>

      <p class="nav-item" style="text-align:right;margin:auto">
          Zalogowany: <strong><?php echo $_SESSION['name']; ?></strong>
          </p>

   <?php endif?>

          </div>
      </nav>
  </div>


    </header>
  <br />
   <h3 align="center">Projekt inżynierski ankiety</h3>
  <br />

  <div id="l_r" ng-app="login_register_app" ng-controller="login_register_controller" class="container form_style">
   <?php
if (!isset($_SESSION["name"])) {
    ?>
   <div class="alert {{alertClass}} alert-dismissible" ng-show="alertMsg">
    <a href="#" class="close" ng-click="closeMsg()" aria-label="close">&times;</a>
    {{alertMessage}}
   </div>

   <div class="panel panel-default" ng-show="login_form">
    <div class="panel-heading">
     <h3 class="panel-title">Login</h3>
    </div>
    <div class="panel-body">
     <form method="post" ng-submit="submitLogin()">
      <div class="form-group">
       <label>Enter Your Email</label>
       <input type="text" name="email" ng-model="loginData.email" class="form-control" />
      </div>
      <div class="form-group">
       <label>Enter Your Password</label>
       <input type="password" name="password" ng-model="loginData.password" class="form-control" />
      </div>
      <div class="form-group" align="center">
       <input id="sub" type="submit" name="login" class="btn btn-primary" value="Login" />
       <br />
       <input type="button" name="register_link" class="btn btn-primary" ng-click="showRegister()" value="Register" />
      </div>
     </form>
    </div>
   </div>

   <div class="panel panel-default" ng-show="register_form">
    <div class="panel-heading">
     <h3 class="panel-title">Register</h3>
    </div>
    <div class="panel-body">
     <form method="post" ng-submit="submitRegister()">
      <div class="form-group">
       <label>Podaj Email</label>
       <input type="text" name="email" ng-model="registerData.email" class="form-control" />
      </div>
      <div class="form-group">
       <label>Podaj hasło</label>
       <input type="password" name="password" ng-model="registerData.password" class="form-control" />
      </div>
      <div class="form-group">
       <label>Podaj hasło ponownie:</label>
       <input type="password" name="password2" ng-model="registerData.password2" class="form-control" />
      </div>
      <div class="form-group" align="center">
       <input id="sub" type="submit" name="register" class="btn btn-primary" value="Register" />
       <br />
       <input id="sub" type="button" name="login_link" class="btn btn-primary" ng-click="showLogin()" value="Login" />
      </div>
     </form>
    </div>
   </div>
   <?php
} else {
    ?>
   <div class="panel panel-default">
    <div class="panel-heading">
     <h3 class="panel-title">Witaj w systemie ankiet</h3>
    </div>
    <div class="panel-body">

       <h1> Nasz system oferuje </h1>
       <ul>
       <li>tworzenie ankiet</li>
       <li>odpowiadanie na ankiety</li>
       <li>sprawdzanie oddanych odpowiedzi</li>
       <li>pełną anonimowość</li>
       </ul>


    </div>
   </div>
   <?php
}
?>

  </div>
 </body>
</html>

<script>
var app = angular.module('login_register_app', []);
app.controller('login_register_controller', function($scope, $http){
 $scope.closeMsg = function(){
  $scope.alertMsg = false;
 };

 $scope.login_form = true;

 $scope.showRegister = function(){
  $scope.login_form = false;
  $scope.register_form = true;
  $scope.alertMsg = false;
 };

 $scope.showLogin = function(){
  $scope.register_form = false;
  $scope.login_form = true;
  $scope.alertMsg = false;
 };

 $scope.submitRegister = function(){
  $http({
   method:"POST",
   url:"php/register.php",
   data:$scope.registerData
  }).success(function(data){
   $scope.alertMsg = true;
   if(data.error != '')
   {
    $scope.alertClass = 'alert-danger';
    $scope.alertMessage = data.error;
   }
   else
   {
    $scope.alertClass = 'alert-success';
    $scope.alertMessage = data.message;
    $scope.registerData = {};
   }
  });
 };

 $scope.submitLogin = function(){
  $http({
   method:"POST",
   url:"php/login.php",
   data:$scope.loginData
  }).success(function(data){
   if(data.error != '')
   {
    $scope.alertMsg = true;
    $scope.alertClass = 'alert-danger';
    $scope.alertMessage = data.error;
   }
   else
   {
    location.reload();
   }
  });
 };

});
</script>
