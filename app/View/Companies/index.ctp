<div class="companies index">
    <h2><?php echo __('Companies'); ?></h2>
    <table cellpadding="0" cellspacing="0">
    <thead>
    <tr>
            <th><?php echo $this->Paginator->sort('id'); ?></th>
            <th><?php echo $this->Paginator->sort('name'); ?></th>
            <th><?php echo $this->Paginator->sort('url'); ?></th>
            <th class="actions"><?php echo __('Actions'); ?></th>
            <th class="actions"><?php echo __('記事数'); ?></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($companies as $id => $company): ?>
    <tr>
        <td><?php echo h($company['Company']['id']); ?>&nbsp;</td>
        <td><?php echo h($company['Company']['name']); ?>&nbsp;</td>
        <td><?php echo h($company['Company']['url']); ?>&nbsp;</td>
        <td class="actions">
            <?php echo $this->Html->link(__('View'), array('action' => 'view', $company['Company']['id'])); ?>
            <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $company['Company']['id'])); ?>
            <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $company['Company']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $company['Company']['id']))); ?>
        </td>
        <td><?php
            $id++;
            echo $company_each_article_count[$id];
            ?>
        </td>
    </tr>
<?php endforeach; ?>
    </tbody>
    </table>
    <p>
    <?php
    echo $this->Paginator->counter(array(
        'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
    ));
    ?>    </p>
    <div class="paging">
    <?php
        echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
        echo $this->Paginator->numbers(array('separator' => ''));
        echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
    ?>
    </div>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('New Company'), array('action' => 'add')); ?></li>
        <li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
    </ul>
</div>
