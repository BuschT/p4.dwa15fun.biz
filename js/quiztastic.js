$( document ).ready(function() {

	//Set the nav
	if($("#nav_hint_quiz_take").length > 0) {
		$("#nav_quizes").addClass("active");
	} else if($("#nav_hint_quiz_add").length > 0) {
		$("#nav_quizes_add").addClass("active");
	} else if ($("#nav_hint_quiz_report").length > 0) {
		$("#nav_quizes_scores").addClass("active");
	}

	$("#form_newquiz").submit(function(e){
		if (!validateAddNewQuiz()){
			e.preventDefault();
		}
	});

	$("#form_signup").submit(function(e){
		if (!validateSignUpFields()){
			e.preventDefault();
		}
	});

	$("#form_signin").submit(function(e){
		if (!validateSignInFields()){
			e.preventDefault();
		}
	});
});

function validateAddNewQuiz(){
	if ($.trim($("#newquiz_name").val()).length <= 0){
			$(".error").html("Please make sure you give your new quiz a name");
			return false;
		}
	if ($.trim($("#newquiz_description").val()).length <= 0){
			$(".error").html("Please make sure you enter a description for this quiz");
			return false;
		}
	hasFilledAnything = false;
	for (x=1; x<=5; x++){
		if ($.trim($("#newquiz_question"+x).val()).length>0){
			hasFilledAnything = true;
			if (!validateAllAnswersForQuestion(x)){
				$(".error").html("You've entered a question text for #"+x+", but haven't filled out all the possible answers.");
				return false;
			};
		}
	}
	if (!hasFilledAnything){
		$(".error").html("You have to enter at least one question!");
		return false;
	}
	return true;
}

function validateAllAnswersForQuestion(num){
	if ($.trim($("#newquiz_question"+num+"A").val()).length<= 0){
		return false;
	}
	if ($.trim($("#newquiz_question"+num+"B").val()).length<= 0){
		return false;
	}
	if ($.trim($("#newquiz_question"+num+"C").val()).length<= 0){
		return false;
	}
	if ($.trim($("#newquiz_question"+num+"D").val()).length<= 0){
		return false;
	}
	return true;
}

function validateSignInFields(){
	if ($.trim($('#signin_email').val()) == '' || $.trim($('#signin_password').val()) == ''){
		$(".error").html("Email and Password Fields May Not Be Empty");
		return false;
	}
	if ($.trim($('#signin_email').val()).indexOf("@") == -1){
		$(".error").html("You did not enter a valid email.");
		return false;
	}
	return true;
}

function validateSignUpFields(){
	if ($.trim($('#signup_firstname').val()) == '' || $.trim($('#signup_lastname').val()) == ''
		|| $.trim($('#signup_email').val()) == '' || $.trim($('#signup_password').val()) == ''){
		$(".error").html("No Fields May Be Empty");
		return false;
	}
	if ($.trim($('#signup_email').val()).indexOf("@") == -1){
		$(".error").html("Please enter a valid email.");
		return false;
	}
	if ($('#signup_password').val().length <6){
		$(".error").html("Your password should be at least six characters");
		return false;
	}
	return true;
}
