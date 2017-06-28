<?php

class TestBehavior extends ModelBehavior {

    //
    public function test(Model $model) {
        return 5;
    }

    //
    public function setup(Model $Model, $config = array()) {
          $this->settings = $config;
    }

    public function Data(Model $model) {
        $count = $model->find('count');
        $n = mt_rand(0,$count - 1);
        $data = $model->find('first', array('offset'=>$n));
        return $data;
    }

    public function top(Model $model) {
        // $count = $model->find('conditions' => );
        //$data = $model->find('first', array('offset'=>$n));
        // $data = $model->find('list', array('fields' => array('"'.'User.id'.'"')));
        // $data = $model->find('all');


        $article_data = $model->Article->find('all');
        //記事の総数を取得する
        $article_count = count($article_data);

        //いいね数を比較する
        foreach($article_data as $key => $data) {
            $article_comparison[] = $data['Article']['great'];
        }

        $ans = max($article_comparison);

        $data = $model->Article->find('all', array(
            'conditions' => array('Article.great' => $ans)
        ));

        return $data;
    }

    public function te(Model $model) {
        //$data = $model->Article->find('all');
        //$ans = count($data);

        $article_data = $model->Article->find('all');
        //記事の総数を取得する
        $article_count = count($article_data);

        //いいね数を比較する
        foreach($article_data as $key => $data) {
            $article_comparison[] = $data['Article']['great'];
        }

        $ans = max($article_comparison);

        return $ans;
    }


}
