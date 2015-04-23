<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Payment'), ['action' => 'edit', $payment->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Payment'), ['action' => 'delete', $payment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $payment->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Payments'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Payment'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Leases'), ['controller' => 'Leases', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Lease'), ['controller' => 'Leases', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="payments view large-10 medium-9 columns">
    <h2><?= h($payment->id) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Lease') ?></h6>
            <p><?= $payment->has('lease') ? $this->Html->link($payment->lease->id, ['controller' => 'Leases', 'action' => 'view', $payment->lease->id]) : '' ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($payment->id) ?></p>
            <h6 class="subheader"><?= __('Amount') ?></h6>
            <p><?= $this->Number->format($payment->amount) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Date Paid') ?></h6>
            <p><?= h($payment->date_paid) ?></p>
            <h6 class="subheader"><?= __('Payment Period Starting') ?></h6>
            <p><?= h($payment->payment_period_starting) ?></p>
        </div>
    </div>
</div>
