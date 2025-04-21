<?php
include_once('controllers/BaseController.php');

class ContactController extends BaseController
{
    public function __construct()
    {
        $this->folder = 'contact';
    }
    public function index(){
        $this->render('index');
    }
}