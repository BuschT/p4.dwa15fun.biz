<?php
	echo 'QUIZ NAME: '.$quizinfo['quiz_name'].'<br />';

	foreach($quizquestions as $quizquestion):
		#echo $quizquestion;
		echo $quizquestion['question_no'];
		echo "Question Number ID: ".$quizquestion['question_content']."<br />";
	endforeach;
?>


<div id="nav_hint_manage"></div>