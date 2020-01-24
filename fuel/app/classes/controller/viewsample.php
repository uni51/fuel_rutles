<?php

class Controller_ViewSample extends Controller
{
    public function action_index()
    {
        // ビューに渡す変数
        $data = array();

        $data['title'] = 'ビューのサンプル';
        $data['username'] = 'Ritsu';

        // Viewオブジェクトを生成して返す
        return View::forge('viewsample', $data);
    }


}