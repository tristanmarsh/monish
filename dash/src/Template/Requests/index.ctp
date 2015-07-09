<!-- File: src/Template/Requests/index.ctp -->
<?php $user = $this->Session->read('Auth.User'); ?>

        <h3>List of Requests</h3>
        <?= $this->Html->link('Add Request', ['action' => 'add']) ?>
        

        <table>
            <tr>
                <th>Title</th>
                <th>Requested By</th>
        		<th>Category</th>
                <th>Property</th>
                <th>Requested</th>
                <th>Action</th>
            </tr>

            <!-- Here is where we iterate through our $articles query object, printing out article info -->

            <?php foreach ($elephant as $article): ?>
        	<?php if ($article->person_id === $userEntity->person_id OR $user['role'] === 'admin') : ?>
        	
        	<tr>
                <td>
                    <?= $this->Html->link($article->title, ['action' => 'view', $article->id]) ?>
                </td>
                <td>
                    <?php
                        echo $article->person->first_name;
                        echo " ".$article->person->last_name;
                    ?>
                </td>
        		<td>
                    <?= $article->category ?>
                </td>
                <td>
                    <?= $article->property_address ?>
                </td>
                <td>
                    <?= $article->created->format('d/m/y' /*'h:m A'*/) ?>
                </td>
                <td>
        			<?php 
        				if ($article->person_id === $userEntity->person_id OR $user['role'] === 'admin') // If the user owns it, or they are admin, they can see the actions
        				{
        					echo $this->Form->postLink(
        					'Delete',
        					['action' => 'delete', $article->id],
        					['confirm' => 'Are you sure?']);
        					echo " "; // this puts a space between Delete and Edit button
        					echo $this->Html->link('Edit', ['action' => 'edit', $article->id]);
        				};
        			?>
                </td>
            </tr>

        	<?php endif ?>
            
            <?php endforeach; ?>
        </table>








