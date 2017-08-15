<div class="users view">
<h2><?php echo __('User'); ?></h2>
    <dl>
        <dt><?php echo __('ID'); ?></dt>
        <dd>
            <?php echo h($user['User']['id']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('名前'); ?></dt>
        <dd>
            <?php echo h($user['User']['username']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('サムネ'); ?></dt>
        <dd>
            <?php echo h($user['User']['thumbnail']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('性別'); ?></dt>
        <dd>
            <?php echo h($user['User']['gender']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('年齢'); ?></dt>
        <dd>
            <?php echo h($user['User']['age']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('職業'); ?></dt>
        <dd>
            <?php echo $this->Html->link($user['Job']['id'], array('controller' => 'jobs', 'action' => 'view', $user['Job']['id'])); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('自己紹介'); ?></dt>
        <dd>
            <?php echo h($user['User']['introduction']); ?>
            &nbsp;
        </dd>
    </dl>
</div>
<div class="actions">
    <br>
    <ul>
        <li><?php echo $this->Html->link(__('編集'), array('action' => 'edit', $user['User']['id'])); ?> </li>
        <!-- <li><?php echo $this->Form->postLink(__('Delete User'), array('action' => 'delete', $user['User']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $user['User']['id']))); ?> </li> -->
        <li><?php echo $this->Html->link(__('ユーザー一覧へ戻る'), array('action' => 'index')); ?> </li>
    </ul>
</div>
<div class="related">
    <h3><?php echo __('投稿した記事'); ?></h3>
    <?php if (!empty($user['Article'])): ?>
    <table cellpadding = "0" cellspacing = "0">
    <tr>
        <th><?php echo __('記事ID'); ?></th>
        <th><?php echo __('商品ID'); ?></th>
        <th><?php echo __('点数'); ?></th>
    </tr>
    <?php foreach ($user['Article'] as $article): ?>
        <tr>
            <td><?php echo $article['id']; ?></td>
            <td><?php echo $article['product_id']; ?></td>
            <td><?php echo $article['evaluation']; ?></td>
            <td class="actions">
                <?php echo $this->Html->link(__('詳細'), array('controller' => 'articles', 'action' => 'view', $article['id'])); ?>
                <?php echo $this->Html->link(__('編集'), array('controller' => 'articles', 'action' => 'edit', $article['id'])); ?>
                <?php echo $this->Form->postLink(__('削除'), array('controller' => 'articles', 'action' => 'delete', $article['id']), array('confirm' => __('Are you sure you want to delete # %s?', $article['id']))); ?>
            </td>
        </tr>
    <?php endforeach; ?>
    </table>
<?php endif; ?>

    <div class="actions">
        <ul>
            <li><?php echo $this->Html->link(__('記事を投稿する'), array('controller' => 'articles', 'action' => 'add')); ?> </li>
        </ul>
    </div>
</div>
<div class="related">
    <!-- <h3><?php echo __('Related Comments'); ?></h3>
    <?php if (!empty($user['Comment'])): ?>
    <table cellpadding = "0" cellspacing = "0">
    <tr>
        <th><?php echo __('Id'); ?></th>
        <th><?php echo __('Articly Id'); ?></th>
        <th><?php echo __('Content'); ?></th>
        <th><?php echo __('User Id'); ?></th>
        <th class="actions"><?php echo __('Actions'); ?></th>
    </tr>
    <?php foreach ($user['Comment'] as $comment): ?>
        <tr>
            <td><?php echo $comment['id']; ?></td>
            <td><?php echo $comment['articly_id']; ?></td>
            <td><?php echo $comment['content']; ?></td>
            <td><?php echo $comment['user_id']; ?></td>
            <td class="actions">
                <?php echo $this->Html->link(__('View'), array('controller' => 'comments', 'action' => 'view', $comment['id'])); ?>
                <?php echo $this->Html->link(__('Edit'), array('controller' => 'comments', 'action' => 'edit', $comment['id'])); ?>
                <?php echo $this->Form->postLink(__('Delete'), array('controller' => 'comments', 'action' => 'delete', $comment['id']), array('confirm' => __('Are you sure you want to delete # %s?', $comment['id']))); ?>
            </td>
        </tr>
    <?php endforeach; ?>
    </table>
<?php endif; ?>

    <div class="actions">
        <ul>
            <li><?php echo $this->Html->link(__('New Comment'), array('controller' => 'comments', 'action' => 'add')); ?> </li>
        </ul>
    </div> -->
</div>
