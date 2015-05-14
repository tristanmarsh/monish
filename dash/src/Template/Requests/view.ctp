<br>
<table>

<th><?= h($giraffe->title) ?></th>
<tr><td><?= h($giraffe->description) ?></td></tr>


</table>
Maintenace Requested By: <?= h($lion->user->first_name)?> <?= h($lion->user->last_name)?>
<p><small>Created: <?= $giraffe->created->format(DATE_RFC850) ?></small></p>
<p>
    <?php
        echo "Back to ";
        echo $this->Html->link('Requests', ['controller' => 'Requests', 'action' => 'index']);
    ?>
</p>