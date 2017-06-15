<div class="users view">
<h2><?php echo __('User'); ?></h2>
    <dl>
        <dt><?php echo __('Id'); ?></dt>
        <dd>
            <?php echo h($user['User']['id']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Name'); ?></dt>
        <dd>
            <?php echo h($user['User']['name']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Password'); ?></dt>
        <dd>
            <?php echo h($user['User']['password']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Thumbnail'); ?></dt>
        <dd>
            <?php echo h($user['User']['thumbnail']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Gender'); ?></dt>
        <dd>
            <?php echo h($user['User']['gender']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Age'); ?></dt>
        <dd>
            <?php echo h($user['User']['age']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Job'); ?></dt>
        <dd>
            <?php echo $this->Html->link($user['Job']['id'], array('controller' => 'jobs', 'action' => 'view', $user['Job']['id'])); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Introduction'); ?></dt>
        <dd>
            <?php echo h($user['User']['introduction']); ?>
            &nbsp;
        </dd>
    </dl>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Edit User'), array('action' => 'edit', $user['User']['id'])); ?> </li>
        <li><?php echo $this->Form->postLink(__('Delete User'), array('action' => 'delete', $user['User']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $user['User']['id']))); ?> </li>
        <li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Jobs'), array('controller' => 'jobs', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Job'), array('controller' => 'jobs', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Articles'), array('controller' => 'articles', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Article'), array('controller' => 'articles', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Comments'), array('controller' => 'comments', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Comment'), array('controller' => 'comments', 'action' => 'add')); ?> </li>
    </ul>
</div>
<div class="related">
    <h3><?php echo __('Related Articles'); ?></h3>
    <?php if (!empty($user['Article'])): ?>
    <table cellpadding = "0" cellspacing = "0">
    <tr>
        <th><?php echo __('Id'); ?></th>
        <th><?php echo __('User Id'); ?></th>
        <th><?php echo __('Product Id'); ?></th>
        <th><?php echo __('Image'); ?></th>
        <th><?php echo __('Review'); ?></th>
        <th><?php echo __('Evaluation'); ?></th>
        <th><?php echo __('Great'); ?></th>
        <th><?php echo __('Created'); ?></th>
        <th><?php echo __('Modified'); ?></th>
        <th class="actions"><?php echo __('Actions'); ?></th>
    </tr>
    <?php foreach ($user['Article'] as $article): ?>
        <tr>
            <td><?php echo $article['id']; ?></td>
            <td><?php echo $article['user_id']; ?></td>
            <td><?php echo $article['product_id']; ?></td>
            <td><?php echo $article['image']; ?></td>
            <td><?php echo $article['review']; ?></td>
            <td><?php echo $article['evaluation']; ?></td>
            <td><?php echo $article['great']; ?></td>
            <td><?php echo $article['created']; ?></td>
            <td><?php echo $article['modified']; ?></td>
            <td class="actions">
                <?php echo $this->Html->link(__('View'), array('controller' => 'articles', 'action' => 'view', $article['id'])); ?>
                <?php echo $this->Html->link(__('Edit'), array('controller' => 'articles', 'action' => 'edit', $article['id'])); ?>
                <?php echo $this->Form->postLink(__('Delete'), array('controller' => 'articles', 'action' => 'delete', $article['id']), array('confirm' => __('Are you sure you want to delete # %s?', $article['id']))); ?>
            </td>
        </tr>
    <?php endforeach; ?>
    </table>
<?php endif; ?>

    <div class="actions">
        <ul>
            <li><?php echo $this->Html->link(__('New Article'), array('controller' => 'articles', 'action' => 'add')); ?> </li>
        </ul>
    </div>
</div>
<div class="related">
    <h3><?php echo __('Related Comments'); ?></h3>
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
    </div>
</div>
