<?php
include_once('controllers/BaseController.php');
class PaymentController extends BaseController
{
    public function __construct()
    {
        $this->folder = 'payment';
    }

    public function thanhtoan()
    {
        $this->render('thanhtoan');
    }
}