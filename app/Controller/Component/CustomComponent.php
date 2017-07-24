<?php
App::uses('Component', 'Controller');

class CustomComponent extends Component {

    public function test() {
        return 5;
    }

    public function get_article_count($table_name,$field_name,$this_list_count) {

        //記事データを取得できるようにする
        $article_data = ClassRegistry::init('Article');

        //検索用に文字列を繋げる
        $table_field = $table_name . "." . $field_name;

        //記事データと記事データに付随する記事数を取得したいフィールド情報を取得する
        $article_list = $article_data->find('all', array('fields' => array($table_field)));

        //記事ごとの目的のフィードの値を取得する
        for($i = 0; $i < count($article_list); $i++) {
            $field_id_list[$i] = $article_list[$i][$table_name][$field_name];
        }

        //記事数を代入する
        $article_count = count($field_id_list);

        //記事数を取得したいフィールドの数分配列を用意する
        for($i = 1; $i <= $this_list_count; $i++) {
            $field_each_article_count[$i] = 0;
        }

        //記事数を取得したいフィールドごとの記事の数を配列に代入する
        for($i = 0; $i < $article_count; $i++) {
            for($j = 1; $j <= $this_list_count; $j++) {

                if($field_id_list[$i] == $j) {
                    //フィールドごとの検索をして記事データがあったら
                    //記事の数を加算していく
                    $field_each_article_count[$j]++;
                    continue;
                }
            }
        }

        return $field_each_article_count;
    }

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
