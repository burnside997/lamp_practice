<!DOCTYPE html>
<html lang="ja">
<head>
  <?php include VIEW_PATH . 'templates/head.php'; ?>
  <title>購入明細</title>
</head>
<body>
  <?php include VIEW_PATH . 'templates/header_logined.php'; ?>
  <h1>購入明細</h1>
  <div class="container">

    <?php include VIEW_PATH . 'templates/messages.php'; ?>

    <p>注文番号: <?php print $history['order_id']; ?></p>
    <p>購入日時: <?php print $history['created']; ?></p>
    <p>合計金額: <?php print $history['total_price']; ?></p>

    <table class="table table-bordered">
        <thead class="thead-light">
          <tr>
            <th>商品名</th>
            <th>商品価格</th>
            <th>購入数</th>
            <th>小計</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($history_details as $value){ ?>
          <tr>
            <th><?php print $value['name']; ?></th>
            <th><?php print $value['price']; ?></th>
            <th><?php print $value['amount']; ?></th>
            <th><?php print $value['price'] * $value['amount']; ?></th>
          </tr>
          <?php } ?>
       
        </tbody>
      </table>
            
  </div>
</body>
</html>