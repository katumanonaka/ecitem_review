<?php echo $this->Html->css('style.css'); ?>
<?php echo $this->Html->script('img.js'); ?>
<div class="products index">
    <h2><?php echo __('商品一覧'); ?></h2>
    <h2><?php //debug($data4); ?></h2>
<div class="product_menu">
<?php echo $this->element('menu');?>
</div>
    <div class="article_chunk">
        <table class="table-layout:fixed;width:100%;">
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
            <th><?php echo $this->Paginator->sort('ID'); ?></th>
            <th><?php echo $this->Paginator->sort('名前'); ?></th>
            <th><?php echo $this->Paginator->sort('企業名'); ?></th>
            <th><?php echo $this->Paginator->sort('カテゴリー名'); ?></th>
            <th><?php echo $this->Paginator->sort('値段'); ?></th>
            <!-- <th class="actions"><?php echo __('Actions'); ?></th> -->
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
    <?php
    echo $this->Paginator->counter(array(
        'format' => __('ページ {:page} / {:pages}')));
    ?>    </p>
    <!-- <div class="paging">
    <?php
        echo $this->Paginator->prev('< ' . __('戻る'), array(), null, array('class' => 'prev disabled'));
        echo $this->Paginator->numbers(array('separator' => ''));
        echo $this->Paginator->next(__('進む') . ' >', array(), null, array('class' => 'next disabled'));
    ?>
    </div> -->
    <ul class="page">
        <li><?php echo $this->Paginator->first('<<' , array()); ?></li>
        <li><?php echo $this->Paginator->prev('<', array(), null, array('class' => 'prev disabled')); ?></li>
        <li><?php echo $this->Paginator->numbers(array('separator' => '')); ?></li>
        <li><?php echo $this->Paginator->next('>', array(), null, array('class' => 'next disabled')); ?></li>
        <li><?php echo $this->Paginator->last('>>', array()); ?></li>
    </ul>
</div>
<div class="actions">
    <br>
    <ul>
        <li><?php echo $this->Html->link(__('商品追加'), array('action' => 'add')); ?></li>
        <li><?php echo $this->Html->link(__('記事一覧へ戻る'), array('controller' => 'articles', 'action' => 'index')); ?> </li>
    </ul>
</div>
