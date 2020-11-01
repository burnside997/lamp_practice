<?php
require_once '../conf/const.php';
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'user.php';
require_once MODEL_PATH . 'item.php';
require_once MODEL_PATH . 'cart.php';
require_once MODEL_PATH . 'history.php';

header('X-FRAME-OPTIONS: DENY');
session_start();

if (is_valid_csrf_token(get_post('csrf_token')) === false){
  redirect_to(LOGOUT_URL);
}

if(is_logined() === false){
  redirect_to(LOGIN_URL);
}

$db = get_db_connect();

$user = get_login_user($db);

$user_id = get_post('user_id');
$order_id = get_post('order_id');

$history = get_history($db, $user_id, $order_id);

$history_details = get_history_details($db, $order_id);


include_once VIEW_PATH . 'history_detail_view.php';