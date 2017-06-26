<div class="articles view">
<h2><?php echo __('Article'); ?></h2>
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

    <h2>Comments</h2>
    <!-- コメントテーブルからコメント一覧を表示する -->
    <?php foreach($article['Comment'] as $comment):?>
        <li id="comment_<?php echo h($comment['id']); ?>">
            <?php echo h($comment['content']) ?>
            <?php //debug($comment);?>
            <?php echo $this->Form->postLink(__('Delete'),
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

    <h2>Add Comment</h2>
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
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Edit Article'), array('action' => 'edit', $article['Article']['id'])); ?> </li>
        <li><?php echo $this->Form->postLink(__('Delete Article'), array('action' => 'delete', $article['Article']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $article['Article']['id']))); ?> </li>
        <li><?php echo $this->Html->link(__('List Articles'), array('action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Article'), array('action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
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
