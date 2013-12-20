<div id="add_quiz_instructions">Enter your quiz information into the fields below. You may have up to 5 questions in the quiz. You do not have to fill out all of the questions. If you fill in the question box for each question, you must provide 4 answers and select the proper answer.</div><br />
<form method='POST' action='/quizes/p_add' id="form_newquiz">
	<label for='newquiz_name'>Quiz Name:</label>
	<input name='newquiz_name' maxlength='100' id='newquiz_name' class='quizinput'/><br />
	<label for='newquiz_description'>Quiz Description:</label>
	<input name='newquiz_description' maxlength='100' id='newquiz_description' class='quizinput'/><br /><br />

	<label for='newquiz_question1'>Question #1:</label>
	<input name='newquiz_question1' maxlength='100' id='newquiz_question1' class='quizinput'/>
	<label for='newquiz_question1A'>Answer A:</label>
	<input name='newquiz_question1_answerA' maxlength='50' id='newquiz_question1A' class='quizinput'/>
	<label for='newquiz_question1B'>Answer B:</label>
	<input name='newquiz_question1_answerB' maxlength='50' id='newquiz_question1B' class='quizinput'/>
	<label for='newquiz_question1C'>Answer C:</label>
	<input name='newquiz_question1_answerC' maxlength='50' id='newquiz_question1C' class='quizinput'/>
	<label for='newquiz_question1A'>Answer D:</label>
	<input name='newquiz_question1_answerD' maxlength='50' id='newquiz_question1D' class='quizinput'/>
	<br /><br />
	<label>Correct Answer:</label>
	A<input type="radio" name="correct_answer1" value="A" checked>
	B<input type="radio" name="correct_answer1" value="B">
	C<input type="radio" name="correct_answer1" value="C">
	D<input type="radio" name="correct_answer1" value="D">
	<br />
	<br />
	<label for='newquiz_question2'>Question #2:</label>
	<input name='newquiz_question2' maxlength='100' id='newquiz_question2' class='quizinput'/>
	<label for='newquiz_question2A'>Answer A:</label>
	<input name='newquiz_question2_answerA' maxlength='50' id='newquiz_question2A' class='quizinput'/>
	<label for='newquiz_question2B'>Answer B:</label>
	<input name='newquiz_question2_answerB' maxlength='50' id='newquiz_question2B' class='quizinput'/>
	<label for='newquiz_question2C'>Answer C:</label>
	<input name='newquiz_question2_answerC' maxlength='50' id='newquiz_question2C' class='quizinput'/>
	<label for='newquiz_question2D'>Answer D:</label>
	<input name='newquiz_question2_answerD' maxlength='50' id='newquiz_question2D' class='quizinput'/>
	<br /><br />
	<label>Correct Answer:</label>
	A<input type="radio" name="correct_answer2" value="A" checked>
	B<input type="radio" name="correct_answer2" value="B">
	C<input type="radio" name="correct_answer2" value="C">
	D<input type="radio" name="correct_answer2" value="D">
	<br>
	<br />
	<br />
	<label for='newquiz_question3'>Question #3:</label>
	<input name='newquiz_question3' maxlength='100' id='newquiz_question3' class='quizinput'/>
	<label for='newquiz_question3A'>Answer A:</label>
	<input name='newquiz_question3_answerA' maxlength='50' id='newquiz_question3A' class='quizinput'/>
	<label for='newquiz_question3B'>Answer B:</label>
	<input name='newquiz_question3_answerB' maxlength='50' id='newquiz_question3B' class='quizinput'/>
	<label for='newquiz_question3C'>Answer C:</label>
	<input name='newquiz_question3_answerC' maxlength='50' id='newquiz_question3C' class='quizinput'/>
	<label for='newquiz_question3D'>Answer D:</label>
	<input name='newquiz_question3_answerD' maxlength='50' id='newquiz_question3D' class='quizinput'/>
	<br /><br />
	<label>Correct Answer:</label>
	A<input type="radio" name="correct_answer3" value="A" checked>
	B<input type="radio" name="correct_answer3" value="B">
	C<input type="radio" name="correct_answer3" value="C">
	D<input type="radio" name="correct_answer3" value="D">
	<br>
	<br />
	<label for='newquiz_question4'>Question #4:</label>
	<input name='newquiz_question4' maxlength='100' id='newquiz_question4' class='quizinput'/>
	<label for='newquiz_question4A'>Answer A:</label>
	<input name='newquiz_question4_answerA' maxlength='50' id='newquiz_question4A' class='quizinput'/>
	<label for='newquiz_question4B'>Answer B:</label>
	<input name='newquiz_question4_answerB' maxlength='50' id='newquiz_question4B' class='quizinput'/>
	<label for='newquiz_question4C'>Answer C:</label>
	<input name='newquiz_question4_answerC' maxlength='50' id='newquiz_question4C' class='quizinput'/>
	<label for='newquiz_question4D'>Answer D:</label>
	<input name='newquiz_question4_answerD' maxlength='50' id='newquiz_question4D' class='quizinput'/>
	<br /><br />
	<label>Correct Answer:</label>
	A<input type="radio" name="correct_answer4" value="A" checked>
	B<input type="radio" name="correct_answer4" value="B">
	C<input type="radio" name="correct_answer4" value="C">
	D<input type="radio" name="correct_answer4" value="D">
	<br />
	<br />
	<label for='newquiz_question5'>Question #5:</label>
	<input name='newquiz_question5' maxlength='100' id='newquiz_question5' class='quizinput'/>
	<label for='newquiz_question5A'>Answer A:</label>
	<input name='newquiz_question5_answerA' maxlength='50' id='newquiz_question5A' class='quizinput'/>
	<label for='newquiz_question5B'>Answer B:</label>
	<input name='newquiz_question5_answerB' maxlength='50' id='newquiz_question5B' class='quizinput'/>
	<label for='newquiz_question5C'>Answer C:</label>
	<input name='newquiz_question5_answerC' maxlength='50' id='newquiz_question5C' class='quizinput'/>
	<label for='newquiz_question5D'>Answer D:</label>
	<input name='newquiz_question5_answerD' maxlength='50' id='newquiz_question5D' class='quizinput'/>
	<br /><br />
    <label>Correct Answer:</label>
	A<input type="radio" name="correct_answer5" value="A" checked>
	B<input type="radio" name="correct_answer5" value="B">
	C<input type="radio" name="correct_answer5" value="C">
	D<input type="radio" name="correct_answer5" value="D">
	<br /><br />
	<input type="hidden" name="num_questions" value="1">
	<input type='submit' id="addquizbtn" value='Add Quiz'>

</form>

<?php if(isset($error)): ?>
	<div class='error'>
		Unable to add post. Please make sure there is actual content in your post. It cannot be empty.
	</div>
	<br>
<?php endif; ?>
<div id="nav_hint_quiz_add"></div>