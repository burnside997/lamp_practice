<?php
require_once '../conf/const.php';
require_once MODEL_PATH . 'functions.php';

header('X-FRAME-OPTIONS: DENY');
session_start();

$token = get_csrf_token();

if(is_logined() === true){
  redirect_to(HOME_URL);
}

include_once VIEW_PATH . 'signup_view.php';



