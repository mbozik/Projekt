<?php

//index.php

session_start();

?>
<!DOCTYPE html>
<html>
 <head>
  <title>Tworzenie ankiety</title>

  <link rel="stylesheet" href="css/style.css">
<script type="text/javascript"
        src="//cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js">
</script>
</script>
    <script src="app.js"></script>
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
  </style>
 </head>
 <body>
 <header>
    <div class="menu">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <a class="navbar-brand" href="index.php">Ankiety</a>

          <button class="navbar-toggler collapsed" type="button" data-toggle="collapse"
                  data-target="#navbarSupportedContent"
                  aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>
          <?php
   if(isset($_SESSION["name"]))
   {
   ?>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
           <!--       <li class="nav-item active">
                      <a id="nav-login" class="nav-link" href="login.php">Logowanie</a>
                  </li>-->
                  <li class="nav-item">
                      <a id="nav-register" class="nav-link" href="create.php">Stwórz</a>
                  </li> 
                 <li class="nav-item">
                      <a id="logout" class="nav-link logout" href="logout.php">Wyloguj</a>
                  </li>   
                 <li class="nav-item">
                      <a id="profile" class="nav-link" href="profile.php">Profil</a>
                  </li> <?php }?>
              </ul>
          </div>
      </nav>
  </div>
    
    
    </header>

    <div class="container">
      <div class="row">
        <div class="col-md-7">
          <h1>Survey Builder</h1>
          <form novalidate="" ng-controller="PollCtrl" class="survey form ">
            <div class="form-group">
              <!-- <label for="surveytitle">Survey-titel</label> -->
              <input type="text" class="form-control input-lg" ng-model="survey.title" id="surveytitle" placeholder="Enter a Survey Title" />
            </div>
            <div class="col-md-12 well" id="questions" ng-repeat="question in survey.questions">
              <span class="btn btn-danger pull-right" title="Remove this question" ng-click="remove(question, survey.questions)" ng-if="$index > 0">X</span>
              <div class="form-group">
                <h3>Question {{ $index+1 }}</h3>
                <input type="text" class="form-control" ng-model="question.title" name="" placeholder="Enter a question" />
              </div>
              <div class="row">
                <div class="col-xs-10" id="answers" ng-repeat="answer in question.answers">
                  <div class="form-group">
                    <label for="answer" class="control-label">Answer {{ $index+1 }}</label>
                    <div class="input-group col-md-12">
                      <input type="text" required="" placeholder="Type answer here" class="form-control input-sm" name="" ng-model="answer.title" />
                      <!-- <span class="input-group-addon input-sm">
                      <input type="checkbox" title="Mark as correct answer" checked="" ng-model='answer.correct' ng-true-value="1" ng-false-value="0" ng-click="uncheckSiblings(answer, question.answers)"/>
                    </span> -->
                      <span class="input-group-btn" ng-click="remove(answer, question.answers)">
                        <button class="btn btn-danger btn-sm" type="button" title="Remove this answer" ng-show="$index > 1">X</button>
                      </span>
                    </div>
                  </div>
                  <button class="btn btn-primary btn-sm" ng-show="$last" ng-click="addNewAnswer()" ng-if="question.answers.length <= 4">+ Add another answer</button>
                </div>
              </div>
            </div>
            <div class="clearfix"></div>
            <button class="btn btn-primary" ng-click="addNewQuestion()" ng-if="survey.questions.length <= 9">+ Add another question</button>
            <!--<div class="col-md-12">
              <br />
              <b>Data</b>
              <pre>{{ survey | json }}</pre>
            </div>-->
          </form>
        </div>
        <div class="col-md-5 preview" ng-controller="FormCtrl">
          <button class="btn btn-lg btn-success" ng-click="togglePreview()">Preview</button>
          <div class="well" ng-if="preview">
            <form id="poll">
              <h2>{{formData.title || 'Survey Title'}}</h2>
              <div class="pollimg" ngf-background="formData.file"></div>
              <fieldset ng-repeat="question in formData.questions" ng-show="$index == step">
                <h3>{{question.title || 'Question ' + question.id}}</h3>
                <div class="radio" ng-repeat="answer in question.answers">
                  <label>
                    <input type="radio" ng-model="question.answer" name="optionsRadios{{answer.id}}" id="optionsRadios{{answer.id}}" value="option{{answer.id}}" />

 {{answer.title || 'Answer ' + answer.id}}
                </label>
                </div>
              </fieldset>
              <div class="formnav row">
                <button class="btn btn-primary btn-sm col-md-4" ng-show="step > 0" ng-click="setStep(-1)">Previous Question</button>
                <button class="btn btn-primary btn-sm col-md-4 pull-right" ng-hide="step == formData.questions.length -1" ng-if="formData.questions[step].answer" ng-click="setStep(1)">Next Question</button>
                <div class="clearfix"></div>
                <button id="submit" class="btn btn-success btn-block btn-lg" ng-show="(step + 1 == formData.questions.length) && formData.questions[step].answer" ng-click="">Submit</button>
              </div>
            </form>
            <!-- <b>Data</b>
          <pre>{{ formData | json }}</pre>
          Step: {{step}} -->
          </div>
        </div>
      </div>
    </div>
 </body>
</html>

<script>
var app = angular.module('create_survey_app', []);
app.controller('survey_controller', function($scope, $http){
 $scope.closeMsg = function(){
  $scope.alertMsg = false;
 };

 $scope.showCreate = function(){
  $scope.create_form = true;
  $scope.alertMsg = false;
 };


 $scope.submitCreate = function(){
  $http({
   method:"POST",
   url:"stworz.php",
   data:$scope.stworzData
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
    $scope.createData = {};
   }
  });
 };


});
</script>
