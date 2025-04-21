<?php
include_once('controllers/BaseController.php');
class OrderController extends BaseController{
    public function __construct()
    {
        $this->folder = 'order';
    }
    public function index(){
        $this->render('index');
    }
}