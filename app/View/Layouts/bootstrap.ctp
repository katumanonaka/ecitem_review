<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>
        <?php echo __('CakePHP: the rapid development php framework:'); ?>
        <?php echo $title_for_layout; ?>
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <?php echo $this->Html->css('bootstrap.min'); ?>
    <?php echo $this->Html->css('style'); ?>

    <style>
    body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
    }
    </style>
    <?php echo $this->Html->css('bootstrap-responsive.min'); ?>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <!--
    <link rel="shortcut icon" href="/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="/ico/apple-touch-icon-57-precomposed.png">
    -->
    <?php
    echo $this->fetch('meta');
    echo $this->fetch('css');
    //画面のトップへ戻るボタン
    echo $this->element('top');
    ?>
</head>

<body>

    <div class="navbar navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <!-- <a class="brand" href="#"><?php echo __('CakePHP'); ?></a>
                <div class="nav-collapse">
                    <ul class="nav">
                    スクロールに合わせて動く
                        <li class="active"><a href="#">Home</a></li>
                        <li><a href="#about">About</a></li>
                        <li><a href="#contact">Contact</a></li> -->
                    <!-- </ul> -->
                <!-- </div>/.nav-collapse  -->
            </div>
        </div>
    </div>

    <!-- タイトル -->
    <div class="container" id="header">
        <h1><?php echo $this->Html->link(__('EC商品レビュー'), array('controller' => 'articles', 'action' => 'index')); ?> </h1>

        <?php //debug($this->Auth->user()); ?>
        <?php //debug($this->Auth->user('id')); ?>
    </div>

    <!-- メイン -->
    <main class="main">

        <?php echo $this->Session->flash(); ?>
        <?php echo $this->fetch('content'); ?>
    </main>

        <!-- <div class="test">
            <p>てすと</p>
        </div> -->

    <!-- </div>  -->
    <!-- /container -->

    <footer class="footer">
        <div class="container">
            <p class="text-muted">© nonaka katuma</p>
        </div>
    </footer>

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
    <?php echo $this->Html->script('bootstrap.min'); ?>
    <?php echo $this->fetch('script'); ?>

</body>
</html>
