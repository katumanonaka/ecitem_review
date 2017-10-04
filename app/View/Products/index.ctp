<?php echo $this->Html->css('style.css'); ?>
<?php echo $this->Html->script('img.js'); ?>
<?php echo $this->element('menu');?>

<div class="products_index">
    <h2><?php echo __('商品一覧'); ?></h2>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                    <th><?php echo $this->Paginator->sort('ID'); ?></th>
                    <th><?php echo $this->Paginator->sort('名前'); ?></th>
                    <th><?php echo $this->Paginator->sort('企業名'); ?></th>
                    <th><?php echo $this->Paginator->sort('カテゴリー名'); ?></th>
                    <th><?php echo $this->Paginator->sort('値段'); ?></th>
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
                    <!-- <td><?php echo h($product['Product']['size']); ?>&nbsp;</td>
                    <td><?php echo h($product['Product']['effect']); ?>&nbsp;</td>
                    <td><?php echo h($product['Product']['how_to_use']); ?>&nbsp;</td> -->
                    <td class="actions">
                    <?php echo $this->Html->link(__('詳細表示'), array('action' => 'view', $product['Product']['id'])); ?>
                    <?php echo $this->Html->link(__('編集'), array('action' => 'edit', $product['Product']['id'])); ?>
                    <?php echo $this->Form->postLink(__('削除'), array('action' => 'delete', $product['Product']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $product['Product']['id']))); ?>
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
            <li><?php echo $this->Html->link(__('商品追加'), array('action' => 'add')); ?></li>
            <li><?php echo $this->Html->link(__('記事一覧へ戻る'), array('controller' => 'articles', 'action' => 'index')); ?> </li>
        </ul>
    </div>
</div>
