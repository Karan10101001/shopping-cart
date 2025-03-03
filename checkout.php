<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // PHP form handling logic
    $name = htmlspecialchars($_POST['name']);
    $address = htmlspecialchars($_POST['address']);
    $payment = htmlspecialchars($_POST['payment']);
    
    // You can perform validation here if needed, e.g., check if fields are empty, email format, etc.
    
    // For this example, we'll just display the submitted data
    $confirmationMessage = "Thank you for your order, $name!<br>We have received your payment details and will ship your order to:<br>$address.<br>Your payment method is: $payment.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Form</title>
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            background-image: url("sc1.jpg");
            background-size: cover;
            background-position: bottom;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .checkout-container {
            
              
              backdrop-filter: blur(1px);
            padding: 30px;
            box-shadow: 0 10px 18px rgba(0, 0, 0, 0.71);
            border-radius: 8px;
            max-width: 500px;
            width: 100%;
            box-sizing: border-box;
        }

        h1 {
            text-align: center;
            color: #333;
            font-size: 2rem;
            margin-bottom: 20px;
        }

        .order-confirmation {
        
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            border: 1px solid #c1e6c1;
            color:rgb(10, 220, 17);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            font-size: 1rem;
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        .form-group input,
        .form-group textarea,
        .form-group select {
            width: 100%;
            padding: 10px;
            font-size: 1rem;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            transition: border-color 0.3s ease;
        }

        .form-group input:focus,
        .form-group textarea:focus,
        .form-group select:focus {
            border-color: #4caf50;
            outline: none;
        }

        .btn-submit {
            background-color: #4caf50;
            color: white;
            font-size: 1.2rem;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s ease;
        }

        .btn-submit:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="checkout-container">
        <h1>Checkout Form</h1>

        <!-- Order Confirmation (if form is submitted) -->
        <?php if (isset($confirmationMessage)): ?>
            <div class="order-confirmation">
                <h2>Order Placed</h2>
                <p><?php echo $confirmationMessage; ?></p>
            </div>
        <?php endif; ?>

        <!-- Form -->
        <form action="" method="POST">
            <!-- Name -->
            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" id="name" name="name" required>
            </div>

            <!-- Address -->
            <div class="form-group">
                <label for="address">Shipping Address</label>
                <textarea id="address" name="address" required></textarea>
            </div>

            <!-- Payment Details -->
            <div class="form-group">
                <label for="payment">Payment Method</label>
                <select id="payment" name="payment" required>
                    <option value="credit_card">Credit Card</option>
                    <option value="paypal">PayPal</option>
                    <option value="bank_transfer">Bank Transfer</option>
                </select>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn-submit">Place Order</button>
        </form>
    </div>
</body>
</html>
