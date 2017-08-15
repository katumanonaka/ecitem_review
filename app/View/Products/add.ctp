<div class="products form">
<?php echo $this->Form->create('Product'); ?>
    <fieldset>
        <legend><?php echo __('商品追加'); ?></legend>
    <?php
        echo $this->Form->input('name');
        echo $this->Form->input('company_id');
        echo $this->Form->input('category_id');
        echo $this->Form->input('price');
        echo $this->Form->input('size');
        echo $this->Form->input('effect');
        echo $this->Form->input('how_to_use');
    ?>
    </fieldset>
<?php echo $this->Form->end(__('追加')); ?>
</div>
<div class="actions">
    <br>
    <ul>
        <li><?php echo $this->Html->link(__('商品一覧へ戻る'), array('action' => 'index')); ?></li>
    </ul>
</div>
