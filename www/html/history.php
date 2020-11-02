<?php
require_once '../conf/const.php';
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'user.php';
require_once MODEL_PATH . 'item.php';
require_once MODEL_PATH . 'cart.php';
require_once MODEL_PATH . 'history.php';

header('X-FRAME-OPTIONS: DENY');
session_start();

$token = get_csrf_token();

if(is_logined() === false){
  redirect_to(LOGIN_URL);
}

$db = get_db_connect();

$user = get_login_user($db);

if(is_admin($user) === false){
  $user_history = get_user_history($db, $user['user_id']);
} else{
  $user_history = get_admin_user_history($db, $user['user_id']);
}

include_once VIEW_PATH . 'history_view.php';