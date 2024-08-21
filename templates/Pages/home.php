<?php
$this->setLayout('frontend');
$this->assign('title', 'Fundraising');
?>

<!-- ============================================ -->
<!--                    Hero                      -->
<!-- ============================================ -->

<section id="hero-1785">
    <div class="cs-container">
        <div class="cs-content">
            <h2 class="cs-title"><?= $this->ContentBlock->text('home-title'); ?></h2>
            <p class="cs-text">
                <?= $this->ContentBlock->text('home-content'); ?>
            </p>
            <div class="cs-button-group">
                <button class="button" style="vertical-align:middle" onClick="scrollToTimeline();"><span>Start Fundraising </span></button>
                <button class="button button-secondary" style="vertical-align:middle" onClick="learnMore();"><span>Support Schools </span></button>
            </div>
        </div>
    </div>

    <!-- Background Image -->
    <picture class="cs-background">
        <source media="(max-width: 600px)" srcset="<?= $this->Url->image('Homepage_Background.png')?>">
        <source media="(min-width: 601px)" srcset="<?= $this->Url->image('Homepage_Background.png')?>">
        <img loading="lazy" decoding="async" src="<?= $this->Url->image('Homepage_Background.png')?>" alt="field" width="1920" height="1200" aria-hidden="true">
    </picture>

    <img class="cs-graphic" src="https://csimg.nyc3.cdn.digitaloceanspaces.com/Images/Graphics/white-splatter2.svg" alt="graphic" height="161" width="1920" loading="lazy" decoding="async" >
    <!--This is a dark version. Download the image and change the fill color to match the color of the section background below it-->
    <img class="cs-graphic cs-graphic-dark" src="https://csimg.nyc3.cdn.digitaloceanspaces.com/Images/Graphics/dark-mode-splatter2.svg" alt="graphic" height="161" width="1920" loading="lazy" decoding="async" >
</section><br>


<!-- ============================================ -->
<!--                 Why Choose                   -->
<!-- ============================================ -->

<section id="why-choose-892">
    <div class="cs-container">
        <div class="cs-content">
            <h2 class="cs-title"><?= $this->ContentBlock->text('wcu-title'); ?></h2>
            <p class="cs-text">
                <?= $this->ContentBlock->text('wcu-description'); ?>
            </p>
        </div>
        <ul class="cs-card-group">
            <li class="cs-item">
                <img class="cs-icon" src="https://csimg.nyc3.cdn.digitaloceanspaces.com/Icons%2Fballs1.svg" loading="lazy" decoding="async" alt="icon" width="48" height="48" aria-hidden="true">
                <!-- Text Grouped For Flexbox-->
                <div class="cs-text-group">
                    <h3 class="cs-h3"><?= $this->ContentBlock->text('wcu-title1'); ?></h3>
                    <p class="cs-item-text"><?= $this->ContentBlock->text('wcu-reason1'); ?>
                    </p>
                </div>
            </li>
            <li class="cs-item">
                <img class="cs-icon" src="https://csimg.nyc3.cdn.digitaloceanspaces.com/Icons%2Fballs2.svg" loading="lazy" decoding="async" alt="icon" width="48" height="48" aria-hidden="true">
                <!-- Text Grouped For Flexbox-->
                <div class="cs-text-group">
                    <h3 class="cs-h3"><?= $this->ContentBlock->text('wcu-title2'); ?></h3>
                    <p class="cs-item-text"><?= $this->ContentBlock->text('wcu-reason2'); ?>
                    </p>
                </div>
            </li>
            <li class="cs-item">
                <img class="cs-icon" src="https://csimg.nyc3.cdn.digitaloceanspaces.com/Icons%2Fballs3.svg" loading="lazy" decoding="async" alt="icon" width="48" height="48" aria-hidden="true">
                <!-- Text Grouped For Flexbox-->
                <div class="cs-text-group">
                    <h3 class="cs-h3"><?= $this->ContentBlock->text('wcu-title3'); ?></h3>
                    <p class="cs-item-text">
                        <?= $this->ContentBlock->text('wcu-reason3'); ?>
                    </p>
                </div>
            </li>
        </ul>
        <!--Floating Arrow Graphic-->
        <img class="cs-floater" src="https://csimg.nyc3.cdn.digitaloceanspaces.com/Images%2FGraphics%2Forange-arrow.svg" alt="arrow" loading="lazy" decoding="async" aria-hidden="true">
    </div>
</section><br><br><br>



<!-- ============================================ -->
<!--                  Timeline                    -->
<!-- ============================================ -->

<section id="timeline-1517">
    <div class="cs-container-ver2">
        <div class="cs-content">
            <div class="cs-flex">
                <h1 class="cs-title">How to raise funds with us?</h1>
                <p class="cs-text">
                    Are you a school representative and willing to raise funds for your school? We’re thrilled to launch our new fundraising campaign and need your help to succeed. Here’s how you can get involved!
                </p><br>
                <div class="cs-button-group">
                    <button class="button" style="vertical-align:middle" onclick="window.location.href='<?= $this->Url->build(['controller' => 'Auth', 'action' => 'register']) ?>'">
                        <span>Start Fundraising</span>
                    </button>
                </div>
            </div>
            <div class="cs-image-group">
                <!--Cert 1-->
                    <img src="<?= $this->Url->image('Sample_Student_Design.png')?>" alt="certification" width="500" height="250" loading="lazy" decoding="async" aria-hidden="true">
            </div>
        </div>
        <ul class="cs-card-group">
            <li class="cs-item">
                <h3 class="cs-h3">Step 1</h3><br>
                <p class="cs-item-text">
                    Using A4 paper, cut into 4 equal pieces giving one to each student.
                </p>
            </li>
            <li class="cs-item">
                <h3 class="cs-h3">Step 2</h3><br>
                <p class="cs-item-text">
                    Students can then create individual artworks. The more colourful the better! Remember to advise the students if they are to include their handwritten name.
                </p>
            </li>
            <li class="cs-item">
                <h3 class="cs-h3">Step 3</h3><br>
                <p class="cs-item-text">
                    Please collate drawings in numerical or alphabetical order. Post the students artworks along with your contact details
                </p>
            </li>
            <li class="cs-item">
                <h3 class="cs-h3">Step 4</h3><br>
                <p class="cs-item-text">
                    We will prepare the layout ready for printing and email you a PDF for approval. Once approved, we will ship the product directly to you.
                </p>
            </li>
        </ul>
    </div>
    <!--Left floater-->
    <img class="cs-floater cs-floater1" src="https://csimg.nyc3.cdn.digitaloceanspaces.com/Images/Graphics/green-seed.svg" alt="graphic" width="232" height="232" loading="lazy" decoding="async" aria-hidden="true">
    <!--right floater-->
    <img class="cs-floater cs-floater2" src="https://csimg.nyc3.cdn.digitaloceanspaces.com/Images/Graphics/circle-seed.svg" alt="graphic" width="232" height="232" loading="lazy" decoding="async" aria-hidden="true">

    <!--SVG Zig Zags-->
    <svg class="cs-background cs-background-top" xmlns="http://www.w3.org/2000/svg" width="1920" height="39"
         viewBox="0 0 1920 39" fill="none">
        <path
            d="M1920 0H0V15.8216L4.95532 13.3966L18.1455 15.2801L28.6394 22.5944L42.0481 24.423L54.0723 27.0599L66.8979 21.3623L78.7034 23.6147L90.9463 27.8134L102.533 21.5742L114.776 24.5329L126.654 25.2314L138.605 24.7997L148.881 29.1554L160.759 28.6217L171.18 33.354L183.569 27.1698L194.573 29.9637L207.69 30.0186L219.277 25.7179L228.531 18.9373L240.556 16.0335L253.017 13.3966L265.989 13.0748L279.033 14.5267L292.296 16.1983L305.413 12.5333L317.437 17.0537L331.065 15.0682L342.943 19.157L354.749 23.0261L366.773 26.1496L378.943 29.2652L391.331 31.6903L405.469 28.0802L417.274 32.067L428.57 35.1277L440.375 35.2925L451.598 38.4631L463.622 37.7097L475.208 38.8947L487.087 35.7241L498.455 36.7993L510.115 38.1413L522.285 34.2173L536.058 32.012L547.864 26.3065L561.928 29.2652L574.171 20.7658L587.434 22.0058L599.604 24.0463L611.191 21.5192L623.215 24.6428L634.947 25.2863L646.607 23.9443L658.413 20.499L670.437 17.7051L681.805 24.423L694.048 20.7658L706.072 20.1223L728.226 29.43L741.197 24.6428H753.221L761.31 35.6692L773.771 34.1624L785.65 29.8067L796.29 31.2586L809.261 34.594L818.37 26.7382L828.864 22.1628L842.418 22.9711L852.329 17.0537L866.248 19.314L875.722 11.7877L887.673 9.95128L900.28 11.2462L911.94 8.2875L924.474 10.328L937.373 8.17763L949.98 7.15739L961.931 10.3123L966.887 7.8951L980.077 15.1545L990.57 22.4689L1003.98 24.2974L1016 26.9344L1028.83 21.2367L1040.63 23.4891L1052.88 27.6878L1064.46 21.4486L1076.71 24.4073L1088.59 25.1058L1100.54 24.6741L1110.81 29.0298L1122.69 28.4961L1133.11 33.2285L1145.5 27.0442L1156.5 29.8381L1169.62 29.8931L1181.21 25.5924L1190.46 18.8117L1202.49 15.9079L1214.95 13.271L1227.92 12.9492L1240.96 14.4011L1254.23 16.0727L1267.34 12.4077L1279.37 16.9282L1293 14.9426L1304.87 19.0236L1316.68 22.9005L1328.7 26.024L1340.87 29.1397L1353.26 31.5647L1367.4 27.9546L1379.21 31.9414L1390.5 35.0021L1402.31 35.1669L1413.53 38.3375L1425.55 37.5841L1437.14 38.7692L1449.02 35.5986L1460.39 36.6738L1472.05 38.0158L1484.22 34.0918L1497.99 31.8865L1509.79 26.181L1523.86 29.1397L1536.1 20.6403L1549.37 21.8803L1561.54 23.9207L1573.12 21.3937L1585.15 24.5172L1596.88 25.1607L1608.54 23.8187L1620.34 20.3734L1632.37 17.5717L1643.74 24.2974L1655.98 20.6403L1668 19.9967L1690.16 29.3045L1703.13 24.5172H1715.15L1723.24 35.5436L1735.7 34.0368L1747.58 29.6812L1758.22 31.1331L1771.19 34.4685L1780.3 26.6126L1790.79 22.0372L1804.35 22.8456L1814.26 16.9282L1828.18 19.1884L1837.65 11.6543L1849.6 9.82571L1862.21 11.1206L1873.87 8.16193L1886.41 10.2024L1899.3 8.05206L1911.91 7.03182L1920 7.78523V0Z"
            fill="var(--backgroundBG)" />
    </svg>
    <svg class="cs-background cs-background-bottom" xmlns="http://www.w3.org/2000/svg" width="1920" height="39"
         viewBox="0 0 1920 39" fill="none">
        <path
            d="M1920 0H0V15.8216L4.95532 13.3966L18.1455 15.2801L28.6394 22.5944L42.0481 24.423L54.0723 27.0599L66.8979 21.3623L78.7034 23.6147L90.9463 27.8134L102.533 21.5742L114.776 24.5329L126.654 25.2314L138.605 24.7997L148.881 29.1554L160.759 28.6217L171.18 33.354L183.569 27.1698L194.573 29.9637L207.69 30.0186L219.277 25.7179L228.531 18.9373L240.556 16.0335L253.017 13.3966L265.989 13.0748L279.033 14.5267L292.296 16.1983L305.413 12.5333L317.437 17.0537L331.065 15.0682L342.943 19.157L354.749 23.0261L366.773 26.1496L378.943 29.2652L391.331 31.6903L405.469 28.0802L417.274 32.067L428.57 35.1277L440.375 35.2925L451.598 38.4631L463.622 37.7097L475.208 38.8947L487.087 35.7241L498.455 36.7993L510.115 38.1413L522.285 34.2173L536.058 32.012L547.864 26.3065L561.928 29.2652L574.171 20.7658L587.434 22.0058L599.604 24.0463L611.191 21.5192L623.215 24.6428L634.947 25.2863L646.607 23.9443L658.413 20.499L670.437 17.7051L681.805 24.423L694.048 20.7658L706.072 20.1223L728.226 29.43L741.197 24.6428H753.221L761.31 35.6692L773.771 34.1624L785.65 29.8067L796.29 31.2586L809.261 34.594L818.37 26.7382L828.864 22.1628L842.418 22.9711L852.329 17.0537L866.248 19.314L875.722 11.7877L887.673 9.95128L900.28 11.2462L911.94 8.2875L924.474 10.328L937.373 8.17763L949.98 7.15739L961.931 10.3123L966.887 7.8951L980.077 15.1545L990.57 22.4689L1003.98 24.2974L1016 26.9344L1028.83 21.2367L1040.63 23.4891L1052.88 27.6878L1064.46 21.4486L1076.71 24.4073L1088.59 25.1058L1100.54 24.6741L1110.81 29.0298L1122.69 28.4961L1133.11 33.2285L1145.5 27.0442L1156.5 29.8381L1169.62 29.8931L1181.21 25.5924L1190.46 18.8117L1202.49 15.9079L1214.95 13.271L1227.92 12.9492L1240.96 14.4011L1254.23 16.0727L1267.34 12.4077L1279.37 16.9282L1293 14.9426L1304.87 19.0236L1316.68 22.9005L1328.7 26.024L1340.87 29.1397L1353.26 31.5647L1367.4 27.9546L1379.21 31.9414L1390.5 35.0021L1402.31 35.1669L1413.53 38.3375L1425.55 37.5841L1437.14 38.7692L1449.02 35.5986L1460.39 36.6738L1472.05 38.0158L1484.22 34.0918L1497.99 31.8865L1509.79 26.181L1523.86 29.1397L1536.1 20.6403L1549.37 21.8803L1561.54 23.9207L1573.12 21.3937L1585.15 24.5172L1596.88 25.1607L1608.54 23.8187L1620.34 20.3734L1632.37 17.5717L1643.74 24.2974L1655.98 20.6403L1668 19.9967L1690.16 29.3045L1703.13 24.5172H1715.15L1723.24 35.5436L1735.7 34.0368L1747.58 29.6812L1758.22 31.1331L1771.19 34.4685L1780.3 26.6126L1790.79 22.0372L1804.35 22.8456L1814.26 16.9282L1828.18 19.1884L1837.65 11.6543L1849.6 9.82571L1862.21 11.1206L1873.87 8.16193L1886.41 10.2024L1899.3 8.05206L1911.91 7.03182L1920 7.78523V0Z"
            fill="var(--backgroundBG)" />
    </svg>
</section><br><br><br>

<!-- ============================================ -->
<!--                   Gallery                    -->
<!-- ============================================ -->

<section id="gallery-1152">
    <div class="cs-container">
        <div class="cs-content">
            <h2 class="cs-title">Sample Product - Tea towel</h2>
        </div>
        <div class="cs-gallery">
            <!--Picture 1-->
            <picture class="cs-image">
                <source media="(max-width: 600px)" srcset="<?= $this->Url->image('sample_product1.jpg')?>">
                <source media="(min-width: 601px)" srcset="<?= $this->Url->image('sample_product1.jpg')?>">
                <img loading="lazy" decoding="async" src="<?= $this->Url->image('sample_product1.jpg')?>" alt="gallery" width="272" height="320">
            </picture>
            <!--Picture 2-->
            <picture class="cs-image">
                <source media="(max-width: 600px)" srcset="<?= $this->Url->image('sample_product2.jpg')?>">
                <source media="(min-width: 601px)" srcset="<?= $this->Url->image('sample_product2.jpg')?>">
                <img loading="lazy" decoding="async" src="<?= $this->Url->image('sample_product2.jpg')?>" alt="gallery" width="272" height="320">
            </picture>
            <!--Picture 3-->
            <picture class="cs-image">
                <source media="(max-width: 600px)" srcset="<?= $this->Url->image('sample_product3.jpg')?>">
                <source media="(min-width: 601px)" srcset="<?= $this->Url->image('sample_product3.jpg')?>">
                <img loading="lazy" decoding="async" src="<?= $this->Url->image('sample_product3.jpg')?>" alt="gallery" width="272" height="320">
            </picture>
            <!--Picture 4-->
            <picture class="cs-image">
                <source media="(max-width: 600px)" srcset="<?= $this->Url->image('sample_product4.jpg')?>">
                <source media="(min-width: 601px)" srcset="<?= $this->Url->image('sample_product4.jpg')?>">
                <img loading="lazy" decoding="async" src="<?= $this->Url->image('sample_product4.jpg')?>" alt="gallery" width="272" height="320">
            </picture>
            <!--Picture 5-->
            <picture class="cs-image">
                <source media="(max-width: 600px)" srcset="<?= $this->Url->image('sample_product5.jpg')?>">
                <source media="(min-width: 601px)" srcset="<?= $this->Url->image('sample_product5.jpg')?>">
                <img loading="lazy" decoding="async" src="<?= $this->Url->image('sample_product5.jpg')?>" alt="gallery" width="272" height="320">
            </picture>
        </div>
    </div>
</section><br><br><br>



<!-- ============================================ -->
<!--                  Pricing                     -->
<!-- ============================================ -->

<section id="pricing-1387">
    <h2 class="cs-price-title">Price Breakdown</h2>
    <p class="cs-price-text">
        Here’s our price breakdown: buy in bulk to lower your cost per item and maximize your fund raises!
    </p>
    <p class="cs-product-minimum" style="color: red; font-weight: bold;">
        *Minimum order: 25 pieces per class
    </p><br>
    <div class="cs-container">
        <div class="grid">
            <div class="grid-item"><b>Number of tea towels purchases</b></div>
            <div class="grid-item"><b>Cost</b></div>
            <div class="grid-item">25-49 Pieces</div>
            <div class="grid-item">$18 Each</div>
            <div class="grid-item">50-249 Pieces</div>
            <div class="grid-item">$13.50 Each</div>
            <div class="grid-item">250-499 Pieces</div>
            <div class="grid-item">$12 Each</div>
            <div class="grid-item">Above 500 Pieces</div>
            <div class="grid-item">$11.50 Each</div>
        </div>
        <div class="cs-content">
            <h2 class="cs-title">Profit Calculator</h2>
            <form class="profit-calculator" onsubmit="calculateProfit(event)">
                <div class="form-group">
                    <label for="number-of-towels">Number of tea towels that you would like to purchase<br>(min. 25):</label>
                    <input type="number" id="number-of-towels" name="number-of-towels" min="25" required>
                </div>
                <div class="form-group">
                    <label for="selling-price">How much would you like to sell each of them for:</label>
                    <input type="number" id="selling-price" name="selling-price" step="0.01" required>
                </div><br>
                <button type="submit" class="calculate-button">Calculate</button>
                <p id="profitMessage"></p> <!-- To display the profit message -->
            </form>
        </div>
    </div><br>
</section>

<!-- ============================================ -->
<!--                   Reviews                    -->
<!-- ============================================ -->

<section id="reviews-62"><br>
    <div class="cs-container">
        <div class="cs-content">
            <h2 class="cs-title"><?= $this->ContentBlock->text('wfoc-title'); ?></h2>
            <p class="cs-text">
                <?= $this->ContentBlock->text('wfoc-description'); ?>
            </p>
        </div>
        <ul class="cs-card-group">
            <li class="cs-item">
                <img class="cs-img" aria-hidden="true" loading="lazy" decoding="async" src="https://csimg.nyc3.digitaloceanspaces.com/Reviews/profile1.png" alt="profile" width="68" height="68">
                <span class="cs-name"><?= $this->ContentBlock->text('wfoc-name1'); ?></span>
                <span class="cs-desc"><?= $this->ContentBlock->text('wfoc-loc1'); ?></span>
                <p class="cs-item-text">
                    <?= $this->ContentBlock->text('wfoc-testi1'); ?>
                </p>
            </li>
            <li class="cs-item">
                <img class="cs-img" aria-hidden="true" loading="lazy" decoding="async" src="https://csimg.nyc3.digitaloceanspaces.com/Reviews/profile2.png" alt="profile" width="68" height="68">
                <span class="cs-name"><?= $this->ContentBlock->text('wfoc-name2'); ?></span>
                <span class="cs-desc"><?= $this->ContentBlock->text('wfoc-loc2'); ?></span>
                <p class="cs-item-text">
                    <?= $this->ContentBlock->text('wfoc-testi2'); ?>
                </p>
            </li>
            <li class="cs-item">
                <img class="cs-img" aria-hidden="true" loading="lazy" decoding="async" src="https://csimg.nyc3.digitaloceanspaces.com/Reviews/profile3.png" alt="profile" width="68" height="68">
                <span class="cs-name"><?= $this->ContentBlock->text('wfoc-name3'); ?></span>
                <span class="cs-desc"><?= $this->ContentBlock->text('wfoc-loc3'); ?></span>
                <p class="cs-item-text">
                    <?= $this->ContentBlock->text('wfoc-testi3'); ?>
                </p>
            </li>
        </ul>
    </div><br><br>
</section><br><br>











