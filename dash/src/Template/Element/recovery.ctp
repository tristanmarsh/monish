<div class="users form">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Input Your Email') ?></legend>
        <?= $this->Form->input('username') ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')); ?>

</div>

