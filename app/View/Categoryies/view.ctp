<div class="categoryies view">
<h2><?php echo __('Categoryie'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($categoryie['Categoryie']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Category Name'); ?></dt>
		<dd>
			<?php echo h($categoryie['Categoryie']['category_name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Categoryie'), array('action' => 'edit', $categoryie['Categoryie']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Categoryie'), array('action' => 'delete', $categoryie['Categoryie']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $categoryie['Categoryie']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Categoryies'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Categoryie'), array('action' => 'add')); ?> </li>
	</ul>
</div>
