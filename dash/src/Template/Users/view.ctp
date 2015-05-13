<div class="actions columns large-2 medium-3">
    <h3><?= __('Menu') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit This User'), ['action' => 'edit', $user->id]) ?> </li>
		<li><a href="javascript:history.back()">Go Back</a></li>
		<br><br><br><br><br><br>
    </ul>
	
</div>

<br>
<table cellpadding="0" cellspacing="0">

            <tr><strong><?= __('User Id: ') ?></strong><?= h($user->id) ?></tr><br>
            <tr><strong><?= __('Username: ') ?></strong><?= h($user->username) ?></tr><br>
            <tr><strong><?= __('Role: ') ?></strong><?= h($user->role) ?></tr><br>
            <tr><strong><?= __('Created: ') ?></strong><?= h($user->created) ?></tr><br>
            <tr><strong><?= __('Modified: ') ?></strong><?= h($user->modified) ?></tr><br>
            <tr><strong><?= __('First Name: ') ?></strong><?= h($user->first_name) ?></tr><br>
			<tr><strong><?= __('Last Name: ') ?></strong><?= h($user->last_name) ?></tr><br>
			<tr><strong><?= __('Gender: ') ?></strong><?= h($user->gender) ?></tr><br>
			<tr><strong><?= __('Phone: ') ?></strong><?= h($user->phone) ?></tr><br>
			<tr><strong><?= __('Email: ') ?></strong><?= h($user->email) ?></tr><br>
			
    </table>
	
	