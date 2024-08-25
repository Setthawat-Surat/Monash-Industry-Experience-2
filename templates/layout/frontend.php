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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Imprima&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
<!-- ============================================ -->
<!--                 Navigation                   -->
<!-- ============================================ -->

<header id="cs-navigation">
    <div class="cs-container">
        <!--Nav Logo-->
        <a href="/" class="cs-logo" aria-label="back to home">
            <?= $this->ContentBlock->image('logo',['style' => 'width: 150px; height: 100px; margin-left: 45px;']); ?>
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
                        <?php
                        if ($this->Identity->isLoggedIn()) {
                            $user_role = $this->Identity->get('role');
                            if($user_role == 'Admin'){
                                echo $this->Html->link(
                                    'Dashboard',
                                    ['controller' => 'Pages', 'action' => 'display','Admin_dashboard'],
                                    ['class' => 'cs-li-link']);
                            }
                            elseif($user_role == 'School'){
                                echo $this->Html->link(
                                    'Dashboard',
                                    ['controller' => 'Pages', 'action' => 'display','School_dashboard'],
                                    ['class' => 'cs-li-link']);
                            }

                        }
                        else
                            echo $this->Html->link(
                                'Home',
                                ['controller' => 'Pages', 'action' => 'display','home'],
                                ['class' => 'cs-li-link']);
                        ?>
                    </li>
                    <li class="cs-li">
                        <a href="/pages/about_us" class="cs-li-link">
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
                                <a href="<?= $this->Url->build(['controller'=>'Auth', 'action' => 'register']) ?>" class="cs-li-link cs-drop-link">Fundraising</a>
                            </li>
                            <li class="cs-drop-li">
                                <a href="https://www.organicprintstudio.com.au/" class="cs-li-link cs-drop-link" target="_blank" rel="noopener noreferrer">
                                    Custom tea towels and tote bags
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="cs-li">
                        <a href="<?= $this->Url->build(['controller'=>'Pages', 'action' => 'display','Faqs']) ?>" class="cs-li-link">
                            FAQs
                        </a>
                    </li>
                    <li class="cs-li">
                        <a href="<?= $this->Url->build(['controller' => 'Auth', 'action' => 'register']) ?>" class="cs-li-link">
                            Register
                        </a>
                    </li>



                    <li class="cs-li">
                        <?php
                        if (!$this->Identity->isLoggedIn()) {
                            echo $this->Html->link(
                                'Log in',
                                ['controller' => 'Auth', 'action' => 'login'],
                                ['class' => 'cs-li-link']);
                        }
                        else
                            echo $this->Html->link(
                                'Log out',
                                ['controller' => 'Auth', 'action' => 'logout'],
                                ['class' => 'cs-li-link']);
                        ?>

                    </li>
                </ul>
            </div>
        </nav>
        <div class="cs-contact-group">
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
    <div class="cs-background">
        <picture>
            <source media="(max-width: 600px)" srcset="<?= $this->Url->image('Footer_Background.png') ?>">
            <source media="(min-width: 601px)" srcset="<?= $this->Url->image('Footer_Background.png') ?>">
            <img loading="lazy" decoding="async" src="<?= $this->Url->image('Footer_Background.png') ?>" alt="Footer Background" width="1920" height="1200" aria-hidden="true">
        </picture>
        <div class="cs-overlay"></div>
    </div><br>
    <div class="cs-container">
        <!-- Logo Group -->
        <div class="cs-logo-group">
            <a aria-label="go back to home" class="cs-logo" href="">
                <!-- Remove the light class if you don't need the dark logo -->
                <?= $this->ContentBlock->image('logo',['style' => 'width: 140px; height: 65px; margin-left: 45px;']); ?>
            </a>
            <p><?= $this->ContentBlock->text('copyright'); ?><br> All Rights Reserved.</p>
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
                <a class="cs-nav-link" href="tel:123-456 7890"><?= $this->ContentBlock->text('contact-number'); ?></a>
            </li>
            <li class="cs-nav-li">
                <a class="cs-nav-link" href="mailto:info@codestitch.com"><?= $this->ContentBlock->text('contact-email'); ?></a>
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
                <?= $this->ContentBlock->text('opening-hour'); ?>
            </li>
            <li class="cs-nav-li">
                ​(closed for lunch 12pm-2pm)
            </li>
        </ul>
    </div><br>
</footer>




<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<?= $this->Html->script('frontend.js'); ?>
<?= $this->fetch('script') ?>
</body>

</html>
