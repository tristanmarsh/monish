<h1>This is for testing purposes only</h1>

<?= $this->Html->link('Add New Tenant', ['action' => 'add']); ?> 
<p>
This function adds the person, student, lease and user. 
<br>The user credentials are automatically generated:
<br>username: email entered
<br>password: email entered
</p>

<p><?= $this->Html->link('tenants', ['action' => 'tenants']); ?></p>