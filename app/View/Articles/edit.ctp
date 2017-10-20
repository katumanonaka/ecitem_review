<div class="articles form">
<?php echo $this->Form->create('Article'); ?>
    <fieldset>
        <legend><?php echo __('記事の編集'); ?></legend>
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
    <br>
    <ul>
        <li><?php echo $this->Html->link(__('記事一覧へ'), array('action' => 'index')); ?></li>
    </ul>
</div>
