<div class="articles view">
<h2><?php echo __('記事詳細'); ?></h2>
    <dl>
        <dt><?php echo __('Id'); ?></dt>
        <dd>
            <?php echo h($article['Article']['id']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('User'); ?></dt>
        <dd>
            <?php echo $this->Html->link($article['User']['username'], array('controller' => 'users', 'action' => 'view', $article['User']['id'])); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Product'); ?></dt>
        <dd>
            <?php echo $this->Html->link($article['Product']['name'], array('controller' => 'products', 'action' => 'view', $article['Product']['id'])); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Image'); ?></dt>
        <dd>
            <?php echo h($article['Article']['image']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Review'); ?></dt>
        <dd>
            <?php echo h($article['Article']['review']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Evaluation'); ?></dt>
        <dd>
            <?php echo h($article['Article']['evaluation']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Great'); ?></dt>
        <dd>
            <?php echo h($article['Article']['great']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Created'); ?></dt>
        <dd>
            <?php echo h($article['Article']['created']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Modified'); ?></dt>
        <dd>
            <?php echo h($article['Article']['modified']); ?>
            &nbsp;
        </dd>
    </dl>

    <h2>コメント一覧</h2>
    <!-- コメントテーブルからコメント一覧を表示する -->
    <?php foreach($article['Comment'] as $comment):?>
        <li id="comment_<?php echo h($comment['id']); ?>">
            <?php echo h($comment['content']) ?>
            <?php //debug($comment);?>
            <?php echo $this->Form->postLink(__('削除'),
                array(
                    'controller'=>'comments' ,
                    'action' => 'delete',
                    $comment['id'],
                    $article['Article']['id']
                ),
                array(
                    'confirm' => __('Are you sure you want to delete # %s?', $comment['id'] )
                )
            ); ?>
        </li>
    <?php endforeach; ?>

    <h2>コメント追加</h2>
    <!-- コメントを追加する -->
    <?php
    // エラー出力をしない
    error_reporting(0);
    echo $this->Form->create('Comment', array('action'=>'add'));
    echo $this->Form->input('content', array('rows'=>3));
    echo $this->Form->input('Comment.article_id', array('type'=>'hidden' , 'value'=>$article['Article']['id']));
    echo $this->Form->end('コメントを送る');
     ?>

</div>

<div class="actions">
    <br>
    <ul>
        <li><?php echo $this->Html->link(__('記事一覧に戻る'), array('action' => 'index')); ?> </li>
    </ul>
</div>

<script>
$(function() {
    $('a.delete').click(function(e) {
        if (confirm('sure?')) {
            $.post('/ecitem_review/comments/delete/'+$(this).data('comment-id'), {}, function(res) {
                $('#comment_'+res.id).fadeOut();
            }, "json");
        }
        return false;
    });
});
</script>
