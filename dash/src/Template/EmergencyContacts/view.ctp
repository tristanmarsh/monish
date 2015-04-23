<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Emergency Contact'), ['action' => 'edit', $emergencyContact->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Emergency Contact'), ['action' => 'delete', $emergencyContact->id], ['confirm' => __('Are you sure you want to delete # {0}?', $emergencyContact->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Emergency Contacts'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Emergency Contact'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<div class="emergencyContacts view large-10 medium-9 columns">
    <h2><?= h($emergencyContact->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('First Name') ?></h6>
            <p><?= h($emergencyContact->first_name) ?></p>
            <h6 class="subheader"><?= __('Last Name') ?></h6>
            <p><?= h($emergencyContact->last_name) ?></p>
            <h6 class="subheader"><?= __('Email') ?></h6>
            <p><?= h($emergencyContact->email) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($emergencyContact->id) ?></p>
            <h6 class="subheader"><?= __('Phone') ?></h6>
            <p><?= $this->Number->format($emergencyContact->phone) ?></p>
        </div>
    </div>
</div>
