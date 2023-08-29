<div hx-get="/counter" hx-target="#counter" hx-swap="outerHTML" hx-trigger="load" class="container mx-auto">
	<div id="counter"></div>
</div>

<div class="container mx-auto">
	<?php foreach($people as $person): ?>
		<div class="my-2">
			<h2 class="text-center font-semibold text-gray-800 text-xl"><?= $person->name ?></h2>
		</div>
	<?php endforeach; ?>
</div>
