<?php if(sizeof($quizes) > 0){
	foreach($quizes as $quiz): ?>
		<article class="quizes">
			<div class="quiz"><a class="quiz_url" href='/quizes/take/<?=$quiz['quiz_number']?>'><?=$quiz['quiz_name']?></a><span class="quiz_creator">By <?=$quiz['quiz_creator_name']?></span><div class="quiz_description"><?=$quiz['quiz_description']?></div></div>
		</article>
	<?php endforeach;
} else {
	?>You don't have any quizes in the system. Try adding some quizes.<?php
}?>
<div id="nav_hint_quiz_take"></div>
