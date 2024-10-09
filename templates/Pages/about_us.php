<?php
$this->setLayout('frontend');
$this->assign('title', 'About');
?>

<link href="https://fonts.googleapis.com/css?family=Exo+2" rel="stylesheet">
<!-- https://codepen.io/bookworm0618/details/wxojZQ -->

<main>
    <?php
    //Retrieve HTML<img>tags from ContentBlock or use default image path
    $backgroundImageHtml = $this->ContentBlock->image('abt-background') ?: $this->Html->image('Homepage_Background.png');

    //Extracting the src attribute of<img>tags using regular expressions
    preg_match('/src="([^"]+)"/', $backgroundImageHtml, $matches);

    // 如果匹配成功，$matches[1] 就是图片的 URL
    $backgroundImageUrl = !empty($matches[1]) ? $matches[1] : $this->Url->build('/img/Homepage_Background.png');
    ?>

    <section style="background-image: url('<?= $backgroundImageUrl; ?>')" id="about-us">
        <h1><?= $this->ContentBlock->text('abt-title'); ?></h1>
        <p><?= $this->ContentBlock->text('abt-subtitle'); ?></p>
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
            <?php
            $image1 = $this->ContentBlock->image('abt-image1');
            if (empty($image1)) {
                echo '<img class="aboutimg" src="' . $this->Url->image('sample_product1.jpg') . '">';
            } else {
                echo $image1;
            }

            $image2 = $this->ContentBlock->image('abt-image2');
            if (empty($image2)) {
                echo '<img class="aboutimg" src="' . $this->Url->image('sample_product2.jpg') . '">';
            } else {
                echo $image2;
            }

            $image3 = $this->ContentBlock->image('abt-image3');
            if (empty($image3)) {
                echo '<img class="aboutimg" src="' . $this->Url->image('sample_product3.jpg') . '">';
            } else {
                echo $image3;
            }

            $image4 = $this->ContentBlock->image('abt-image4');
            if (empty($image4)) {
                echo '<img class="aboutimg" src="' . $this->Url->image('sample_product4.jpg') . '">';
            } else {
                echo $image4;
            }

            $image5 = $this->ContentBlock->image('abt-image5');
            if (empty($image5)) {
                echo '<img class="aboutimg" src="' . $this->Url->image('sample_product5.jpg') . '">';
            } else {
                echo $image5;
            }

            $image6 = $this->ContentBlock->image('abt-image6');
            if (empty($image6)) {
                echo '<img class="aboutimg" src="' . $this->Url->image('sample_product1.jpg') . '">';
            } else {
                echo $image6;
            }

            ?>


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
