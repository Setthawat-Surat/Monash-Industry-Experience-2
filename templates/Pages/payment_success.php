<?php
// payment_success.php
$this->disableAutoLayout();

$redirectDelay = 5; // Number of seconds before redirecting
$homePageUrl = 'home'; // URL of the homepage

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Success</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: white;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .container h1 {
            color: #28a745;
            margin-bottom: 20px;
        }
        .container p {
            font-size: 18px;
            margin-bottom: 10px;
        }
    </style>
    <script>


        // clear the shopping cart in localStorage
        localStorage.removeItem('cart');

        let countdown = <?= $redirectDelay ?>;

        function updateTimer() {
            document.getElementById('timer').innerText = countdown;
            countdown--;
            if (countdown < 0) {
                window.location.href = '<?= $homePageUrl ?>';
            }
        }

        setInterval(updateTimer, 1000); // Update the timer every second
    </script>
</head>
<body>

<div class="container">
    <h1>&#10003; Thank You for Your Payment!</h1>
    <p>Your payment has been successful.</p>
    <p>You will be redirected to the homepage in <span id="timer"><?= $redirectDelay ?></span> seconds.</p>
</div>

</body>
</html>
