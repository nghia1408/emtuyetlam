<?php
include_once('controllers/BaseController.php');
include_once('models/Student.php');
include_once('models/Product.php');
include_once('models/User.php');
class DashboardController extends BaseController
{
    public function __construct()
    {
        $this->folder = 'dashboard';
    }

    public function index()
    {
        $this->render('index', [], 'admin');
    }
}