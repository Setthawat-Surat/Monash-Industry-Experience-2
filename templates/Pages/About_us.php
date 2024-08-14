<?php
$this->setLayout('frontend');
$this->assign('title', 'About');
?>

<link href="https://fonts.googleapis.com/css?family=Exo+2" rel="stylesheet">
<!-- https://codepen.io/bookworm0618/details/wxojZQ -->

<main>
    <section id="about-us">
        <h1> Organic Print Studio </h1>
        <p> Encourage, Educate, Empower </p>
    </section>

    <section id="videos">
        <h1> <?= $this->ContentBlock->text('abt-vidotitle'); ?> </h1>
        <div class="video">
            <iframe id="video" width="560" height="315" src="<?= $this->ContentBlock->text('abt-video'); ?>" frameborder="0" allow="autoplay; encrypted-media" autoplay="1" allowfullscreen></iframe>
        </div>

    </section>

    <section id="about-text">
        <p> <?= $this->ContentBlock->text('abt-text'); ?>
        </p>
    </section>


    <div id="photos">
        <h1> Photo Gallery </h1>
        <div id="photo-gallery">
            <img class="aboutimg" src="<?= $this->Url->image('sample_product1.jpg')?>">
            <img class="aboutimg" src="<?= $this->Url->image('sample_product2.jpg')?>">
            <img class="aboutimg" src="<?= $this->Url->image('sample_product3.jpg')?>">
            <img class="aboutimg" src="<?= $this->Url->image('sample_product4.jpg')?>">
            <img class="aboutimg" src="<?= $this->Url->image('sample_product5.jpg')?>">
            <img class="aboutimg" src="<?= $this->Url->image('sample_product1.jpg')?>">
        </div>
    </div>




    <!-- ============================================ -->
    <!--                   Contact                    -->
    <!-- ============================================
    <header class="about_header">CONTACT FORM</header>
    <form id="form" class="topBefore">

        <input id="name" type="text" placeholder="NAME">
        <input id="email" type="text" placeholder="E-MAIL">
        <textarea id="message" type="text" placeholder="MESSAGE"></textarea>
        <input id="submit" type="submit" value="GO!">

    </form>

    -->


</main>
