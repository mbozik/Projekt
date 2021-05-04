<?php

session_start();
?>
<!DOCTYPE html>
	<html lang="pl">
	<head>
		<meta charset="UTF-8">
		<title>Tworzenie ankiet</title>
		<meta charset="UTF-8">
		<link rel='stylesheet' href="CSS/style.css">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="JS/create.js"></script>
        
	</head>
	<body><div id="full">
            <header>

            </header>
            <nav id="menu">
                <p>
                    <a class="nag-tab" href="index.html">HOME</a><span class="hide"> | </span>
                    <a class="nag-tab-aktywny" href="create.html">CREATE</a><span class="hide"> | </span>
                    <a class="nag-tab" href="check.html">CHECK</a><span class="hide"> | </span>
                    <a class="nag-tab" href="edit.html">EDIT</a></p>
                </p>
            </nav>
            <div class="container" style="margin-top: 5%">
            <div class="row">
                <div class="col-md-12">
                  <div class="panel panel-default">
                    <div class="panel-heading">Stwórz ankietę:</div>
                    <div class="panel-group">
                      <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" class="form-control" style="height: 700px; border: none" id="survey-form">
                        <label>Nazwa ankiety: </label>
                        <input name="survey_title" id="survey_title" type="text" class="form-control input-group" />
                        <input name="qnum" id="qnum" type="hidden" value="" />
                        <input name="choicenum" id="choicenum" type="hidden" value="" />
                        <label>Pytania do ankiety:</label>
                        <div id="questions">
                        </div>
                        <button class="btn btn-primary" type="button" style="display: block; margin-top: 5px;" id="addq"><span class="glyphicon glyphicon-plus"></span>Dodaj pytanie</button>
                        <button class="btn btn-success" type="submit" id="uploadsurvey" name="uploadsurvey" style="display: block; margin-top: 10px">Stwórz ankietę</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              </div>
            

			<aside id="INFORMACJE">Dodatkowe informacje</aside>

			<article id="TRESC">Treść strony</article>

			<footer id="STOPKA">Stopka serwisu</footer>
        </div>
	</body>
</html>
