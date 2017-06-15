<div class="products view">
<h2><?php echo __('Product'); ?></h2>
    <dl>
        <dt><?php echo __('Id'); ?></dt>
        <dd>
            <?php echo h($product['Product']['id']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Name'); ?></dt>
        <dd>
            <?php echo h($product['Product']['name']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Company'); ?></dt>
        <dd>
            <?php echo $this->Html->link($product['Company']['name'], array('controller' => 'companies', 'action' => 'view', $product['Company']['id'])); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Category'); ?></dt>
        <dd>
            <?php echo $this->Html->link($product['Category']['name'], array('controller' => 'categories', 'action' => 'view', $product['Category']['id'])); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Price'); ?></dt>
        <dd>
            <?php echo h($product['Product']['price']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Size'); ?></dt>
        <dd>
            <?php echo h($product['Product']['size']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Effect'); ?></dt>
        <dd>
            <?php echo h($product['Product']['effect']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('How To Use'); ?></dt>
        <dd>
            <?php echo h($product['Product']['how_to_use']); ?>
            &nbsp;
        </dd>
    </dl>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('Edit Product'), array('action' => 'edit', $product['Product']['id'])); ?> </li>
        <li><?php echo $this->Form->postLink(__('Delete Product'), array('action' => 'delete', $product['Product']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $product['Product']['id']))); ?> </li>
        <li><?php echo $this->Html->link(__('List Products'), array('action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Product'), array('action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Companies'), array('controller' => 'companies', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Company'), array('controller' => 'companies', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Articles'), array('controller' => 'articles', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Article'), array('controller' => 'articles', 'action' => 'add')); ?> </li>
    </ul>
</div>
<div class="related">
    <h3><?php echo __('Related Articles'); ?></h3>
    <?php if (!empty($product['Article'])): ?>
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
    <?php foreach ($product['Article'] as $article): ?>
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
