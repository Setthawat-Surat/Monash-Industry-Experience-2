<?php

$this->setLayout('frontend');

?>

<!-- ============================================ -->
<!--                    Steps                     -->
<!-- ============================================ -->

<section id="steps-1893">
    <div class="cs-container">
        <div class="cs-image-group">
            <picture class="cs-picture">
                <!--Mobile Image-->
                <source media="(max-width: 600px)" srcset="https://csimg.nyc3.cdn.digitaloceanspaces.com/Images/People/dermatologist1.jpeg">
                <!--Tablet and above Image-->
                <source media="(min-width: 601px)" srcset="https://csimg.nyc3.cdn.digitaloceanspaces.com/Images/People/dermatologist1.jpeg">
                <img loading="lazy" decoding="async" src="https://csimg.nyc3.cdn.digitaloceanspaces.com/Images/People/dermatologist1.jpeg" alt="dermatologist" width="324" height="467">
            </picture>
            <img class="cs-graphic cs-brown" loading="lazy" decoding="async" src="https://csimg.nyc3.cdn.digitaloceanspaces.com/Images/Graphics/brown-lines2.svg" alt="graphic" width="100" height="98" aria-hidden="true">
            <img class="cs-graphic cs-peach" loading="lazy" decoding="async" src="https://csimg.nyc3.cdn.digitaloceanspaces.com/Images/Icons/peach-blob.svg" alt="graphic" width="42" height="31" aria-hidden="true">
            <img class="cs-graphic cs-leaf" loading="lazy" decoding="async" src="https://csimg.nyc3.cdn.digitaloceanspaces.com/Images/Graphics/leaf-reverse.svg" alt="graphic" width="136" height="171" aria-hidden="true">
            <img class="cs-graphic cs-dots" loading="lazy" decoding="async" src="https://csimg.nyc3.cdn.digitaloceanspaces.com/Images/Icons/beige-dots.svg" alt="graphic" width="159" height="88" aria-hidden="true">
            <img class="cs-graphic cs-lines" loading="lazy" decoding="async" src="https://csimg.nyc3.cdn.digitaloceanspaces.com/Images/Graphics/mesh-reverse.svg" alt="graphic" width="150" height="165" aria-hidden="true">
        </div>
        <div class="cs-wrapper">
            <div class="cs-content">
                <span class="cs-topper">How to get started</span>
                <h2 class="cs-title"><?= $this->ContentBlock->text('proc-title'); ?></h2>
            </div>
            <ul class="cs-card-group">
                <li class="cs-item">
                    <span class="cs-number">01</span>
                    <div class="cs-flex">
                        <h3 class="cs-h3"><?= $this->ContentBlock->text('proc-subtitle1'); ?></h3>
                        <p class="cs-item-text">
                            <?= $this->ContentBlock->text('proc-text1'); ?>
                        </p>
                    </div>
                </li>
                <li class="cs-item">
                    <span class="cs-number">02</span>
                    <div class="cs-flex">
                        <h3 class="cs-h3"><?= $this->ContentBlock->text('proc-subtitle2'); ?></h3>
                        <p class="cs-item-text">
                            <?= $this->ContentBlock->text('proc-text2'); ?>
                        </p>
                    </div>
                </li>
                <li class="cs-item">
                    <span class="cs-number">03</span>
                    <div class="cs-flex">
                        <h3 class="cs-h3"><?= $this->ContentBlock->text('proc-subtitle3'); ?></h3>
                        <p class="cs-item-text">
                            <?= $this->ContentBlock->text('proc-text3'); ?>
                        </p>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</section>

