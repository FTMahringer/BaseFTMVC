<?php

class _404 extends Controller
{
    public function index($a='',$b=''): void
    {
        $this->view('404');
    }
}