// 'use strict';

var app = angular.module('poll', ['ngFileUpload']);

app.controller('PollCtrl', ['$scope', 'Upload', 'formdataService', function($scope, Upload, formdataService) {
  // $scope.survey = [{"title" : "Title"}, {'questions': [{id: 'q1'}, {id: 'q2'}, {id: 'q3'}]}];
  // $scope.survey = { 'title' : '', 'questions': [ { id: 'q1', 'answers' :[{id: 'a1'}, {id: 'a2'}] } ] };
  $scope.survey = { 'title' : '', 'questions': [ { id: 1, 'title' : '', 'answers' : [{id: 1, 'title' : ''/*, 'correct' : 0*/}, {id: 2, 'title' : ''/*, 'correct' : 0*/}] } ] };
  // $scope.survey.questions = [{id: 'q1'}, {id: 'q2'}, {id: 'q3'}];
  formdataService.addData($scope.survey);

  $scope.addNewQuestion = function() {
    var newQuestionNo = $scope.survey.questions.length+1;
    $scope.survey.questions.push({ 'id': newQuestionNo, 'title' : '', 'answers' : [{ id: 1, 'title' : '', 'correct' : 0}, {id: 2, 'title' : ''/*, 'correct' : 0*/ }] });
  };
  
  $scope.addNewAnswer = function() {
  	// console.log(this.question.answers.length);
    var newAnswerNo = this.question.answers.length+1;
    this.question.answers.push({ 'id': newAnswerNo, 'title' : ''/*, 'correct' : 0*/ });
  };
  
  $scope.remove = function(item, items) {
  	// console.log(items);
  	items.splice(items.indexOf(item), 1);
  	items.forEach( function (elem) {
	  		elem.id = items.indexOf(elem)+1;
	  		// if(item.correct) elem.correct = 0;
  	});
    // set new step for form
    formdataService.setStep();
  };

  $scope.uncheckSiblings = function(item, items) {
  	if(item.correct) {
	  	$scope.selected = item;
	  	// items.forEach( function (elem) {
	  	// 	if (elem != $scope.selected) elem.correct = 0;
	  	// });
  		// console.log(item);
  	}

  }

  // formdataService.formdata = $scope.survey;
  
//  $scope.showQuestionLabel = function (question) {
//    return question.id === $scope.survey.questions[0].id;
//  }
  
}]);


// controller for preview
app.controller('FormCtrl', function($scope, formdataService) {

  $scope.preview = false;

  // $scope.step = 0;

  $scope.step = formdataService.getStep();

  $scope.formData = formdataService.getData();

  $scope.togglePreview = function() {

    $scope.preview = ($scope.preview === false) ? true : false;

  }

  $scope.setStep = function(num) {

    // $scope.step += num;
    formdataService.setStep(num);
    $scope.step = formdataService.getStep();
    
  };

});


// service for passing data between builder and preview controllers

app.factory('formdataService', function($http) {

  var formData = {};

  var addData = function(newObj) {

    formData = newObj;

  };

  var getData = function() {

    return formData;

  };

  var step = 0;

  var setStep = function(num) {

    step += num;
    
  };

  var getStep = function() {

    return step;

  };

  return {
    addData: addData,
    getData: getData,
    setStep: setStep,
    getStep: getStep
  }

});

// app.factory('stepService', function() {

//   var step = 0;

//   var setStep = function(num) {

//     step += num;
    
//   };

//   var getStep = function() {

//     return step;

//   };

//   return step

// });