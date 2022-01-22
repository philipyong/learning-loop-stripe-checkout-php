<?php
$product_data = json_decode(file_get_contents("product.json"), true);
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Buy cool new product</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://polyfill.io/v3/polyfill.min.js?version=3.52.1&features=fetch"></script>
    <script src="https://js.stripe.com/v3/"></script>
  </head>
  <body>
    <section>
      <div class="product">
        <img src="<?php echo $product_data['img']; ?>" alt="The cover of <?php echo $product_data['name']; ?>" />
        <div class="description">
          <h3><?php echo $product_data['name']; ?></h3>
          <h5><?php echo $product_data['price']; ?></h5>
        </div>
      </div>
      <form action="/create-checkout-session.php" method="POST">
        <button type="submit" id="checkout-button">Checkout</button>
      </form>
    </section>
  </body>
</html>