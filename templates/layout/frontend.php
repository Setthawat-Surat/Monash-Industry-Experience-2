<?php
/**
 * Auth Controller
 *
 * @property \Authentication\Controller\Component\AuthenticationComponent $Authentication
 */
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta name="csrf-token" content="<?= $this->request->getAttribute('csrfToken') ?>">
    <title><?= $this->ContentBlock->text('website-title') ?> - <?= $this->fetch('title') ?></title>
    <!-- Favicon-->
    <?= $this->Html->meta('icon') ?>


    <?= $this->fetch('meta') ?>
    <!-- Bootstrap icons-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


    <!-- Core theme CSS (includes Bootstrap)-->
    <?= $this->Html->css('frontend.css'); ?>
    <?= $this->fetch('css') ?>
    <!-- Add a reference to Poppins font-->
    <!-- Jquery  -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.19.3/jquery.validate.min.js"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Imprima&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<form id="hiddenForm" action="/Stripe" method="POST" style="display: none;">
    <input type="hidden" name="cart" id="cartInput">
    <!-- Include CSRF token if needed -->
    <input type="hidden" name="_csrfToken" value="<?= $this->request->getAttribute('csrfToken') ?>">
</form>

<body>

<!-- ============================================ -->
<!--                    Logo                     -->
<!-- ============================================ -->

<section id="website-logo">
    <img src="<?= $this->Url->image('OrganicPrintStudioLogo.png')?>" alt="Website Logo">
</section>

<!-- ============================================ -->
<!--                Navigation Bar               -->
<!-- ============================================ -->
<section id="navigation-bar">
    <nav id="main-navbar">
        <?php
        if ($this->Identity->isLoggedIn()) {
            $user_role = $this->Identity->get('role');
            if ($user_role == 'Admin') {
                echo '<button class="nav-button"><a href="' . $this->Url->build(['controller' => 'Pages', 'action' => 'display', 'admin_dashboard']) . '" class="nav-link">Dashboard</a></button>';
            }
            elseif ($user_role == 'School') {
                echo '<button class="nav-button"><a href="' . $this->Url->build(['controller' => 'Pages', 'action' => 'display', 'school_dashboard']) . '" class="nav-link">Dashboard</a></button>';
            }
        } else {
            echo '<button class="nav-button"><a href="' . $this->Url->build(['controller' => 'Pages', 'action' => 'display', 'home']) . '" class="nav-link">Home</a></button>';
        }
        ?>
        <button class="nav-button"><a href="<?=$this->Url->build(['controller' => 'Pages', 'action' => 'display', 'About_us'])?>" class="nav-link">About</a></button>
            <button class="nav-button"><a href="#" class="nav-link">Services</a></button>
        <button class="nav-button"><a href="<?=$this->Url->build(['controller' => 'Pages', 'action' => 'display', 'Faqs'])?>" class="nav-link">FAQ's</a></button>
        <button class="nav-button"><a href="<?=$this->Url->build(['controller' => 'Pages', 'action' => 'display', 'the_process'])?>" class="nav-link">The process</a></button>
        <button class="nav-button"><a href="<?= $this->Url->build(['controller' => 'Auth', 'action' => 'register']) ?>" class="nav-link">Register</a></button>
        <?php
        if (!$this->Identity->isLoggedIn()) {
            echo '<button class="nav-button"><a href="' . $this->Url->build(['controller' => 'Auth', 'action' => 'login']) . '" class="nav-link">Login</a></button>';
        }
        else
            echo '<button class="nav-button"><a href="' . $this->Url->build(['controller' => 'Auth', 'action' => 'logout']) . '" class="nav-link">Logout</a></button>';
        ?>

        <div id="shopping_cart_section">
            <div class="icons quantity">
                <i class="fas fa-shopping-cart"></i>
                <span>0</span>
            </div>
        </div>


    </nav>


    <!-- Mask layer -->
    <div class="mask"></div>

    <!-- Shopping Cart Tab -->
    <div class="cartTab">
        <h1>Shopping Cart</h1>
        <div class="listCart">

        </div>
        <div class="totalPriceContainer">
            <span class="subtotalLabel">Subtotal:</span>
            <span class="subtotalPrice" id="totalPrice">0.00</span>
        </div>

        <div class="cartbtn">
            <button class="close">CLOSE</button>
            <a href="/Stripe" id="checkoutLink" class="checkOut checkout-link"><button class="checkbtn">Check Out</button></a>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelector('.checkOut').addEventListener('click', function (event) {
                event.preventDefault(); // Prevent the default action of the anchor tag

                // Function to send data and redirect
                function sendDataToServer() {
                    // Fetch data from local storage and parse it
                    let cart = JSON.parse(localStorage.getItem('cart'));

                    // Remove the 'image' property from each item
                    cart = cart.map(item => {
                        const { image, ...rest } = item;
                        return rest;
                    });

                    // Convert the modified data back to a string
                    const cartData = JSON.stringify(cart);

                    // Set data in hidden input
                    document.getElementById('cartInput').value = cartData;
                    // Submit the form
                    document.getElementById('hiddenForm').submit();

                    // Redirect to /Stripe after a short delay
                    setTimeout(function () {
                        window.location.href = '/Stripe';
                    }, 4000); // Adjust the delay if needed
                }

                // Call this function to send the data and redirect
                sendDataToServer();
            });
        });
    </script>






</section>


<!-- Page Content-->
<?= $this->fetch('content') ?>

<!-- ============================================ -->
<!--                   Footer                     -->
<!-- ============================================ -->

<footer id="cs-footer-274">
    <div class="cs-container">
        <!-- Logo Group -->
        <div class="cs-logo-group">
            <div class="cs-social">
                <a class="cs-social-link" aria-label="visit facebook profile" href="https://www.facebook.com/OrganicPrintStudio" target="_blank">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64h98.2V334.2H109.4V256h52.8V222.3c0-87.1 39.4-127.5 125-127.5c16.2 0 44.2 3.2 55.7 6.4V172c-6-.6-16.5-1-29.6-1c-42 0-58.2 15.9-58.2 57.2V256h83.6l-14.4 78.2H255V480H384c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64z"/></svg>
                </a>
                <a class="cs-social-link" aria-label="visit instagram profile" href="https://www.instagram.com/organicprintstudio/" target="_blank">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"/></svg>
                </a>
            </div>
            <p><?= $this->ContentBlock->text('copyright'); ?><br> All Rights Reserved.<br><br>
            <a href="<?=$this->Url->build(['controller' => 'Pages', 'action' => 'display', 'terms_and_conditions'])?>" class="cs-nav-link">Terms and Conditions</a><br>
            <a href="<?=$this->Url->build(['controller' => 'Pages', 'action' => 'display', 'privacy_policy'])?>" class="cs-nav-link">Privacy Policy</a>
            </p>
        </div>
        <!-- Contact Info -->
        <ul class="cs-nav">
            <li class="cs-nav-li">
                <span class="cs-header">Call us:</span>
            </li>
            <li class="cs-nav-li">
                <a class="cs-nav-link" href="tel:123-456-7890"><?= $this->ContentBlock->text('contact-number'); ?></a>
            </li>

            <li class="cs-nav-li spacer"></li>

            <li class="cs-nav-li">
                <span class="cs-header">Email us:</span>
            </li>
            <li class="cs-nav-li">
                <a class="cs-nav-link" href="mailto:susy@organicprintstudio.com.au"><?= $this->ContentBlock->text('contact-email'); ?></a>
            </li>
        </ul>

    </div>
    <!--SVG Zig Zags-->
    <svg class="cs-background cs-background-top" xmlns="http://www.w3.org/2000/svg" width="1920" height="39"
         viewBox="0 0 1920 39" fill="none">
        <path
            d="M1920 0H0V15.8216L4.95532 13.3966L18.1455 15.2801L28.6394 22.5944L42.0481 24.423L54.0723 27.0599L66.8979 21.3623L78.7034 23.6147L90.9463 27.8134L102.533 21.5742L114.776 24.5329L126.654 25.2314L138.605 24.7997L148.881 29.1554L160.759 28.6217L171.18 33.354L183.569 27.1698L194.573 29.9637L207.69 30.0186L219.277 25.7179L228.531 18.9373L240.556 16.0335L253.017 13.3966L265.989 13.0748L279.033 14.5267L292.296 16.1983L305.413 12.5333L317.437 17.0537L331.065 15.0682L342.943 19.157L354.749 23.0261L366.773 26.1496L378.943 29.2652L391.331 31.6903L405.469 28.0802L417.274 32.067L428.57 35.1277L440.375 35.2925L451.598 38.4631L463.622 37.7097L475.208 38.8947L487.087 35.7241L498.455 36.7993L510.115 38.1413L522.285 34.2173L536.058 32.012L547.864 26.3065L561.928 29.2652L574.171 20.7658L587.434 22.0058L599.604 24.0463L611.191 21.5192L623.215 24.6428L634.947 25.2863L646.607 23.9443L658.413 20.499L670.437 17.7051L681.805 24.423L694.048 20.7658L706.072 20.1223L728.226 29.43L741.197 24.6428H753.221L761.31 35.6692L773.771 34.1624L785.65 29.8067L796.29 31.2586L809.261 34.594L818.37 26.7382L828.864 22.1628L842.418 22.9711L852.329 17.0537L866.248 19.314L875.722 11.7877L887.673 9.95128L900.28 11.2462L911.94 8.2875L924.474 10.328L937.373 8.17763L949.98 7.15739L961.931 10.3123L966.887 7.8951L980.077 15.1545L990.57 22.4689L1003.98 24.2974L1016 26.9344L1028.83 21.2367L1040.63 23.4891L1052.88 27.6878L1064.46 21.4486L1076.71 24.4073L1088.59 25.1058L1100.54 24.6741L1110.81 29.0298L1122.69 28.4961L1133.11 33.2285L1145.5 27.0442L1156.5 29.8381L1169.62 29.8931L1181.21 25.5924L1190.46 18.8117L1202.49 15.9079L1214.95 13.271L1227.92 12.9492L1240.96 14.4011L1254.23 16.0727L1267.34 12.4077L1279.37 16.9282L1293 14.9426L1304.87 19.0236L1316.68 22.9005L1328.7 26.024L1340.87 29.1397L1353.26 31.5647L1367.4 27.9546L1379.21 31.9414L1390.5 35.0021L1402.31 35.1669L1413.53 38.3375L1425.55 37.5841L1437.14 38.7692L1449.02 35.5986L1460.39 36.6738L1472.05 38.0158L1484.22 34.0918L1497.99 31.8865L1509.79 26.181L1523.86 29.1397L1536.1 20.6403L1549.37 21.8803L1561.54 23.9207L1573.12 21.3937L1585.15 24.5172L1596.88 25.1607L1608.54 23.8187L1620.34 20.3734L1632.37 17.5717L1643.74 24.2974L1655.98 20.6403L1668 19.9967L1690.16 29.3045L1703.13 24.5172H1715.15L1723.24 35.5436L1735.7 34.0368L1747.58 29.6812L1758.22 31.1331L1771.19 34.4685L1780.3 26.6126L1790.79 22.0372L1804.35 22.8456L1814.26 16.9282L1828.18 19.1884L1837.65 11.6543L1849.6 9.82571L1862.21 11.1206L1873.87 8.16193L1886.41 10.2024L1899.3 8.05206L1911.91 7.03182L1920 7.78523V0Z"
            fill="var(--backgroundBG)" />
    </svg>
</footer>




<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<?= $this->Html->script('frontend.js'); ?>
<?= $this->fetch('script') ?>
</body>

</html>
