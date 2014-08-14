<?php

class ApiController extends BaseController {

    protected $layout = 'layouts.layout';

    public function getIndex()
    {
        $this->layout->content = View::make('api');
    }
}
