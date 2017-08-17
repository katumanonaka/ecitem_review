<div class="users index">
    <?php echo $this->element('top');?>
    <h2><?php echo __('ユーザー一覧'); ?></h2>
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
    <?php
    echo $this->Paginator->counter(array(
        'format' => __('ページ {:page} / {:pages}')
    ));
    ?>    </p>
    <!-- <div class="paging">
    <?php
        echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
        echo $this->Paginator->numbers(array('separator' => ''));
        echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
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
        <li><?php echo $this->Html->link(__('記事一覧へ'), array('controller' => 'articles', 'action' => 'index')); ?> </li>
    </ul>
</div>


<?php
//人気の記事を出力する処理
    //記事のid
    echo h($data[0]['Article']['id']);

    //記事を投稿したユーザー
    echo $this->Html->link(
        $data[0]['User']['username'],
        array(
            'controller' => 'users',
            'action' => 'view',
            $data[0]['User']['id']
        )
    );

    //商品名
    echo $this->Html->link(
        $data[0]['Product']['name'],
        array(
            'controller' => 'products',
            'action' => 'view',
            $data[0]['Product']['id']
        )
    );

    //商品の画像
    $article_id = $data[0]['Article']['id'];
    $id = "/img/" . $article_id . ".jpg" ;
    echo $this->Html->image($id, array('alt' => 'item'));

?>
    <button type="button" class="btn btn-success">
    <?php echo $this->Html->link(__('View'), array('controller' => 'Articles' , 'action' => 'view', $data[0]['Article']['id'])); ?>
    </button>
