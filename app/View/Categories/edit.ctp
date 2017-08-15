<div class="categories form">
<?php echo $this->Form->create('Category'); ?>
    <fieldset>
        <legend><?php echo __('カテゴリー編集'); ?></legend>
    <?php
        echo $this->Form->input('id');
        echo $this->Form->input('name');
    ?>
    </fieldset>
<?php echo $this->Form->end(__('編集')); ?>
</div>
<div class="actions">
    <ul>
        <li><?php echo $this->Html->link(__('カテゴリー一覧へ'), array('action' => 'index')); ?></li>
    </ul>
</div>
