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

}
