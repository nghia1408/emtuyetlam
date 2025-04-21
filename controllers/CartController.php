<?php
include_once('controllers/BaseController.php');
class CartController extends BaseController{
    public function __construct()
    {
        $this->folder = 'cart';
    }
    public function index(){
        $this->render('index');
    }
}