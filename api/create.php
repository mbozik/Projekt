<?php

//create.php

session_start();

?>
<!DOCTYPE html>
<html>
 <head>
  <title>Projekt inżynierski ankiety</title>

<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<link rel="stylesheet" href="css/style.css">
<script type="text/javascript"
        src="//cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js">
</script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
          <!--<script src="js/create.js"></script>-->
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
  <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular.min.js"></script>
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
                  </li>
                  <li class="nav-item">
                      <a id="nav-register" class="nav-link" href="signup.php">Rejestracja</a>
                  </li> -->
                 <li class="nav-item">
                      <a id="logout" class="nav-link logout" href="logout.php">Wyloguj</a>
                  </li>   
                 <li class="nav-item">
                      <a id="profile" class="nav-link" href="profile.php">Profil</a>
                  </li> <?php }else {
                      ?> 
                      <div class="collapse navbar-collapse" id="navbarSupportedContent">
                      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                          <li class="nav-item active">
                              <a id="nav-login" class="nav-link" href="index.php">Logowanie</a>
                          </li>
                          <li class="nav-item">
                              <a id="nav-register" class="nav-link" href="index.php">Rejestracja</a>
                          </li> 
                      <!--   <li class="nav-item">
                              <a id="logout" class="nav-link logout" href="logout.php">Wyloguj</a>
                          </li>   
                         <li class="nav-item">
                              <a id="profile" class="nav-link" href="profile.php">Profil</a>-->
                              <?php   }?> 
              </ul>
          </div>
      </nav>
  </div>
    
<div class="container" style="margin-top: 5%">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">Create New Survey:</div>
        <div class="panel-group">
          <form  method="POST" class="form-control" style="height: 700px; border: none" id="survey-form">
            <label>Survey Title: </label>
            <input name="survey_title" id="survey_title" type="text" class="form-control input-group" />
            <input name="qnum" id="qnum" type="hidden" value="" />
            <input name="choicenum" id="choicenum" type="hidden" value="" />
            <label>Survey Questions:</label>
            <div id="questions">
            </div>
            <button class="btn btn-primary" type="button" style="display: block; margin-top: 5px;" id="addq"><span class="glyphicon glyphicon-plus"></span>Add a question</button>
            <button class="btn btn-success" type="submit" id="uploadsurvey" name="uploadsurvey" style="display: block; margin-top: 10px">Upload Survey</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<script>

    $(document).ready(function(){
    var i=0;
    var numOfQuestions=0;
    var choice_c = 1;
    $("#addq").click(function(){
            numOfQuestions++;
            i++;
            $("#questions").append("<div id='newq' style='margin-top: 5px; margin-bottom: 5px'></div>");
            $("#newq").append("Question: <input type='text' name='q"+i+"' class='form-control' style='display: inline-block' id='q"+i+"'/>");
            $("#qnum").attr("value", numOfQuestions);
            $("#newq").append("<label><input type='radio' name='radio"+i+"' value='radio' class='choices radiobox' id='radiobox"+i+"'/>&nbsp;Radiobox&nbsp;&nbsp;</label>");
            $("#newq").append("<label><input type='radio' name='radio"+i+"' value='check' class='choices checkbox' id='checkbox"+i+"'/>&nbsp;Checkbox&nbsp;&nbsp;</label>");
            $("#newq").append("<label><input type='radio' name='radio"+i+"' value='text' class='choices textbox' id='textbox"+i+"'/>&nbsp;Text&nbsp;&nbsp;</label>");
            $("#newq").append("<input type='text' class='form-control qchoice' name='radiochoice"+choice_c+"_q"+i+"' id='radiochoice"+choice_c+"' title='q"+i+"' style='display: none'/>");
            choice_c++;
            $("#newq").append("<input type='text' class='form-control qchoice' name='radiochoice"+choice_c+"_q"+i+"' id='radiochoice"+choice_c+"' title='q"+i+"' style='display: none'/>");
            choice_c++;
            $("#newq").append("<button id='radiobtn"+i+"' type='button' class='btn btn-primary add-radio-choice' style='display: none'><span class='glyphicon glyphicon-plus'></span>Add choices</button>");
            $("#newq").append("<button id='checkbtn"+i+"' type='button' class='btn btn-primary add-checkbox-choice' style='display: none'><span class='glyphicon glyphicon-plus'></span>Add choices</button>");
        });
        $(document.body).on('change', '.choices' ,function() {
            if ($(".radiobox").is(":checked")) {
                $(".add-radio-choice").show();
                $(".qchoice").show();
                $(".add-checkbox-choice").hide();
            }
            else if ($(".checkbox").is(":checked")) {
                $(".add-checkbox-choice").show();
                $(".add-radio-choice").hide();
                $(".qchoice").show();
            }
            else if($(".textbox").is(":checked")){
                $(".add-checkbox-choice").hide();
                $(".add-radio-choice").hide();
                $(".qchoice").hide();
            }
        });
        $(document.body).on('click', '.add-radio-choice' ,function(){
            $("#newq").append("Choice: <input type='text' name='radiochoice"+choice_c+"_q"+i+"' title='q"+i+"' class='form-control qchoice' id='radiochoice"+choice_c+"'/>");
            $("#choicenum").attr("value", choice_c);
        });
        $(document.body).on('click', '.add-checkbox-choice' ,function(){
            $("#newq").append("<input type='text' name='radiochoice"+choice_c+"_q"+i+"' title='q"+i+"' class='form-control qchoice' id='checkboxchoice"+choice_c+"'>");
            $("#choicenum").attr("value", choice_c);
        });
});
</script>