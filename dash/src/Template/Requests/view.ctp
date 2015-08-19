<?php
    $this->Html->addCrumb('Requests', '/requests');
    $this->Html->addCrumb('View Request', array('controller' => 'requests', 'action' => 'view'));

?>

<br>
<table>

<th>Title: <?= h($giraffe->title) ?></th>
<tr><td>Category: <?= h($giraffe->category) ?></td></tr>
<tr><td>Property: <?= h($giraffe->property_address) ?></td></tr>
<tr><td><?= h($giraffe->description) ?></td></tr>
<!-- <tr><td> <?php echo $this->Html->link('changestatus', ['action' => 'changestatus', $article->id]);

?></td></tr> -->


</table>
Maintenace Requested By: <?= h($lion->person->first_name)?> <?= h($lion->person->last_name)?>
<p><small>Created: <?= $giraffe->created->format('d M Y H:i:s') ?></small></p>
