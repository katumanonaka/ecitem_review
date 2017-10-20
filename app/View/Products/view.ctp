<div class="products view">
<h2><?php echo __('商品詳細'); ?></h2>

    <dl>
        <dt><?php echo __('ID'); ?></dt>
        <dd>
            <?php echo h($product['Product']['id']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('商品名'); ?></dt>
        <dd>
            <?php echo h($product['Product']['name']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('企業名'); ?></dt>
        <dd>
            <?php echo $this->Html->link($product['Company']['name'], array('controller' => 'companies', 'action' => 'view', $product['Company']['id'])); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('カテゴリー名'); ?></dt>
        <dd>
            <?php echo $this->Html->link($product['Category']['name'], array('controller' => 'categories', 'action' => 'view', $product['Category']['id'])); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('値段'); ?></dt>
        <dd>
            <?php echo h($product['Product']['price']); ?>
            &nbsp;
        </dd>
        <!-- <dt><?php echo __('Size'); ?></dt>
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
        </dd> -->
    </dl>
</div>
<div class="actions">
    <br>
    <ul>
        <li><?php echo $this->Html->link(__('商品一覧へ戻る'), array('action' => 'index')); ?> </li>
    </ul>
</div>
<div class="related">
    <h3><?php echo __('記事一覧'); ?></h3>
    <?php if (!empty($product['Article'])): ?>
    <table cellpadding = "0" cellspacing = "0">
    <tr>
        <th><?php echo __('ID'); ?></th>
        <th><?php echo __('ユーザーID'); ?></th>
        <th><?php echo __('Evaluation'); ?></th>
    </tr>
    <?php foreach ($product['Article'] as $article): ?>
        <tr>
            <td><?php echo $article['id']; ?></td>
            <td><?php echo $article['user_id']; ?></td>
            <!-- <td><?php echo $article['product_id']; ?></td> -->
            <!-- <td><?php echo $article['image']; ?></td> -->
            <!-- <td><?php echo $article['review']; ?></td> -->
            <td><?php echo $article['evaluation']; ?></td>
            <!-- <td><?php echo $article['great']; ?></td> -->
            <!-- <td><?php echo $article['created']; ?></td>
            <td><?php echo $article['modified']; ?></td> -->
            <td class="actions">
                <!-- <?php echo $this->Html->link(__('View'), array('controller' => 'articles', 'action' => 'view', $article['id'])); ?>
                <?php echo $this->Html->link(__('Edit'), array('controller' => 'articles', 'action' => 'edit', $article['id'])); ?>
                <?php echo $this->Form->postLink(__('Delete'), array('controller' => 'articles', 'action' => 'delete', $article['id']), array('confirm' => __('Are you sure you want to delete # %s?', $article['id']))); ?> -->
            </td>
        </tr>
    <?php endforeach; ?>
    </table>
<?php endif; ?>

    <div class="actions">
        <ul>
            <!-- <li><?php echo $this->Html->link(__('New Article'), array('controller' => 'articles', 'action' => 'add')); ?> </li> -->
        </ul>
    </div>
</div>
