<?php
$this->setLayout('frontend');
$this->assign('title', 'FAQ');
?>



<div class="space"></div>

<!-- ============================================ -->
<!--                     FAQ                      -->
<!-- ============================================ -->

<section id="faq-350">
    <div class="cs-container">
        <div class="cs-left">
            <!--Big Image-->
            <picture class="cs-picture cs-picture1" aria-hidden="true">
                <source media="(max-width: 600px)" srcset="https://csimg.nyc3.digitaloceanspaces.com/SideBySide/cleaner3-m.jpg">
                <source media="(min-width: 601px)" srcset="https://csimg.nyc3.digitaloceanspaces.com/SideBySide/cleaner3.jpg">
                <img loading="lazy" decoding="async" src="https://csimg.nyc3.digitaloceanspaces.com/SideBySide/cleaner3.jpg" alt="cleaning supplies" width="672" height="672">
            </picture>
            <!--Medium Image-->
            <picture class="cs-picture cs-picture2" aria-hidden="true">
                <source media="(max-width: 600px)" srcset="https://csimg.nyc3.digitaloceanspaces.com/SideBySide/cleaning2-m.jpg">
                <source media="(min-width: 601px)" srcset="https://csimg.nyc3.digitaloceanspaces.com/SideBySide/cleaning2.jpg">
                <img loading="lazy" decoding="async" src="https://csimg.nyc3.digitaloceanspaces.com/SideBySide/cleaning2.jpg" alt="cleaning supplies" width="300" height="300">
            </picture>
            <!--Small Image-->
            <picture class="cs-picture cs-picture3" aria-hidden="true">
                <source media="(max-width: 600px)" srcset="https://csimg.nyc3.digitaloceanspaces.com/SideBySide/cleaning1-m.jpg">
                <source media="(min-width: 601px)" srcset="https://csimg.nyc3.digitaloceanspaces.com/SideBySide/cleaning1.jpg">
                <img loading="lazy" decoding="async" src="https://csimg.nyc3.digitaloceanspaces.com/SideBySide/cleaning1.jpg" alt="cleaner" width="200" height="200">
            </picture>
        </div>
        <div class="cs-content">
            <span class="cs-topper">Asked questions</span>
            <h2 class="cs-title">Frequently Asked Questions</h2>
            <ul class="cs-faq-group">
                <!-- Active class added as default -->
                <li class="cs-faq-item active">
                    <button class="cs-button">
                        <span class="cs-button-text">
                            <?= $this->ContentBlock->text('faq-question1'); ?>
                        </span>
                    </button>
                    <p class="cs-item-p">
                        <?= $this->ContentBlock->text('faq-answer1'); ?>
                    </p>
                </li>
                <li class="cs-faq-item">
                    <button class="cs-button">
                        <span class="cs-button-text">
                            <?= $this->ContentBlock->text('faq-question2'); ?>
                        </span>
                    </button>
                    <p class="cs-item-p">
                        <?= $this->ContentBlock->text('faq-answer2'); ?>
                    </p>
                </li>
                <li class="cs-faq-item">
                    <button class="cs-button">
                        <span class="cs-button-text">
                            <?= $this->ContentBlock->text('faq-question3'); ?>
                        </span>
                    </button>
                    <p class="cs-item-p">
                        <?= $this->ContentBlock->text('faq-answer3'); ?>
                    </p>
                </li>
                <li class="cs-faq-item">
                    <button class="cs-button">
                        <span class="cs-button-text">
                            <?= $this->ContentBlock->text('faq-question4'); ?>
                        </span>
                    </button>
                    <p class="cs-item-p">
                        <?= $this->ContentBlock->text('faq-question4'); ?>
                    </p>
                </li>
                <li class="cs-faq-item">
                    <button class="cs-button">
                        <span class="cs-button-text">
                            <?= $this->ContentBlock->text('faq-question5'); ?>
                        </span>
                    </button>
                    <p class="cs-item-p">
                        <?= $this->ContentBlock->text('faq-answer5'); ?>
                    </p>
                </li>
            </ul>
        </div>
    </div>
</section>

