<div class="paginator text-center">

    <ul class="pagination">
	 <?php if ($this->Paginator->hasPage(2)): ?>
	 
        <?= $this->Paginator->prev('< ' . __('previous')) ?>
        <?= $this->Paginator->numbers() ?>
        <?= $this->Paginator->next(__('next') . ' >') ?>
        <?php endif ?>
    </ul>
    <p><?= $this->Paginator->counter() ?></p>

</div>