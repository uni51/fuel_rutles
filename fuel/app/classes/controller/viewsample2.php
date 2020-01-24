<?php

class Controller_ViewSample2 extends Controller
{
    public function action_index()
    {
        // Viewオブジェクトを生成する
        $view = View::forge('viewsample');

        // ビューに変数をセットする
        $view->set('title', 'ビューのサンプル2');
        $view->set('username', 'Mugi');

        // Viewオブジェクトを返す
        return $view;
    }


}