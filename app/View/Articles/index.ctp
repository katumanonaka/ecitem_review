<div class="articles index">

    <h2><?php echo __('Articles'); ?></h2>
    <table cellpadding="0" cellspacing="0">
        <div class="container">
            <table class="table">
                <thead>
                    <tr>
                            <th><?php echo $this->Paginator->sort('id'); ?></th>
                            <th><?php echo $this->Paginator->sort('user_id'); ?></th>
                            <th><?php echo $this->Paginator->sort('product_id'); ?></th>
                            <th><?php //echo $this->Paginator->sort('image'); ?></th>
                            <th><?php echo $this->Paginator->sort('img_src'); ?></th>
                            <th><?php echo $this->Paginator->sort('review'); ?></th>
                            <th><?php echo $this->Paginator->sort('evaluation'); ?></th>
                            <th><?php echo $this->Paginator->sort('great'); ?></th>
                            <th><?php echo $this->Paginator->sort('created'); ?></th>
                            <th><?php echo $this->Paginator->sort('modified'); ?></th>
                            <th class="actions"><?php echo __('Actions'); ?></th>
                    </tr>
                </thead>
            </table>
        </div>

    <tbody>
    <?php foreach ($articles as $article): ?>
        <div class="container">
            <table class="table">
                <tr>
                    <td><?php echo h($article['Article']['id']); ?>&nbsp;</td>
                    <td>
                        <?php echo $this->Html->link($article['User']['name'], array('controller' => 'users', 'action' => 'view', $article['User']['id'])); ?>
                    </td>
                    <td>
                        <?php echo $this->Html->link($article['Product']['name'], array('controller' => 'products', 'action' => 'view', $article['Product']['id'])); ?>
                    </td>
                    <td><?php echo h($article['Article']['image']); ?>&nbsp;</td>
                    <td><?php //echo h($article['Article']['image']); ?>&nbsp;</td>

                    <td><?php //echo $this->Html->image(’isu.jpg’, array('alt' => 'CakePHP')); ?></td>
                    <td><?php //$test = $this->Html->webroot.IMAGES_URL . "isu.jpg"; ?></td>

                              <!-- echo $this->Html->image('cake_logo.png', array('alt' => 'CakePHP')); -->

                    <!-- <h2><?php echo __('Uploads'); ?></h2>
                    <table cellpadding="0" cellspacing="0">
                    <tr>
                    <th><?php echo __('id'); ?></th>
                    <th><?php echo __('file_name'); ?></th>
                    <th><?php echo __('created'); ?></th>
                    </tr>
                    <?php foreach ($articles as $upload) : ?>
                    <tr>
                    <td><?php echo h($upload['Article']['id']); ?></td>
                    <td><?php echo h($upload['Article']['file_name']); ?></td>
                    <td><?php echo h($upload['Article']['created']); ?></td>
                    </tr>
                    <?php endforeach; ?>
                    </table>
                    </div> -->

                    <td><?php echo h($article['Article']['review']); ?>&nbsp;</td>
                    <td><?php echo h($article['Article']['evaluation']); ?>&nbsp;</td>
                    <td><?php echo h($article['Article']['great']); ?>&nbsp;</td>
                    <td><?php echo h($article['Article']['created']); ?>&nbsp;</td>
                    <td><?php echo h($article['Article']['modified']); ?>&nbsp;</td>

                    <td class="actions">
                        <button type="button" class="btn btn-success">
                        <?php echo $this->Html->link(__('View'), array('action' => 'view', $article['Article']['id'])); ?>
                        </button>
                        <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $article['Article']['id'])); ?>
                        <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $article['Article']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $article['Article']['id']))); ?>
                    </td>
    </tr>
</table>
</div>
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
        <li><?php echo $this->Html->link(__('New Article'), array('action' => 'add')); ?></li>
        <li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
    </ul>
</div>
