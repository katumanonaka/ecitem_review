<div class="articles form">
<?php echo $this->Form->create('Article'); ?>
	<fieldset>
		<legend><?php echo __('Add Article'); ?></legend>
	<?php
		echo $this->Form->input('user_id');
		echo $this->Form->input('product_id');
		echo $this->Form->input('image');
		//画像を選択する
		// echo $this->Form->input('image',array(
		//  	'type'=>'file',
		//  	'div'=>false,
		//  	'required'=>'required'
		//  ));
		echo $this->Form->input('review');
		echo "aaaa";
		echo $this->Form->input('evaluation');
		echo $this->Form->input('great');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">

	<ul>
	<h3><?php echo __('Actions'); ?></h3>
		<li><?php echo $this->Html->link(__('List Articles'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
	</ul>
</div>
