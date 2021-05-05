$(document).ready(function() {
    var i = 0;
    var numOfQuestions = 0;
    var labelEl = $("<label>");
    var inputEl = $("<input>");
    // Handle the user clicking on "Add a question"
    $("#addq").click(function() {
      // Increment both counters,
      numOfQuestions++;
      i++;
      // a nested function creates the HTML DOM structure.
      addQuestion();
      // Handle the user choosing what type of question they want
      $(".choices").on("change", function() {
        var option = $(this).val();
        switch (option) {
          case "radio":
            showRadioOpts();
            break;
          case "checkbox":
            showCheckboxOpts();
            break;
          case "text":
            showTextOpts();
            break;
        }
      })
  
    });
  
    /**
     * This handles the HTML DOM creation. I don't want to clog up
     *   the main routine with all the ugly, so I've moved it here.
     *   Purely cosmetic. The functioning is the same as the former
     *   append() functions with the element completely spelled out.
     **/
    function addQuestion() {
  
      var newQuestionEl = inputEl.clone().prop({
        "type": "text",
        "name": "q" + i,
        "id": "q" + i,
        "class": "form-control"
      });
      var newQuestion = labelEl.clone().prop({
        "for": "q" + i,
        "class": "form-control"
      }).append("Question: ", newQuestionEl);
  
      var newQTypeArr = [];
      var newQTypeRadioEl = inputEl.clone().prop({
        type: "radio",
        name: "qType" + i,
        id: "qType" + i,
        value: "radio",
        class: "choices radiobox"
      });
      newQTypeArr[0] = labelEl.clone().append(newQTypeRadioEl, " Radio");
  
      var newQTypeCheckEl = inputEl.clone().prop({
        type: "radio",
        name: "qType" + i,
        id: "qType" + i,
        value: "checkbox",
        class: "choices radiobox"
      });
      newQTypeArr[1] = labelEl.clone().append(newQTypeCheckEl, "Checkbox");
      var newQTypeTextEl = inputEl.clone().prop({
        type: "radio",
        name: "qType" + i,
        id: "qType" + i,
        value: "text",
        class: "choices radiobox"
      });
      newQTypeArr[2] = labelEl.clone().append(newQTypeTextEl, "Text");
      var answerOptionsEl = $("<div>").prop({
        class: "answer-options-pane"
      });
      var newAnsContainerEl = $("<div>").prop({
        class: "answer-pane"
      }).append(newQTypeArr, answerOptionsEl);
      var newQContainerEl = $("<div>").prop({
        id: "newq"
      }).append(newQuestion, newAnsContainerEl);
  
      $("#questions").append(newQContainerEl);
      $("#qnum").attr("value", numOfQuestions);
    }; //end addQuestion()
  
    // Toggle the radio answer options
    function showRadioOpts() {
      // First, hide all answer options. Then, add one radio option.
      $(".answer-options-pane").empty();
      addRadioOpts();
  
    }; // end showRadioOpts()
  
    // Toggle the checkbox answer options
    function showCheckboxOpts() {
      $(".answer-options-pane").empty();
    }; // end showCheckboxOpts() 
  
    // Toggle the text box answer options
    function showTextOpts() {
      $(".answer-options-pane").empty();
      addTextOpts();
    }; // end showTextOpts()
  
    /***
     * Another DOM element creation function. This creates the radio
     *   button text option, and if it's the first, a button to add
     *   more options. 
     ***/
    function addRadioOpts() {
      // We want to get the length of the current choices, 
      //  as this will give us an index for the new option
      
      var radioChoice = $(".radio-choice");
      var choice_c = radioChoice.length;
      var radioChoiceTextEl = inputEl.clone().prop({
        "type": "text",
        "class": "form-control answer-option radio-choice",
        "name": "radiochoice" + choice_c + "_q" + i,
        "id": "radiochoice" + choice_c + "_q" + i,
        "title": "q" + i
      });
      // If we don't have any radio elements yet, we will also
      //  want to create an "add more options" button.
      if (choice_c <= 0) {
        var addIconEl = $("<span>").prop({
          "class": "glyphicon glyphicon-plus"
        });
        var addChoiceButton = $("<button>").prop({
          "id": "radiobtn" + i,
          "class": "btn btn-primary add-radio-choice answer-option"
        }).append(addIconEl, "Add choices").on("click", function(evt) {
          // Make sure you don't let that button do what buttons do...
          evt.preventDefault();
          addRadioOpts()
        });
        $(".answer-options-pane").append(addChoiceButton);
      }
      radioChoiceEl = labelEl.clone().append(radioChoiceTextEl);
      // Make sure to add the new text element BEFORE the 
      //    add more button.
      $(".add-radio-choice").before(radioChoiceEl);
    };
    
    function addTextOpts(){
      var textChoiceTextEl = inputEl.clone().prop({
        "type": "text",
        "class": "form-control answer-option text-choice",
        "name": "radiochoice_q" + i,
        "id": "textchoice_q" + i,
        "title": "q" + i
      });
          textChoiceEl = labelEl.clone().append("Text: ", textChoiceTextEl);
      $(".answer-options-pane").append(textChoiceEl)
      }
  });