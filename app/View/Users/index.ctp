<?php echo $this->Html->script('jquery-3.2.0.min.js'); ?>
<?php echo $this->Html->script('menu.js'); ?>
<?php echo $this->element('menu');?>
<div class="users_index">
<?php echo $this->Html->script('menu.js'); ?>

    <h2><?php echo __('ユーザー一覧'); ?></h2>
    <div class="product_menu">
    </div>
    <table cellpadding="0" cellspacing="0">
    <thead>
    <tr>
            <th><?php echo $this->Paginator->sort('ID'); ?></th>
            <th><?php echo $this->Paginator->sort('名前'); ?></th>
            <th><?php echo $this->Paginator->sort('年齢'); ?></th>
    </tr>
    </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?php echo h($user['User']['id']); ?>&nbsp;</td>
                    <td><?php echo h($user['User']['username']); ?>&nbsp;</td>
                    <td><?php echo h($user['User']['age']); ?>&nbsp;</td>
                    <td class="actions">
                        <?php echo $this->Html->link(__('View'), array('action' => 'view', $user['User']['id'])); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <p>
        <?php echo $this->Paginator->counter(array('format' => __('ページ {:page} / {:pages}'))); ?>
    </p>
    <ul class="page">
        <li><?php echo $this->Paginator->first('<<' , array()); ?></li>
        <li><?php echo $this->Paginator->prev('<', array(), null, array('class' => 'prev disabled')); ?></li>
        <li><?php echo $this->Paginator->numbers(array('separator' => '')); ?></li>
        <li><?php echo $this->Paginator->next('>', array(), null, array('class' => 'next disabled')); ?></li>
        <li><?php echo $this->Paginator->last('>>', array()); ?></li>
    </ul>
    <div class="actions">
        <br>
        <ul>
            <li><?php echo $this->Html->link(__('記事一覧へ'), array('controller' => 'articles', 'action' => 'index')); ?> </li>
        </ul>
    </div>
</div>
