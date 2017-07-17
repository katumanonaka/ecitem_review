<?php
App::uses('Component', 'Controller');

class CustomComponent extends Component {

    public function test() {
        return 5;
    }

    public function get_article_count($table_name,$field_name,$this_list_count) {

        //検索用に文字列を繋げる
        $table_field = $table_name . "." . $field_name;
        //記事データを取得できるようにする
        $article_data = ClassRegistry::init('Article');

        //任意のテーブルからデータを取得する
        $article_list = $article_data->find('all', array('fields' => array($table_field)));

        //取得したいフィードごとの記事の数を取得する
        for($i = 0; $i < count($article_list); $i++) {
            $field_id_list[$i] = $article_list[$i][$table_name][$field_name];
        }

        //記事数を代入する
        $article_count = count($field_id_list);

        //$field_countを初期化する
        for($i = 1; $i <= $this_list_count; $i++) {
            $field_count_id_count[$i] = 0;
        }

        //カテゴリーidごとの記事の数を配列に代入する
        for($i = 0; $i < $article_count; $i++) {
            for($j = 1; $j <= $this_list_count; $j++) {
                if($field_id_list[$i] == $j) {
                    $field_count_id_count[$j]++;
                    continue;
                }
            }
        }

        return $field_count_id_count;
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
