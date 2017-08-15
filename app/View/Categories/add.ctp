<div class="categories form">
<?php echo $this->Form->create('Category'); ?>
    <fieldset>
        <legend><?php echo __('カテゴリー追加'); ?></legend>
    <?php
        echo $this->Form->input('name');
    ?>
    </fieldset>
<?php echo $this->Form->end(__('追加')); ?>
</div>
<div class="actions">
    <br>
    <ul>
        <li><?php echo $this->Html->link(__('カテゴリー一覧'), array('action' => 'index')); ?></li>
    </ul>
</div>
