<!DOCTYPE html>
<html lang="en">

<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Organic Print Studio - <?= $this->fetch('title') ?></title>
    <!-- Favicon-->
    <?= $this->Html->meta('icon') ?>
    <?= $this->fetch('meta') ?>
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <?= $this->Html->css('frontend.css'); ?>
    <?= $this->fetch('css') ?>
    <!-- Add a reference to Poppins font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Imprima&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>

<body>
<!-- ============================================ -->
<!--                 Navigation                   -->
<!-- ============================================ -->

<header id="cs-navigation">
    <div class="cs-container">
        <!--Nav Logo-->
        <a href="/" class="cs-logo" aria-label="back to home">
            <?= $this->Html->image('OrganicPrintStudioLogo.jpg',['style' => 'width: 150px; height: 100px; margin-left: 45px;'])?>
        </a>
        <!--Navigation List-->
        <nav class="cs-nav" role="navigation">
            <!--Mobile Nav Toggle-->
            <button class="cs-toggle" aria-label="mobile menu toggle">
                <div class="cs-box" aria-hidden="true">
                    <span class="cs-line cs-line1"></span>
                    <span class="cs-line cs-line2"></span>
                    <span class="cs-line cs-line3"></span>
                </div>
            </button>
            <div class="cs-ul-wrapper">
                <ul id="cs-expanded" class="cs-ul" aria-expanded="false">
                    <li class="cs-li">
                        <a href="/" class="cs-li-link cs-active">
                            Home
                        </a>
                    </li>
                    <li class="cs-li">
                        <a href="/about" class="cs-li-link">
                            About
                        </a>
                    </li>
                    <li class="cs-li cs-dropdown" tabindex="0">
                            <span class="cs-li-link">
                                Services
                                <img class="cs-drop-icon" src="https://csimg.nyc3.cdn.digitaloceanspaces.com/Icons/down-gold.svg" alt="dropdown icon" width="15" height="15" aria-hidden="true">
                            </span>
                        <ul class="cs-drop-ul">
                            <li class="cs-drop-li">
                                <a href="/services/registration" class="cs-li-link cs-drop-link">Registration</a>
                            </li>
                            <li class="cs-drop-li">
                                <a href="/services/classes" class="cs-li-link cs-drop-link">Our Classes</a>
                            </li>
                        </ul>
                    </li>
                    <li class="cs-li">
                        <a href="/blog" class="cs-li-link">
                            Blog
                        </a>
                    </li>
                    <li class="cs-li">
                        <a href="/contact" class="cs-li-link">
                            Contact
                        </a>
                    </li>
                    <li class="cs-li">
                        <a href="/login" class="cs-li-link">
                            Login
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="cs-contact-group">
            <a href="tel:+61457800078" class="cs-phone">
                <img class="cs-phone-icon" src="https://csimg.nyc3.cdn.digitaloceanspaces.com/Icons/phone-1a.svg" alt="phone icon" width="24" height="24" aria-hidden="true" decoding="async">
                +61 457 800 078
            </a>
            <div class="cs-social">
                <a href="https://www.facebook.com/OrganicPrintStudio" class="cs-social-link" aria-label="Facebook">
                    <img class="cs-social-icon" src="https://csimg.nyc3.cdn.digitaloceanspaces.com/Images/Icons/facebook-1a.svg" alt="Facebook icon" width="12" height="12" aria-hidden="true" decoding="async">
                </a>
                <a href="https://www.instagram.com/organicprintstudio/" class="cs-social-link" aria-label="Instagram">
                    <img class="cs-social-icon" src="https://csimg.nyc3.cdn.digitaloceanspaces.com/Images/Icons/instagram1a.svg" alt="Instagram icon" width="12" height="12" aria-hidden="true" decoding="async">
                </a>
            </div>
        </div>
    </div>
</header>

<!-- Page Content-->
<?= $this->fetch('content') ?>

<!-- ============================================ -->
<!--                   Footer                     -->
<!-- ============================================ -->

<footer id="cs-footer-274">
    <div class="cs-container">
        <!-- Logo Group -->
        <div class="cs-logo-group">
            <a aria-label="go back to home" class="cs-logo" href="">
                <!-- Remove the light class if you don't need the dark logo -->
                <?= $this->Html->image('OrganicPrintStudioLogo.jpg',['style' => 'width: 140px; height: 65px; margin-left: 0px;'])?>
            </a>
            <p>Copyright© 2024 Organic Print Studio<br> All Right Reserved.</p>
            <div class="cs-social">
                <a class="cs-social-link" aria-label="visit facebook profile" href="https://www.facebook.com/OrganicPrintStudio">
                    <img class="cs-social-img" aria-hidden="true" loading="lazy" decoding="async" src="https://csimg.nyc3.digitaloceanspaces.com/Social/Facebook.svg" alt="facebook" width="6" height="11">
                </a>
                <a class="cs-social-link" aria-label="visit instagram profile" href="https://www.instagram.com/organicprintstudio/">
                    <img class="cs-social-img" aria-hidden="true" loading="lazy" decoding="async" src="https://csimg.nyc3.digitaloceanspaces.com/Social/instagram.svg" alt="instagram" width="11" height="11">
                </a>
            </div>
        </div>
        <!-- Links -->
        <ul class="cs-nav">
            <li class="cs-nav-li">
                <span class="cs-header">Contact</span>
            </li>
            <li class="cs-nav-li">
                <a class="cs-nav-link" href="tel:123-456 7890">(123) 456 7890</a>
            </li>
            <li class="cs-nav-li">
                <a class="cs-nav-link" href="mailto:info@codestitch.com">info@codestitch.com</a>
            </li>
        </ul>
        <ul class="cs-nav">
            <li class="cs-nav-li">
                <span class="cs-header">Address</span>
            </li>
            <li class="cs-nav-li">
                <a class="cs-nav-link" href="">123 Avenue Street<br> Oak Harbor, WA 98101</a>
            </li>
        </ul>
        <!-- Contact Info -->
        <ul class="cs-nav">
            <li class="cs-nav-li">
                <span class="cs-header">Opening Hours</span>
            </li>
            <li class="cs-nav-li">
                Tuesday, Thursday, Friday: 9am-6pm
            </li>
            <li class="cs-nav-li">
                ​(closed for lunch 12pm-2pm)
            </li>
        </ul>
    </div>
</footer>


<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<?= $this->Html->script('frontend.js'); ?>
<?= $this->fetch('script') ?>
</body>

</html>
