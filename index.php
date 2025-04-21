<?php
require_once('connection.php');
require_once('utils/redirect.php');
require_once('utils/account.php');

session_start();

if (isset($_GET['controller'])) {
  $controller = $_GET['controller'];
  if (isset($_GET['action'])) {
    $action = $_GET['action'];
  } else {
    $action = 'index';
  }
} else {
  $controller = 'home';
  $action = 'index';
}
require_once('routes.php');
