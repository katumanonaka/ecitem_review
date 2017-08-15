<div class="users form">
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __('ユーザー情報編集'); ?></legend>
    <?php
        echo $this->Form->input('id');
        echo $this->Form->input('name');
        echo $this->Form->input('password');
        echo $this->Form->input('thumbnail');
        echo $this->Form->input('gender');
        echo $this->Form->input('age');
        echo $this->Form->input('job_id');
        echo $this->Form->input('introduction');
    ?>
    </fieldset>
<?php echo $this->Form->end(__('編集')); ?>
</div>
<div class="actions">
    <br>
    <ul>
        <li><?php echo $this->Html->link(__('ユーザー一覧へ戻る'), array('action' => 'index')); ?></li>
    </ul>
</div>
