Num Correct: <?php if(isset($numcorrect)) echo $numcorrect; ?><br />
Num InCorrect: <?php if(isset($numincorrect)) echo $numincorrect; ?>

<?php if(sizeof($questions) > 0){
	foreach($questions as $current_question): ?>
		<div class="quiz_question">
			<div class="quiz_question"><?=$current_question['question']['question_content']?></div>
			<div class="quiz_answer">A: <?=$current_question['question']['answer_a']?></div>
			<div class="quiz_answer">B: <?=$current_question['question']['answer_b']?></div>
			<div class="quiz_answer">C: <?=$current_question['question']['answer_c']?></div>
			<div class="quiz_answer">D: <?=$current_question['question']['answer_d']?></div>
			<div class="quiz_answer">Your Answer: <?=$current_question['user_answer']?> Correct Answer: <?=$current_question['question']['correct_answer']?></div>
		</div>
	<?php
	endforeach;
}?>