<?php echo $this->Html->css('style.css'); ?>
<?php echo $this->Html->script('jquery-3.2.0.min.js'); ?>
<?php echo $this->Html->script('img.js'); ?>
<div class="products index">
    <h2><?php echo __('Products'); ?></h2>
    <h2><?php //debug($data4); ?></h2>

    <div class="article_chunk">
        <table ~~~ class="table-layout:fixed;width:100%;">
            <tr>
                <td>
                    <?php
                        //人気の記事を出力する処理
                        //記事のid
                        echo h($data[0]['Article']['id']);
                    ?>
                </td>

                <td>
                    <?php
                        //記事を投稿したユーザー
                        echo $this->Html->link(
                            $data[0]['User']['username'],
                            array(
                                'controller' => 'users',
                                'action' => 'view',
                                $data[0]['User']['id']
                            )
                        );
                    ?>
                </td>

                <td>
                    <?php
                        //商品名
                        echo $this->Html->link(
                            $data[0]['Product']['name'],
                            array(
                                'controller' => 'products',
                                'action' => 'view',
                                $data[0]['Product']['id']
                            )
                        );
                    ?>
                </td>

                <td>
                    <?php
                        //商品の画像
                        $article_id = $data[0]['Article']['id'];
                        $id = "/img/" . $article_id . ".jpg" ;
                        echo $this->Html->image($id, array('alt' => 'item'));
                    ?>
                </td>

                <td>
                    <button type="button" class="btn btn-success">
                        <?php echo $this->Html->link(__('View'), array('controller' => 'Articles' , 'action' => 'view', $data[0]['Article']['id'])); ?>
                    </button>
                </td>

            </tr>
        </table>
    </div>

    <table cellpadding="0" cellspacing="0">
    <thead>

    <tr>
            <th><?php echo $this->Paginator->sort('id'); ?></th>
            <th><?php echo $this->Paginator->sort('name'); ?></th>
            <th><?php echo $this->Paginator->sort('company_id'); ?></th>
            <th><?php echo $this->Paginator->sort('category_id'); ?></th>
            <th><?php echo $this->Paginator->sort('price'); ?></th>
            <th><?php echo $this->Paginator->sort('size'); ?></th>
            <th><?php echo $this->Paginator->sort('effect'); ?></th>
            <th><?php echo $this->Paginator->sort('how_to_use'); ?></th>
            <th class="actions"><?php echo __('Actions'); ?></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($products as $product): ?>
    <tr>
        <td><?php echo h($product['Product']['id']); ?>&nbsp;</td>
        <td><?php echo h($product['Product']['name']); ?>&nbsp;</td>
        <td>
            <?php echo $this->Html->link($product['Company']['name'], array('controller' => 'companies', 'action' => 'view', $product['Company']['id'])); ?>
        </td>
        <td>
            <?php echo $this->Html->link($product['Category']['name'], array('controller' => 'categories', 'action' => 'view', $product['Category']['id'])); ?>
        </td>
        <td><?php echo h($product['Product']['price']); ?>&nbsp;</td>
        <td><?php echo h($product['Product']['size']); ?>&nbsp;</td>
        <td><?php echo h($product['Product']['effect']); ?>&nbsp;</td>
        <td><?php echo h($product['Product']['how_to_use']); ?>&nbsp;</td>
        <td class="actions">
            <?php echo $this->Html->link(__('View'), array('action' => 'view', $product['Product']['id'])); ?>
            <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $product['Product']['id'])); ?>
            <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $product['Product']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $product['Product']['id']))); ?>
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
        <li><?php echo $this->Html->link(__('New Product'), array('action' => 'add')); ?></li>
        <li><?php echo $this->Html->link(__('List Companies'), array('controller' => 'companies', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Company'), array('controller' => 'companies', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Articles'), array('controller' => 'articles', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Article'), array('controller' => 'articles', 'action' => 'add')); ?> </li>
    </ul>
</div>
