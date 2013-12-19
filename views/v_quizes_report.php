<?php
	foreach($takenquizes as $takenquiz): ?>
	<div class="quiz_summary">
		<a href="/quizes/score/<?=$takenquiz['quiz_number']?>"><?=$takenquiz['quiz_name']?></a>
	</div>
<?php endforeach; ?>