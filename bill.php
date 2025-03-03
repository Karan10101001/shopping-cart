<?php
session_start();

// Sample shopping cart data (this would come from the session or database in a real scenario)
$cart_items = [
    ['name' => 'Item 1', 'price' => 3000, 'quantity' => 1],
    ['name' => 'Item 2', 'price' => 2500, 'quantity' => 1],
    ['name' => 'Item 3', 'price' => 3500, 'quantity' => 1]
];

// Calculate total
$total = 0;
foreach ($cart_items as $item) {
    $total += $item['price'] * $item['quantity'];
}

// Tax rate (for example, 10%)
$tax_rate = 0.10;
$tax = $total * $tax_rate;

// Final amount
$final_total = $total + $tax;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart Bill</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url("sc1.jpg");
            background-size: cover;
            background-position: bottom;
            margin: 0;
            padding: 0;
        }

        .bill-container {
             /* Semi-transparent white background */
            backdrop-filter: blur(2px);
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            height: 82vh;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.8);
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        .cart-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            margin-top: 80px;
        }

        .cart-table th, .cart-table td {
            padding: 12px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        .cart-table th {
            color: #333;
        }

        .total {
            margin-top: 20px;
            font-size: 18px;
            text-align: right;
        }

        .total p {
            margin: 5px 0;
        }

        .total h3 {
            margin-top: 15px;
            font-size: 22px;
            font-weight: bold;
            color:rgb(4, 11, 4);
        }

        .checkout-btn {
            display: inline-block;
            margin-top: 30px;
            padding: 10px 20px;
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            text-decoration: none;
            text-align: center;
        }

        .checkout-btn:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<?php if (empty($cart_items)): ?>
    <div class="bill-container">
        <h1>Your cart is empty!</h1>
    </div>
<?php else: ?>
    <div class="bill-container">
        <h1>Your Shopping Bill</h1>
        <table class="cart-table">
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cart_items as $item): ?>
                    <tr>
                        <td><?php echo $item['name']; ?></td>
                        <td><?php echo number_format($item['price'], 2); ?></td>
                        <td><?php echo $item['quantity']; ?></td>
                        <td><?php echo number_format($item['price'] * $item['quantity'], 2); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="total">
            <p>Subtotal: <?php echo number_format($total, 2); ?></p>
            <p>Tax (10%): <?php echo number_format($tax, 2); ?></p>
            <h3>Total Amount: <?php echo number_format($final_total, 2); ?></h3>
        </div>

        <a href="checkout.php" class="checkout-btn">Checkout</a>
    </div>
<?php endif; ?>

</body>
</html>
