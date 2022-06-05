<?php

require 'core/bootstrap.php';

session_start();
$uri = Request::uri();

$router = Router::load('routes.php');

$router->direct($uri);
