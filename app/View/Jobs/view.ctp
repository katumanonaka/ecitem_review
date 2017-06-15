<div class="jobs view">
<h2><?php echo __('Job'); ?></h2>
    <dl>
        <dt><?php echo __('Id'); ?></dt>
        <dd>
            <?php echo h($job['Job']['id']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Name'); ?></dt>
        <dd>
            <?php echo h($job['Job']['name']); ?>
            &nbsp;
        </dd>
    </dl>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Edit Job'), array('action' => 'edit', $job['Job']['id'])); ?> </li>
        <li><?php echo $this->Form->postLink(__('Delete Job'), array('action' => 'delete', $job['Job']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $job['Job']['id']))); ?> </li>
        <li><?php echo $this->Html->link(__('List Jobs'), array('action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Job'), array('action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
    </ul>
</div>
<div class="related">
    <h3><?php echo __('Related Users'); ?></h3>
    <?php if (!empty($job['User'])): ?>
    <table cellpadding = "0" cellspacing = "0">
    <tr>
        <th><?php echo __('Id'); ?></th>
        <th><?php echo __('Name'); ?></th>
        <th><?php echo __('Password'); ?></th>
        <th><?php echo __('Thumbnail'); ?></th>
        <th><?php echo __('Gender'); ?></th>
        <th><?php echo __('Age'); ?></th>
        <th><?php echo __('Job Id'); ?></th>
        <th><?php echo __('Introduction'); ?></th>
        <th class="actions"><?php echo __('Actions'); ?></th>
    </tr>
    <?php foreach ($job['User'] as $user): ?>
        <tr>
            <td><?php echo $user['id']; ?></td>
            <td><?php echo $user['name']; ?></td>
            <td><?php echo $user['password']; ?></td>
            <td><?php echo $user['thumbnail']; ?></td>
            <td><?php echo $user['gender']; ?></td>
            <td><?php echo $user['age']; ?></td>
            <td><?php echo $user['job_id']; ?></td>
            <td><?php echo $user['introduction']; ?></td>
            <td class="actions">
                <?php echo $this->Html->link(__('View'), array('controller' => 'users', 'action' => 'view', $user['id'])); ?>
                <?php echo $this->Html->link(__('Edit'), array('controller' => 'users', 'action' => 'edit', $user['id'])); ?>
                <?php echo $this->Form->postLink(__('Delete'), array('controller' => 'users', 'action' => 'delete', $user['id']), array('confirm' => __('Are you sure you want to delete # %s?', $user['id']))); ?>
            </td>
        </tr>
    <?php endforeach; ?>
    </table>
<?php endif; ?>

    <div class="actions">
        <ul>
            <li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
        </ul>
    </div>
</div>
