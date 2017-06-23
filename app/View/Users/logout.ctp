<div class = "users form">
    <h2><?php echo __('ログアウト'); ?></h2>
        <fieldset>

            <legend><?php echo __('ログアウトしました'); ?> </legend>
            <?php //echo $this->Form->end(__('はい')); ?>
        </fieldset>
</div>

<li><?php echo $this->Html->link(__('List Articles'), array('controller' => 'articles', 'action' => 'index')); ?> </li>
