<div class="articles form">
<?php echo $this->Form->create('Article', array(
                                    'type'=>'file',
                                    'enctype' => 'multipart/form-data')); ?>
    <fieldset>
        <legend><?php echo __('記事の追加'); ?></legend>
    <?php
        // echo $this->Form->input('user_id');
        echo $this->Form->input('product_id');
        echo $this->Form->input('review');
        echo $this->Form->input('evaluation');
        echo $this->Form->input('great');
        //画像のアップロード
        echo $this->Form->input('image', array(
            'label' => false,
            'type' => 'file',''));//multiple
    ?>
    </fieldset>
<?php echo $this->Form->end(__('追加')); ?>
</div>
<div class="actions">
    <br>
    <ul>
        <li><?php echo $this->Html->link(__('記事一覧に戻る'), array('action' => 'index')); ?></li>
    </ul>
</div>
