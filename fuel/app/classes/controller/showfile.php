<?php

class Controller_Showfile extends Controller
{
    public function action_index()
    {
        // ファイル名を指定
        $file = DOCROOT . 'show_file.php';

        // ファイルの中身を確認
        $content = file_get_contents($file);

        // Viewオブジェクトを生成
        $view = View::forge('showfile');

        // ビューにtitleをセット
        $view->set('title', 'ファイル表示プログラム');
        // ビューにcontentをセット
        $view->set('content', $content);

        // Viewオブジェクトを返す
        return $view;
    }
}