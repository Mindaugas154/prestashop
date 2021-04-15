<?php

class userTabController extends ModuleAdminController
{
    //meginimas sukurti nauja parent tab
    public function __construct()
    {
        $this->bootstrap = true;
        parent::__construct();
    }
        public function init()
    {
        parent::init();
    }
}