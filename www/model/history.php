<?php

function get_history($db, $user_id, $order_id){
  $sql = "
    SELECT
      history.order_id,
      history.created,
      SUM(history_details.price * history_details.amount) as total_price
    FROM
      history
    INNER JOIN
      history_details
    ON
      history.order_id = history_details.order_id
    WHERE
      history.user_id = ?
    AND
      history.order_id = ?
    GROUP BY
      history_details.order_id 
  ";
  return fetch_query($db, $sql, array($user_id, $order_id));
}

function get_user_history($db, $user_id){
  $sql = "
    SELECT
      history.order_id,
      history.user_id,
      history.created,
      SUM(history_details.price * history_details.amount) as total_price
    FROM
      history
    INNER JOIN
      history_details
    ON
      history.order_id = history_details.order_id
    WHERE
      user_id = ?
    GROUP BY
      history_details.order_id 
    ORDER BY
      created DESC
  ";
  return fetch_all_query($db, $sql, array($user_id));
}

function get_admin_user_history($db){
  $sql = "
    SELECT
      history.order_id,
      history.user_id,
      history.created,
      SUM(history_details.price * history_details.amount) as total_price
    FROM
      history
    INNER JOIN
      history_details
    ON
      history.order_id = history_details.order_id
    GROUP BY
      history_details.order_id 
    ORDER BY
      history.created DESC
  ";
  return fetch_all_query($db, $sql);
}

function get_history_details($db, $order_id){
  $sql = "
    SELECT
    history_details.order_id,
    history_details.item_id,
    history_details.amount,
    items.name,
    items.price
    FROM
      history_details
    INNER JOIN
      items
    ON
      history_details.item_id=items.item_id
    WHERE
      order_id = ?
  ";
  return fetch_all_query($db, $sql, array($order_id));
}