<div class="articles form">
<?php echo $this->Form->create('Article'); ?>
    <fieldset>
        <legend><?php echo __('Edit Article'); ?></legend>
    <?php
        echo $this->Form->input('id');
        echo $this->Form->input('user_id');
        echo $this->Form->input('product_id');
        echo $this->Form->input('image');
        echo $this->Form->input('review');
        echo $this->Form->input('evaluation');
        echo $this->Form->input('great');
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>

        <li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Article.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Article.id')))); ?></li>
        <li><?php echo $this->Html->link(__('List Articles'), array('action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
    </ul>
</div>
