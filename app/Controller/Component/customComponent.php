<?php

class CustomComponent extends Component {

    public function top() {

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


}
