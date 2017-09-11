
<div class="menu col-md-3">
    <h4><?php echo "メニュー"; ?></h3>
    <ul>
        <li><?="記事"?></li>
        <li><?php echo $this->Html->link(__('記事一覧'), array('controller' => 'Articles', 'action' => 'index')); ?></li>
        <li><?php echo $this->Html->link(__('記事の追加'), array('controller' => 'Articles', 'action' => 'add')); ?></li>
        <li><?="ユーザー"?></li>
        <li><?php echo $this->Html->link(__('ユーザー一覧'), array('controller' => 'users', 'action' => 'index')); ?> </li>
        <li><?="商品"?></li>
        <li><?php echo $this->Html->link(__('商品一覧'), array('controller' => 'products', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('商品の追加'), array('controller' => 'products', 'action' => 'add')); ?> </li>
        <li><?="カテゴリー"?></li>
        <li><?php echo $this->Html->link(__('カテゴリー一覧'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('カテゴリーの追加'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
        <li><?="企業"?></li>
        <li><?php echo $this->Html->link(__('企業一覧'), array('controller' => 'Companies', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('企業の追加'), array('controller' => 'Companies', 'action' => 'add')); ?> </li>
        <li><?="システム"?></li>
        <li><?php echo $this->Html->link(__('ログアウト'), array('controller' => 'users', 'action' => 'logout')); ?> </li>
    </ul>
</div>
