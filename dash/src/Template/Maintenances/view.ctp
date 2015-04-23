<!-- File: src/Template/Articles/view.ctp -->

<h1><?= h($giraffe->title) ?></h1>
<p><?= h($giraffe->description) ?></p>
<p><small>Created: <?= $giraffe->created->format(DATE_RFC850) ?></small></p>