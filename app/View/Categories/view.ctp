<div class="categories view">
<h2><?php echo __('カテゴリー詳細'); ?></h2>
    <dl>
        <dt><?php echo __('Id'); ?></dt>
        <dd>
            <?php echo h($category['Category']['id']); ?>
            &nbsp;
        </dd>
        <dt><?php echo __('Name'); ?></dt>
        <dd>
            <?php echo h($category['Category']['name']); ?>
            &nbsp;
        </dd>
    </dl>
</div>
<div class="actions">
    <br>
    <ul>
        <li><?php echo $this->Html->link(__('カテゴリー一覧'), array('action' => 'index')); ?> </li>
    </ul>
</div>
<div class="related">
    <h3><?php echo __('記事一覧'); ?></h3>
    <?php if (!empty($category['Product'])): ?>
    <table cellpadding = "0" cellspacing = "0">
    <tr>
        <th><?php echo __('Id'); ?></th>
        <th><?php echo __('名前'); ?></th>
        <th><?php echo __('企業Id'); ?></th>
        <th><?php echo __('金額'); ?></th>
        <th><?php echo __('サイズ'); ?></th>
        <th><?php echo __('効果'); ?></th>
        <th><?php echo __('使い方'); ?></th>
    </tr>
    <?php foreach ($category['Product'] as $product): ?>
        <tr>
            <td><?php echo $product['id']; ?></td>
            <td><?php echo $product['name']; ?></td>
            <td><?php echo $product['company_id']; ?></td>
            <td><?php echo $product['price']; ?></td>
            <td><?php echo $product['size']; ?></td>
            <td><?php echo $product['effect']; ?></td>
            <td><?php echo $product['how_to_use']; ?></td>
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
