<div class="categoryies form">
<?php echo $this->Form->create('Categoryie'); ?>
	<fieldset>
		<legend><?php echo __('Edit Categoryie'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('category_name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Categoryie.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Categoryie.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Categoryies'), array('action' => 'index')); ?></li>
	</ul>
</div>
