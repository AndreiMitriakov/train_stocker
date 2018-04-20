<?php
require_once 'core/model.php';
require_once 'core/view.php';
require_once 'core/controller.php';
require_once 'core/route.php';
//add connection
$GLOBALS['pdo'] = new PDO('mysql:host=localhost; dbname=mstk', 'root', '');
session_start();
Route::start();