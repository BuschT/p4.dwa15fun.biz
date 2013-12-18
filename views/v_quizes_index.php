<?php if(sizeof($quizes) > 0){
	foreach($quizes as $quiz): ?>
		<article class="quizes">
			<div class="quiz"><a href='/quizes/take/<?=$quiz['quiz_number']?>'><?=$quiz['quiz_name']?></div>
		</article>
	<?php endforeach;
} else {
	?>You don't have any quizes in the system. Try adding some quizes.<?php
}?>
<div id="nav_hint_latestactivity"></div>
