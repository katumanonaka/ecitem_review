<div class="articles index">
    <?php //error_reporting(0);?>
    <?php echo $this->Form->create('Article'); ?>
    <?php echo $this->Html->css('style.css'); ?>
    <?php echo $this->Html->script('jquery-3.2.0.min.js'); ?>
    <?php echo $this->Html->script('img.js'); ?>
    <h2><?php echo __('Articles'); ?></h2>

    <div class="col-md-6">
        <h4>カテゴリー</h4>
        <?php
            echo $this->Form->input('category', array(
            'multiple' => 'checkbox',
            'options' => $category_id,
            ));
        ?>
    </div>

    <div class="col-md-6">
        <h4>評価指数</h4>
        <?php
            echo $this->Form->input('evaluation', array(
            'multiple' => 'checkbox',
            'options' => $article_evaluation,
            ));
        ?>
    </div>

    <?php echo $this->Form->end(__('Submit'));?>

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
        <div class="col-md-6">
            <div class="article_chunk">
            <table ~~~ class="table-layout:fixed;width:100%;">
                <tr>
                    <td><?php echo h($article['articles']['id']); ?>&nbsp;</td>
                    <td>
                        <?php echo $this->Html->link(
                            $article['users']['username'],
                             array(
                                'controller' => 'users',
                                'action' => 'view',
                                $article['users']['id']
                            )
                        ); ?>
                    </td>
                    <td>
                        <?php echo $this->Html->link(
                            $article['products']['name'],
                            array(
                                'controller' => 'products',
                                'action' => 'view',
                                $article['products']['id']
                            )
                        ); ?>
                    </td>

                </tr>
                <tr>
                    <!-- 記事の画像表示 -->
                    <td><?php
                    $article_id = $article['articles']['id'];
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

                    echo $this->Html->image($id, array('alt' => 'item'));

                    ImageDestroy($in);
                    ImageDestroy($out);
                    ?> </td>

                </tr>
                <tr>

                    <td><?php echo h($article['articles']['evaluation']); ?>&nbsp;</td>
                    <td class="actions">
                        <button type="button" class="btn btn-success">
                        <?php echo $this->Html->link(__('View'), array('action' => 'view', $article['articles']['id'])); ?>
                        </button>
                    </td>
                </tr>
            </table>
        </div>
        </div>
    <?php endforeach; ?>
    </div>
    </div>
    </tbody>
    </table>
    <p><?php

     echo $this->Paginator->counter(array(
         'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
     ));

    echo $this->Paginator->counter(array(
        'format' => __('ページ {:page}/{:pages}')
    ));

    ?></p>
    <div class="paging">
    <?php
        echo $this->Paginator->first('最初のページへ' , array());
        echo $this->Paginator->prev('戻る', array(), null, array('class' => 'prev disabled'));
        echo $this->Paginator->numbers(array('separator' => ''));
        echo $this->Paginator->next('進む', array(), null, array('class' => 'next disabled'));
        echo $this->Paginator->last('最後のページへ', array());
    ?>
    </div>

    <div>
        <?php

        ?>
    </div>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('New Article'), array('action' => 'add')); ?></li>
        <li><?php echo $this->Html->link(__('UsersLogin'), array('controller' => 'users', 'action' => 'login')); ?> </li>
        <li><?php echo $this->Html->link(__('UsersLogout'), array('controller' => 'users', 'action' => 'logout')); ?> </li>
        <li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
    </ul>
</div>
