<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $emergencyContact->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $emergencyContact->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Emergency Contacts'), ['action' => 'index']) ?></li>
    </ul>
</div>
<div class="emergencyContacts form large-10 medium-9 columns">
    <?= $this->Form->create($emergencyContact); ?>
    <fieldset>
        <legend><?= __('Edit Emergency Contact') ?></legend>
        <?php
            echo $this->Form->input('first_name');
            echo $this->Form->input('last_name');
            echo $this->Form->input('phone');
            echo $this->Form->input('email');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
