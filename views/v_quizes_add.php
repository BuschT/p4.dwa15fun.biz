<form method='POST' action='/quizes/p_add' id="form_newquiz">

	<label for='newquiz_title'>Quiz name:</label>
	<input name='newquiz_name' maxlength='100' id='newquiz_name'></input>

	<br />
	<label for='newquiz_content'>Question #1:</label><br>
	<input name='newquiz_question1' maxlength='200' id='newquiz_question1'></input>
	<label for='newquiz_content'>Answer A:</label><br>
	<input name='newquiz_question1_answerA' maxlength='200' id='newquiz_questionA'></input>
	<label for='newquiz_content'>Answer B:</label><br>
	<input name='newquiz_question1_answerB' maxlength='200' id='newquiz_questionB'></input>
	<label for='newquiz_content'>Answer C:</label><br>
	<input name='newquiz_question1_answerC' maxlength='200' id='newquiz_questionC'></input>
	<label for='newquiz_content'>Answer D:</label><br>
	<input name='newquiz_question1_answerD' maxlength='200' id='newquiz_questionD'></input>
	<br>
	<input type="radio" name="correct_answer1" value="A">A
	<input type="radio" name="correct_answer1" value="B">B
	<input type="radio" name="correct_answer1" value="C">C
	<input type="radio" name="correct_answer1" value="D">D
	<br>
	<button type="button">Add Another Question</button>
	<input type='submit' value='Done'>

</form>

<?php if(isset($error)): ?>
	<div class='error'>
		Unable to add post. Please make sure there is actual content in your post. It cannot be empty.
	</div>
	<br>
<?php endif; ?>
<div id="nav_hint_addpost"></div>