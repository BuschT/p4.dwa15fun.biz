<div id="score_header">Results For Quiz: <?=$quiz_title?></div><br />
<div id="your_score">
	Your Score: <?php
		$score = $numcorrect/($numcorrect+$numincorrect);
		if ($score == 1){
			$score = "100";
		}
		echo $score;?>%<br />
	Questions Correct: <?php if(isset($numcorrect)) echo $numcorrect; ?><br />
	Questions InCorrect: <?php if(isset($numincorrect)) echo $numincorrect; ?>
</div>
<?php if(sizeof($questions) > 0){
	foreach($questions as $current_question): ?>
		<div class="quiz_question">
			<div class="quiz_question">Question: <?=$current_question['question']['question_content']?></div>
			<div class="quiz_answer">A: <?=$current_question['question']['answer_a']?></div><br />
			<div class="quiz_answer">B: <?=$current_question['question']['answer_b']?></div><br />
			<div class="quiz_answer">C: <?=$current_question['question']['answer_c']?></div><br />
			<div class="quiz_answer">D: <?=$current_question['question']['answer_d']?></div><br />
			<div class="quiz_answer">Your Answer: <?=$current_question['user_answer']?> ---> Correct Answer: <?=$current_question['question']['correct_answer']?></div><br />
		</div>
	<?php
	endforeach;
}?>