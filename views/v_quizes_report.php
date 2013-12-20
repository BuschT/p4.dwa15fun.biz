<div id="report_intro">Please select a quiz below to view a report</div>
<?php if(isset($takenquizes)){
	foreach($takenquizes as $takenquiz): ?>
		<div class="quiz_summary">
			<a href="/quizes/score/<?=$takenquiz['quiz_number']?>"><?=$takenquiz['quiz_name']?></a>
		</div>
	<?php endforeach;
}?>
<div id="nav_hint_quiz_report"></div>