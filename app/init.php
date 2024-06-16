<?php
session_start();
$root_project = dirname(__DIR__).'/';
require_once $root_project."app/functions.php";
handle_err_init();
use Gampil\App\Core;
global $config;
$core = new Core($config);
