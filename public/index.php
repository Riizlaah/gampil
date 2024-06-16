<?php
$project_path = dirname(__DIR__);
require_once $project_path.'/vendor/autoload.php';
require_once $project_path.'/app/functions.php';

$config = require_once dirname(__DIR__).'/app/config.php';
if(env('STATUS') == 'mtc') {require_once $config['root_path'].'storage/gampil/maintenance.php';http_response_code(503);exit;}
require_once dirname(__DIR__).'/app/init.php';
