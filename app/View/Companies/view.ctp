<div class="companies view">
<h2><?php echo __('詳細'); ?></h2>
    <dl>
        <dt><?php echo __('Id'); ?></dt>
        <dd>
            <?php echo h($company['Company']['id']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Name'); ?></dt>
        <dd>
            <?php echo h($company['Company']['name']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Url'); ?></dt>
        <dd>
            <?php echo h($company['Company']['url']); ?>
            &nbsp;
        </dd>
    </dl>
</div>
<div class="actions">
    <br>
    <ul>
        <li><?php echo $this->Html->link(__('編集'), array('action' => 'edit', $company['Company']['id'])); ?> </li>
        <li><?php echo $this->Html->link(__('企業一覧へ戻る'), array('action' => 'index')); ?> </li>
    </ul>
</div>
<div class="related">
    <h3><?php echo __('記事の一覧'); ?></h3>
    <?php if (!empty($company['Product'])): ?>
    <table cellpadding = "0" cellspacing = "0">
    <tr>
        <th><?php echo __('ID'); ?></th>
        <th><?php echo __('商品名前'); ?></th>
        <th><?php echo __('カテゴリーID'); ?></th>
        <th><?php echo __('値段'); ?></th>
        <!-- <th><?php echo __('サイズ'); ?></th> -->
        <!-- <th><?php echo __('効果'); ?></th>
        <th><?php echo __('使用法'); ?></th> -->
        <!-- <th class="actions"><?php echo __('Actions'); ?></th> -->
    </tr>
    <?php foreach ($company['Product'] as $product): ?>
        <tr>
            <td><?php echo $product['id']; ?></td>
            <td><?php echo $product['name']; ?></td>
            <td><?php echo $product['category_id']; ?></td>
            <td><?php echo $product['price']; ?></td>
            <!-- <td><?php echo $product['size']; ?></td>
            <td><?php echo $product['effect']; ?></td>
            <td><?php echo $product['how_to_use']; ?></td> -->
            <td class="actions">
                <?php echo $this->Html->link(__('詳細表示'), array('controller' => 'products', 'action' => 'view', $product['id'])); ?>
                <?php echo $this->Html->link(__('編集'), array('controller' => 'products', 'action' => 'edit', $product['id'])); ?>
                <?php echo $this->Form->postLink(__('削除'), array('controller' => 'products', 'action' => 'delete', $product['id']), array('confirm' => __('Are you sure you want to delete # %s?', $product['id']))); ?>
            </td>
        </tr>
    <?php endforeach; ?>
    </table>
<?php endif; ?>

    <div class="actions">
        <ul>
            <!-- <li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li> -->
        </ul>
    </div>
</div>
