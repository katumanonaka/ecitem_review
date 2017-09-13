<div class="menu col-md-3">
    <h4><?php echo "メニュー"; ?></h3>
    <dl id="panel">
        <dt><?="記事"?></dt>
        <dd><?php echo $this->Html->link(__('記事一覧'), array('controller' => 'Articles', 'action' => 'index')); ?>
            <?php echo $this->Html->link(__('記事の追加'), array('controller' => 'Articles', 'action' => 'add')); ?></dd>
        <dt class="owwwo"><?="ユーザー"?></dt>
        <dd><?php echo $this->Html->link(__('ユーザー一覧'), array('controller' => 'users', 'action' => 'index')); ?> </dd>
        <dt><?="商品"?></dt>
        <dd><?php echo $this->Html->link(__('商品一覧'), array('controller' => 'products', 'action' => 'index')); ?>
            <?php echo $this->Html->link(__('商品の追加'), array('controller' => 'products', 'action' => 'add')); ?> </dd>
        <dt><?="カテゴリー"?></dt>
        <dd><?php echo $this->Html->link(__('カテゴリー一覧'), array('controller' => 'categories', 'action' => 'index')); ?>
            <?php echo $this->Html->link(__('カテゴリーの追加'), array('controller' => 'categories', 'action' => 'add')); ?> </dd>
        <dt><?="企業"?></dt>
        <dd><?php echo $this->Html->link(__('企業一覧'), array('controller' => 'Companies', 'action' => 'index')); ?>
            <?php echo $this->Html->link(__('企業の追加'), array('controller' => 'Companies', 'action' => 'add')); ?> </dd>
        <dt><?="システム"?></dt>
        <dd><?php echo $this->Html->link(__('ログアウト'), array('controller' => 'users', 'action' => 'logout')); ?> </dd>
    </dl>
</div>
