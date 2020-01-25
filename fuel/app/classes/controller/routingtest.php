<?php

class Controller_RoutingTest extends Controller
{
    public function router($resource, $arguments)
    {
        // ルート情報を表示
        Debug::dump($this->request->route);

        // 名前付きのパラメータの一覧を取得
        Debug::dump($this->params());
    }
}