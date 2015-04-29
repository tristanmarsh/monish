<!-- File: src/Template/Articles/view.ctp -->

<h1><?= h($giraffe->title) ?></h1>
<p><?= h($giraffe->description) ?></p>
<p>Maintenace Requested By: <?= h($lion->user->first_name)?><?= h($lion->user->last_name)?></p>
<p><small>Created: <?= $giraffe->created->format(DATE_RFC850) ?></small></p>

<p>
    <?php
        echo "Back to ";
        echo $this->Html->link('Maintenance Requests', ['controller' => 'maintenances', 'action' => 'index']);
    ?>
</p>