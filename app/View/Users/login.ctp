<div class = "users form">
    <h2><?php echo __('ログイン'); ?></h2>
    <?php echo $this->Session->flash('auth'); ?>
    <?php echo $this->Form->create('User'); ?>
        <fieldset>

            <legend><?php echo __('ユーザー名とパスワードを入力してください'); ?> </legend>
            <?php
                echo $this->Form->input('username');
                echo $this->Form->input('password');
            ?>

        </fieldset>
    <?php echo $this->Form->end(__('Login')); ?>
</div>

<li><?php echo $this->Html->link(__('ユーザー登録'), array('controller' => 'users', 'action' => 'add')); ?> </li>
