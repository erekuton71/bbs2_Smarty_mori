<?php
require_once('Smarty.class.php');
require_once('Smarty_connect.php');
$smarty->display('index.tpl');
require_once 'DbManager.php';
require_once 'Encode.php';
require_once 'bbs2Validator.php';
