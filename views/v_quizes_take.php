<?php
if ($error == null){ ?>
	<form method='POST' action='/quizes/p_register_quiz' id="form_newpost">
		<?php
			$x = 1;
			foreach($quizquestions as $quizquestion): ?>
			<div class="quiz_question">
				<input type="hidden" name="question_number" value="<?=$quizquestion['question_no']?>" />
				<div class="quiz_question"><?=$quizquestion['question_content']?></div>
				<div class="quiz_answer">
					<input type="radio" name="user_answer<?=$x?>" value="A">A: <?=$quizquestion['answer_a']?><br />
				</div>
					<div class="quiz_answer">
					<input type="radio" name="user_answer<?=$x?>" value="B">B: <?=$quizquestion['answer_b']?><br />
				</div>
					<div class="quiz_answer">
					<input type="radio" name="user_answer<?=$x?>" value="C">C: <?=$quizquestion['answer_d']?><br />
				</div>
					<div class="quiz_answer">
					<input type="radio" name="user_answer<?=$x?>" value="D">D: <?=$quizquestion['answer_d']?><br />
				</div>
			</div>
			<?php $x = $x+1;
		endforeach; ?>
		<input type="hidden" name="quiz_number" value="<?=$quizinfo['quiz_number']?>" />
		<input type="hidden" name="quiz_questions_count" value="<?=count($quizquestions)?>" />
		<input type='submit' value='Submit Quiz'>
	</form>
	<div id="nav_hint_manage"></div>
<?php } else {
	echo $error;
} ?>