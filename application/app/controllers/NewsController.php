<?php

class NewsController extends BaseController {

public function __construct()
    {
        $this->beforeFilter('auth', array('except' => 'showWelcome'));

        /*$this->beforeFilter('csrf', array('on' => 'post'));

        $this->afterFilter('log', array('only' =>
                            array('fooAction', 'barAction')));*/
    }

	public function showWelcome()
	{
		return View::make('hello');
	}
	
	public function afterLogin()
	{
		return 'Hi User';
	}

}
