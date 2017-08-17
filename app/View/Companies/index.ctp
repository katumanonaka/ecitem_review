<div class="companies index">
    <h2><?php echo __('企業一覧'); ?></h2>
    <table cellpadding="0" cellspacing="0">
    <thead>
    <tr>
            <th><?php echo $this->Paginator->sort('id'); ?></th>
            <th><?php echo $this->Paginator->sort('企業名'); ?></th>
            <th><?php echo $this->Paginator->sort('URL'); ?></th>
            <th class="actions"><?php echo __('記事数'); ?></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($companies as $id => $company): ?>
    <tr>
        <td><?php echo h($company['Company']['id']); ?>&nbsp;</td>
        <td><?php echo h($company['Company']['name']); ?>&nbsp;</td>
        <td><?php echo h($company['Company']['url']); ?>&nbsp;</td>
        <td class="actions">
            <?php echo $this->Html->link(__('詳細'), array('action' => 'view', $company['Company']['id'])); ?>
            <?php echo $this->Html->link(__('編集'), array('action' => 'edit', $company['Company']['id'])); ?>
            <?php echo $this->Form->postLink(__('削除'), array('action' => 'delete', $company['Company']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $company['Company']['id']))); ?>
        </td>
        <td><?php
            $id++;
            echo $company_each_article_count[$id];
            ?>
        </td>
    </tr>
<?php endforeach; ?>
    </tbody>
    </table>
    <p>
    <?php
    echo $this->Paginator->counter(array(
        'format' => __('ページ{:page}/{:pages}')
    ));
    ?>    </p>
    <!-- <div class="paging">
    <?php
        echo $this->Paginator->prev('< ' . __('戻る'), array(), null, array('class' => 'prev disabled'));
        echo $this->Paginator->numbers(array('separator' => ''));
        echo $this->Paginator->next(__('進む') . ' >', array(), null, array('class' => 'next disabled'));
    ?>
    </div> -->
    <ul class="page">
        <li><?php echo $this->Paginator->first('<<' , array()); ?></li>
        <li><?php echo $this->Paginator->prev('<', array(), null, array('class' => 'prev disabled')); ?></li>
        <li><?php echo $this->Paginator->numbers(array('separator' => '')); ?></li>
        <li><?php echo $this->Paginator->next('>', array(), null, array('class' => 'next disabled')); ?></li>
        <li><?php echo $this->Paginator->last('>>', array()); ?></li>
    </ul>
</div>
<div class="actions">
    <br>
    <ul>
        <li><?php echo $this->Html->link(__('企業追加'), array('action' => 'add')); ?></li>
        <li><?php echo $this->Html->link(__('記事一覧へ'), array('controller' => 'articles', 'action' => 'index')); ?> </li>
    </ul>
</div>
