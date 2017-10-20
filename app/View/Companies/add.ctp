<div class="companies form">
<?php echo $this->Form->create('Company'); ?>
    <fieldset>
        <legend><?php echo __('企業追加'); ?></legend>
    <?php
        echo $this->Form->input('name');
        echo $this->Form->input('url');
    ?>
    </fieldset>
<?php echo $this->Form->end(__('追加')); ?>
</div>
<div class="actions">
    <br>
    <ul>
        <li><?php echo $this->Html->link(__('企業一覧へ戻る'), array('action' => 'index')); ?></li>
    </ul>
</div>
