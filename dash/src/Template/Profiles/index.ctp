<?php $user = $this->Session->read('Auth.User'); ?>
</div><!-- /.escape row -->
</div><!-- /.escape content -->
</div><!-- /.escape container -->

	<div class="col-sm-3 sidebar">

		<?php echo $this->element('tenant-sidebar'); ?>
		
	</div>

	<div class="col-sm-9">

		<div class="content">

			<h3>
				<?php echo $user['first_name'].nl2br("\n").$user['last_name']; ?>
			</h3>
				<u><?php echo "Username:"; ?></u>
				<?php echo " ".$user['username']; ?>
				<u><?php echo nl2br("\nContact Number:"); ?></u>
				<?php echo " ".$user['phone']; ?>
				<?php
				echo $this->Form->create(null, [
					'url' => ['controller' => 'Users', 'action' => 'index']
					]);
				echo $this->Form->button(__('Update Emergency Contacy (This does nothing right now)'));
				?>
				<u><?php echo nl2br("\nEmail Address:"); ?></u>
				<?php echo " ".$user['email']; ?>
				<u><?php echo nl2br("\nEnd Lease Date:"); ?></u>

		</div>

	</div>
<p>


</p>








