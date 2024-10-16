<?php

class Home extends Controller
{

        public function index($a='',$b='',$c=''): void
        {
            $this->view('home');
        }

        public function testConnect()
        {
            $this->view('DBView');
        }

        public function homeFeatures()
        {
            $this->view('homeFeatures');
        }
}