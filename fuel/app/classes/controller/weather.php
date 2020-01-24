<?php
/**
 * サンプルRestコントローラ
 */

class Controller_Weather extends Controller_Rest
{
    public function get_today()
    {
        $location = Input::get('loc');
        $weather = 'fine';

        $this->response(array(
            'location' => $location,
            'weather' => $weather,
        ));
    }
}


