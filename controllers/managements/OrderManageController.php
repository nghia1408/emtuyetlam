<?php

include_once('controllers/BaseController.php');
include_once('models/User.php');
include_once('utils/account.php');
include_once('utils/redirect.php');

class OrderManageController extends BaseController
{
    public function __construct()
    {
        $this->folder = 'managements/order';
    }


    public function index(): void
    {
        $this->render('index',[],'admin');
    }

}

