<div class="articles_index">
    <?php error_reporting(0);?>
    <?php echo $this->Form->create('Article'); ?>
    <?php echo $this->Html->css('style.css'); ?>
    <?php echo $this->Html->css('page_style.css'); ?>
    <?php echo $this->Html->script('jquery-3.2.0.min.js'); ?>
    <?php echo $this->Html->script('script.js'); ?>
    <?php echo $this->Html->script('modal'); ?>

    <h2><?php echo __('記事一覧'); ?></h2>
    <?php
    // echo $a = $this->Session->read('Auth.User.username');
    // // echo $this->Auth->user('id');
    // // debug($this->Auth->user());
    // debug($this->Session->read('Auth.User.id'));//['Auth']));
    // echo "aaaa";
     ?>

<?php echo $this->element('menu'); ?>
    <div class="col-md-5 category">
        <h4 class="category_content">カテゴリー</h4>
        <div class="content"><?php
            echo $this->Form->input('category', array(
            'multiple' => 'checkbox',
            'options' => $category_id,
            ));
        ?></div>
    </div>

    <div class="col-md-4 category">
        <h4>評価指数</h4>
        <?php
            echo $this->Form->input('evaluation', array(
            'multiple' => 'checkbox',
            'options' => $article_evaluation,
            ));
        ?>
    </div>

    <?php echo $this->Form->end(__('検索'));?>

    <table cellpadding="0" cellspacing="0">
        <div class="container">
            <table class="table">
                <thead>
                    <tr>
                        <th class="actions"><?php //echo __('Actions'); ?></th>
                    </tr>
                </thead>
            </table>
        </div>

    <tbody>
    <div class="container">
    <div class="row">
    <?php //foreach ($articles as $article): ?>
    <?php foreach ($selected_article as $article): ?>
        <!-- 記事ひとまとまり -->
        <div class="col-md-6 article_chunk">
                <!-- <table class="table-layout"> -->
                    <!-- <div class="image"> -->
                        <!-- 記事の画像表示 -->

                        <?php
                        $article_id = $article['Article']['id'];
                        $id = "/img/" . $article_id . ".jpg" ;

                        // コピー元画像の指定
                        $path = WWW_ROOT . "upimg/" . $article_id  . ".jpg";
                        //出力先のファイル
                        $file = WWW_ROOT . "img/" . $article_id  . ".jpg";

                        // ファイル名から、画像インスタンスを生成
                        $in = imagecreatefromjpeg($path);
                        //元画像サイズ取得
                        $size = GetImageSize($path);
                        $width = 200;
                        $height = 200;
                        //サイズを指定した背景画像を生成
                        $out = ImageCreateTrueColor($width, $height);
                        //サイズ変更・コピー
                        ImageCopyResampled($out, $in, 0, 0, 0, 0, $width, $height, $size[0], $size[1]);
                        //画像保存
                        imagejpeg($out, $file ,100);

                        $temp = WWW_ROOT;
                        $temp = $temp . "img/". $article_id .".jpg";
                        // $img_path = "img/" . $article_id . ".jpg";
                        //サーバーの画像を持ってきているので本番環境では上手くいくはず
                        $img_path = "http://ecitemreview.main.jp/ecitem_review/img/" . $article_id . ".jpg";
                        ?>

                        <a href=<?=$img_path?> class="icon">
                        <?php
                        // 記事の商品画像表示
                        echo $this->Html->image($id, array('alt' => 'item'));
                        ?>
                        </a>

                        <?php
                        ImageDestroy($in);
                        ImageDestroy($out);
                        ?>

                    <div class="info">
                        <p><?php echo "記事ID" . h($article['Article']['id']); ?></p>
                        <p><?php echo "評価" . h($article['Article']['evaluation']); ?>&nbsp;</p>
                        <!-- &nbsp;</td> -->
                        <p><?php echo $this->Html->link(
                            $article['User']['username'],
                            array(
                                'controller' => 'users',
                                'action' => 'view',
                                $article['User']['id']
                            )
                        ); ?></p>
                        <p><?php echo $this->Html->link(
                                $article['Product']['name'],
                                array(
                                    'controller' => 'products',
                                    'action' => 'view',
                                    $article['Product']['id']
                                )
                            ); ?>
                        </p>
                        <p class="actions">
                            <!-- <button type="button" class="btn btn-success"> -->
                            <button type="button" class="btn btn-success">
                            <?php echo $this->Html->link(__('詳細'), array('action' => 'view', $article['Article']['id'])); ?>
                            </button>
                        </p>
                    </div>
                <!-- </table> -->
        </div>
    <?php endforeach; ?>
    </div>
    </div>
    </tbody>
    </table>

    <p><?php echo $this->Paginator->counter(array('format' => ('ページ {:page}/{:pages}')));?></p>

    <!-- <div class="paging"> -->
        <ul class="page">
            <li><?php echo $this->Paginator->first('<<' , array()); ?></li>
            <li><?php echo $this->Paginator->prev('<', array(), null, array('class' => 'prev disabled')); ?></li>
            <li><?php echo $this->Paginator->numbers(array('separator' => '')); ?></li>
            <li><?php echo $this->Paginator->next('>', array(), null, array('class' => 'next disabled')); ?></li>
            <li><?php echo $this->Paginator->last('>>', array()); ?></li>
        </ul>
    <!-- </div> -->

    <div>
        <?php

        ?>
    </div>

    <div class="actions">
        <h4><?php echo "メニュー"; ?></h3>
        <ul>
            <li><?php echo $this->Html->link(__('記事の追加'), array('action' => 'add')); ?></li>
            <li><?php echo $this->Html->link(__('ユーザー一覧'), array('controller' => 'users', 'action' => 'index')); ?> </li>
            <li><?php echo $this->Html->link(__('商品一覧'), array('controller' => 'products', 'action' => 'index')); ?> </li>
            <li><?php echo $this->Html->link(__('カテゴリー一覧'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
            <li><?php echo $this->Html->link(__('企業一覧'), array('controller' => 'Companies', 'action' => 'index')); ?> </li>
            <li><?php echo $this->Html->link(__('ログアウト'), array('controller' => 'users', 'action' => 'logout')); ?> </li>
        </ul>
    </div>
</div>
