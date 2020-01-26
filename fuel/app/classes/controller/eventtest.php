<?php

class Controller_EventTest extends Controller
{
    public function action_index()
    {
        Event::register('shutdown', 'Test::event_tset', '引数1', '引数2');
    }
}