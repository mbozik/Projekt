
$(document).ready(function() {
    // Handle the user clicking on "Add a question"
    $("#addq").click(function() {
      // a nested function creates the HTML DOM structure.
      smLib.surveyForms.addQuestion( $("#questions") );
    });
  });
  var choiceX = 0;
  var j = 0;
  // var k = 0;
  $(function() {
    window.smLib = window.smLib || {};
    smLib.forms = smLib.forms || {
      anchorEl: $("<a>"),
      buttonEl: $("<input>").prop("type", "button"),
      checkboxEl: $("<input>").prop("type", "checkbox"),
      radioEl: $("<input>").prop("type", "radio"),
      textEl: $("<input>").prop("type", "text"),
      textareaEl: $("<textarea>"),
      fieldsetEl: $("<fieldset>"),
      labelEl: $("<label>"),
      spanEl: $("<span>"),
      divEl: $("<div>"),
      divElName: $("<div name='question'>"),

    };
    smLib.icons = smLib.icons || {
      addEl: smLib.forms.spanEl.clone().prop({
        "class": "glyphicon glyphicon-plus"
      }),
      removeEl: smLib.forms.spanEl.clone().prop({
        "class": "glyphicon glyphicon-minus"
      })
    };
  
    smLib.surveyForms = smLib.surveyForms || {
  
      /**
       * This handles the HTML DOM creation. I don't want to clog up
       *   the main routine with all the ugly, so I've moved it here.
       *   Purely cosmetic. The functioning is the same as the former
       *   append() functions with the element completely spelled out.
       **/
      addQuestion: function(container) {
        var that = this;
        this.container = container;
        var i = this.container.find(".question-container").length + 1;
        /***
         * When the question is  being created, it will be contained in its own element,
         *   and the answer portion will also be contained. The answer pane will contain the
         *   three options for an answer, whether text, radio or checkbox, as well as allowing
         *   the creation of labels for the radio/checkbox options.
         ***/
  
        // First we create the question element, simply a text input wrapped in a label.
        var newQuestionEl = smLib.forms.textEl.clone().prop({
          "name": "q" + i,
          "id": "q" + i,
          "class": "form-control"
        });
        var newQuestion = smLib.forms.divElName.clone().prop({
          "class": "question-pane"
        }).append("Question #"+i+": ", newQuestionEl);
        //////////////////////////////////////////////////////////////////////////////// var rate ="KOpa";
        
        // Next, we create an array of options to determine what type of question this is:
        //  radio, checkbox or text.
        var newQTypeArr = [];
        var newQTypeRadioEl = smLib.forms.radioEl.clone().prop({
          name: "qType" + i,
          id: "qType" + i,
          value: "radio",
          class: "choices radiobox"
        }).on("click", function() {
          smLib.surveyForms.showOptionsPane(radioOptions);
        });
        newQTypeArr[0] = smLib.forms.labelEl.clone().append(newQTypeRadioEl, " Odpowiedź");
  
        var newQTypeCheckEl = smLib.forms.radioEl.clone().prop({
          name: "qType" + i,
          id: "qType" + i,
          value: "checkbox",
          class: "choices radiobox"
        }).on("click", function() {
          smLib.surveyForms.showOptionsPane(checkboxOptions);
        });
       // newQTypeArr[1] = smLib.forms.labelEl.clone().append(newQTypeCheckEl, "Checkbox");
  
        var newQTypeTextEl = smLib.forms.radioEl.clone().prop({
          name: "qType" + i,
          id: "qType" + i,
          value: "text",
          class: "choices radiobox"
        }).on("click", function() {
          smLib.surveyForms.showOptionsPane(textOptions);
        });
        //newQTypeArr[2] = smLib.forms.labelEl.clone().append(newQTypeTextEl, "Text");
  
        var addRadioChoiceButton = smLib.forms.buttonEl.clone().prop({
          "class": "btn btn-primary add-radio-choice answer-option",
          "value": "Add Radio button"
        }).append(smLib.icons.addEl.clone(), "Add choices").on("click", function() {
          that.addRadioOptions(radioOptions);
        });
  
        var radioOptions = smLib.forms.divEl.clone().prop({
          class: "radio-answer-options"
        }).append(addRadioChoiceButton).on("change", function(){
          that.updatePreview(newQuestionEl, newAnswerEl, previewContainerEl); 
        }).hide();
        this.addRadioOptions(radioOptions);
  
        var addCheckboxChoiceButton = smLib.forms.buttonEl.clone().prop({
          "class": "btn btn-primary add-checkbox-choice answer-option",
          "value": "Add Checkbox"
        }).append(smLib.icons.addEl.clone(), "Add choices").on("click", function() {
          that.addCheckboxOptions(checkboxOptions);
        });
        var checkboxOptions = smLib.forms.divEl.clone().prop({
          class: "checkbox-answer-options"
        }).append(addCheckboxChoiceButton).on("change", function(){
          that.updatePreview(newQuestionEl, newAnswerEl, previewContainerEl); 
        }).hide();
        this.addCheckboxOptions(checkboxOptions);
  
        var textOptions = smLib.forms.divEl.clone().prop({
          class: "text-answer-options"
        }).on("change", function(){
          that.updatePreview(newQuestionEl, newAnswerEl, previewContainerEl); 
        }).hide();
        this.addTextOptions(textOptions);
  
        // Now we create the answer options pane. containing this separately from the
        //  answers will allow them to be manipulated as needed.
        var newAnswerEl = smLib.forms.divEl.clone().prop({
          class: "answer-options-pane"
        }).append(radioOptions, checkboxOptions, textOptions);
  
        // Just as we wrapped the question in a label, we're going to wrap the answer options
        //   in an answer pane. This is where all of the answer work will happen.
        var newAnswer = smLib.forms.divEl.clone().prop({
          class: "answer-pane"
        }).append(newQTypeArr, newAnswerEl);
        
        var previewQuestion = smLib.forms.divEl.clone().prop({
          class: "preview-question"
        });
        var previewAnswer = smLib.forms.divEl.clone().prop({
          class: "preview-answer"
        })
        var previewContainerEl = smLib.forms.divEl.clone().prop({
          class: "preview-pane"
        }).append(previewQuestion, previewAnswer).hide()
  
        // The question container pane will contain both the question and the answer container.
        //   The whole point of this is to create a logical structure for the entire question,
        //   making it a discrete logical piece.
        var newQContainerEl = smLib.forms.divEl.clone().prop({
          class: "question-container",
        }).append(newQuestion, newAnswer, previewContainerEl);
  
        this.container.append(newQContainerEl);
        i = i -1;
        var licznik = 'q'+i;
        var zlicz = 'radiochoice' + j;
        // var zlicz1 = 'checkboxchoice' + k;
        var z =j+2;
        // var x =k+2;
        var resp = document.getElementById(licznik).value;
        var resp1 = document.getElementById(zlicz).value;
        // var resp2 = document.getElementById(zlicz1).value;
        $.post('php/insertquestion.php', {
          'pyt': resp
         });

         while (z < choiceX) {          
          $.post('php/insertodpRadio.php', {
            'odp': resp1,
            'pyt': resp
           });
          j=j+2;
          z=z+2;
          zlicz='radiochoice' + j;
          resp1 = document.getElementById(zlicz).value;
        }
         //!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!zabezpieczyc przed takimi samymi pytaniami

        // while (x < choiceX) {          
        //   window.alert(resp2);
          
        //   $.post('php/insertodpRadio.php', {
        //     'odp': resp2,
        //     'pyt': resp
        //    });
        //   k=k+2;
        //   x=x+2;
        //   zlicz1='checkboxchoice' + k;
        //   resp2 = document.getElementById(zlicz1).value;
        // }

        
      }, //end addQuestion()
      addRadioOptions: function(radioPane) {
        /***
         * Another DOM element creation function. This creates the radio
         *   button text option, and if it's the first, a button to add
         *   more options. 
         ***/
  
        // We want to get the length of the current choices, 
        //  as this will give us an index for the new option
        
        var radioChoice = radioPane.find(".radio-choice");
        var choice_c = radioChoice.length;
        
        var radioTempEl = smLib.forms.radioEl.clone().prop({
          "class": "answer-option radio-choice"
        });
        
        var radioChoiceTextEl = smLib.forms.textEl.clone().prop({
          "class": "form-control answer-option radio-choice radiochoice"+choice_c,
          "name": "radiochoice" + choice_c,
          "id": "radiochoice" + choiceX,
        });
        choiceX = choiceX + 2;
        var radioChoiceEl = smLib.forms.labelEl.clone().append(radioTempEl, radioChoiceTextEl);
        // Make sure to add the new text element BEFORE the 
        //    add more button.
        radioPane.find(".add-radio-choice").before(radioChoiceEl);
        
        // var resp1 = document.getElementById("radiochoice0").value;
        // $.post('php/insertquestion.php', {
        //   'i': 'resp'
        //  });
        //  window.alert(zlicz);
      },
      
      addTextOptions: function(textPane) {
        this.textPane = textPane;
        
        var textChoiceTextEl = smLib.forms.textEl.clone().prop({
          "class": "form-control answer-option text-choice",
          "name": "text-placeholder",
        });
        
        var textChoiceEl = smLib.forms.labelEl.clone().append("Placeholder text: ", textChoiceTextEl);
        textPane.append(textChoiceEl);
        
      },
      addCheckboxOptions: function(checkboxPane) {
        // We want to get the length of the current choices, 
        //  as this will give us an index for the new option
        
        var checkboxChoice = checkboxPane.find(".checkbox-choice");
        var choice_c = checkboxChoice.length;
        
        var checkboxTempEl = smLib.forms.checkboxEl.clone().prop({
          "class": "answer-option checkbox-choice"
        });
        
        var checkboxChoiceTextEl = smLib.forms.textEl.clone().prop({
          "class": "form-control answer-option checkbox-choice checkboxchoice"+choice_c,
          "name": "checkboxchoice" + choice_c,
          // "id": "checkboxchoice" + choiceX,
        });
        // choiceX = choiceX + 2;
        
        
  
        var checkboxChoiceEl = smLib.forms.labelEl.clone().append(checkboxTempEl, checkboxChoiceTextEl);
        // Make sure to add the new text element BEFORE the 
        //    add more button.
        checkboxPane.find(".add-checkbox-choice").before(checkboxChoiceEl);
      },
      
      showOptionsPane: function(optionsPane) {
        if (optionsPane.not(":visible")) optionsPane.slideDown().siblings().slideUp();
      },
      
      updatePreview: function(questionPane, answerPane, previewPane){
        console.log(questionPane);
        console.log(answerPane);
        var question = questionPane.find("input").val();
        var answer = answerPane.find(":visible input[type='text']").val();
        
        previewPane.find(".preview-question").text(question);
        previewPane.find(".preview-answer").html(answer);
      },
      togglePreview: function(previewPane){
        if(previewPane.not(":visible") ) {
          previewPane.show().siblings().hide();
        } else {
          previewPane.hide().siblings().show();
        }        
      }
      
      
    };
  });
  